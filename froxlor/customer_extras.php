<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2003-2009 the SysCP Team (see authors).
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Florian Lippert <flo@syscp.org> (2003-2009)
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Panel
 *
 */
define('AREA', 'customer');
require './lib/init.php';

// redirect if this customer page is hidden via settings
if (Settings::IsInList('panel.customer_hide_options','extras')) {
	redirectTo('customer_index.php');
}

if (isset($_POST['id'])) {
	$id = intval($_POST['id']);
} elseif (isset($_GET['id'])) {
	$id = intval($_GET['id']);
}

if ($page == 'overview') {
	$log->logAction(USR_ACTION, LOG_NOTICE, "viewed customer_extras");
	eval("echo \"" . getTemplate("extras/extras") . "\";");
} elseif ($page == 'htpasswds') {

	// redirect if this customer sub-page is hidden via settings
	if (Settings::IsInList('panel.customer_hide_options','extras.directoryprotection')) {
		redirectTo('customer_index.php');
	}

	if ($action == '') {
		$log->logAction(USR_ACTION, LOG_NOTICE, "viewed customer_extras::htpasswds");
		$fields = array(
			'username' => $lng['login']['username'],
			'path' => $lng['panel']['path']
		);
		$paging = new paging($userinfo, TABLE_PANEL_HTPASSWDS, $fields);
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_HTPASSWDS . "`
			WHERE `customerid`= :customerid " . $paging->getSqlWhere(true) . " " . $paging->getSqlOrderBy() . " " . $paging->getSqlLimit());
		Database::pexecute($result_stmt, array(
			"customerid" => $userinfo['customerid']
		));
		$paging->setEntries(Database::num_rows());
		$sortcode = $paging->getHtmlSortCode($lng);
		$arrowcode = $paging->getHtmlArrowCode($filename . '?page=' . $page . '&s=' . $s);
		$searchcode = $paging->getHtmlSearchCode($lng);
		$pagingcode = $paging->getHtmlPagingCode($filename . '?page=' . $page . '&s=' . $s);
		$i = 0;
		$count = 0;
		$htpasswds = '';

		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
			if ($paging->checkDisplay($i)) {
				if (strpos($row['path'], $userinfo['documentroot']) === 0) {
					$row['path'] = str_replace($userinfo['documentroot'], "/", $row['path']);
				}
				$row['path'] = makeCorrectDir($row['path']);
				$row = htmlentities_array($row);
				eval("\$htpasswds.=\"" . getTemplate("extras/htpasswds_htpasswd") . "\";");
				$count ++;
			}

			$i ++;
		}

		eval("echo \"" . getTemplate("extras/htpasswds") . "\";");
	} elseif ($action == 'delete' && $id != 0) {
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_HTPASSWDS . "`
			WHERE `customerid`= :customerid
			AND `id`= :id");
		Database::pexecute($result_stmt, array(
			"customerid" => $userinfo['customerid'],
			"id" => $id
		));
		$result = $result_stmt->fetch(PDO::FETCH_ASSOC);

		if (isset($result['username']) && $result['username'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$stmt = Database::prepare("DELETE FROM `" . TABLE_PANEL_HTPASSWDS . "`
					WHERE `customerid`= :customerid
					AND `id`= :id");
				Database::pexecute($stmt, array(
					"customerid" => $userinfo['customerid'],
					"id" => $id
				));

				$log->logAction(USR_ACTION, LOG_INFO, "deleted htpasswd for '" . $result['username'] . " (" . $result['path'] . ")'");
				inserttask('1');
				redirectTo($filename, array(
					'page' => $page,
					's' => $s
				));
			} else {
				if (strpos($result['path'], $userinfo['documentroot']) === 0) {
					$result['path'] = str_replace($userinfo['documentroot'], "/", $result['path']);
				}

				ask_yesno('extras_reallydelete', $filename, array(
					'id' => $id,
					'page' => $page,
					'action' => $action
				), $result['username'] . ' (' . $result['path'] . ')');
			}
		}
	} elseif ($action == 'add') {
		if (isset($_POST['send']) && $_POST['send'] == 'send') {
			$path = makeCorrectDir(validate($_POST['path'], 'path'));
			$userpath = $path;
			$path = makeCorrectDir($userinfo['documentroot'] . '/' . $path);
			$username = validate($_POST['username'], 'username', '/^[a-zA-Z0-9][a-zA-Z0-9\-_]+\$?$/');
			$authname = validate($_POST['directory_authname'], 'directory_authname', '/^[a-zA-Z0-9][a-zA-Z0-9\-_ ]+\$?$/');
			validate($_POST['directory_password'], 'password');

			$username_path_check_stmt = Database::prepare("SELECT `id`, `username`, `path` FROM `" . TABLE_PANEL_HTPASSWDS . "`
				WHERE `username`= :username
				AND `path`= :path
				AND `customerid`= :customerid");
			$params = array(
				"username" => $username,
				"path" => $path,
				"customerid" => $userinfo['customerid']
			);
			Database::pexecute($username_path_check_stmt, $params);
			$username_path_check = $username_path_check_stmt->fetch(PDO::FETCH_ASSOC);

			if (CRYPT_STD_DES == 1) {
				$saltfordescrypt = substr(md5(uniqid(microtime(), 1)), 4, 2);
				$password = crypt($_POST['directory_password'], $saltfordescrypt);
			} else {
				$password = crypt($_POST['directory_password']);
			}

			if (! $_POST['path']) {
				standard_error('invalidpath');
			}

			if ($username == '') {
				standard_error(array(
					'stringisempty',
					'myloginname'
				));
			} elseif ($username_path_check['username'] == $username && $username_path_check['path'] == $path) {
				standard_error('userpathcombinationdupe');
			} elseif ($_POST['directory_password'] == '') {
				standard_error(array(
					'stringisempty',
					'mypassword'
				));
			} elseif ($path == '') {
				standard_error('patherror');
			} elseif ($_POST['directory_password'] == $username) {
				standard_error('passwordshouldnotbeusername');
			} else {
				$stmt = Database::prepare("INSERT INTO `" . TABLE_PANEL_HTPASSWDS . "` SET
					`customerid` = :customerid,
					`username` = :username,
					`password` = :password,
					`path` = :path,
					`authname` = :authname");
				$params = array(
					"customerid" => $userinfo['customerid'],
					"username" => $username,
					"password" => $password,
					"path" => $path,
					"authname" => $authname
				);
				Database::pexecute($stmt, $params);
				$log->logAction(USR_ACTION, LOG_INFO, "added htpasswd for '" . $username . " (" . $path . ")'");
				inserttask('1');
				redirectTo($filename, array(
					'page' => $page,
					's' => $s
				));
			}
		} else {
			$pathSelect = makePathfield($userinfo['documentroot'], $userinfo['guid'], $userinfo['guid']);

			$htpasswd_add_data = include_once dirname(__FILE__) . '/lib/formfields/customer/extras/formfield.htpasswd_add.php';
			$htpasswd_add_form = htmlform::genHTMLForm($htpasswd_add_data);

			$title = $htpasswd_add_data['htpasswd_add']['title'];
			$image = $htpasswd_add_data['htpasswd_add']['image'];

			eval("echo \"" . getTemplate("extras/htpasswds_add") . "\";");
		}
	} elseif ($action == 'edit' && $id != 0) {
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_HTPASSWDS . "`
			WHERE `customerid`= :customerid
			AND `id`= :id");
		Database::pexecute($result_stmt, array(
			"customerid" => $userinfo['customerid'],
			"id" => $id
		));
		$result = $result_stmt->fetch(PDO::FETCH_ASSOC);

		if (isset($result['username']) && $result['username'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				validate($_POST['directory_password'], 'password');
				$authname = validate($_POST['directory_authname'], 'directory_authname', '/^[a-zA-Z0-9][a-zA-Z0-9\-_ ]+\$?$/');

				if (CRYPT_STD_DES == 1) {
					$saltfordescrypt = substr(md5(uniqid(microtime(), 1)), 4, 2);
					$password = crypt($_POST['directory_password'], $saltfordescrypt);
				} else {
					$password = crypt($_POST['directory_password']);
				}

				if ($_POST['directory_password'] == $result['username']) {
					standard_error('passwordshouldnotbeusername');
				}

				$params = array(
					"customerid" => $userinfo['customerid'],
					"id" => $id
				);

				$pwd_sql = '';
				if ($_POST['directory_password'] != '') {
					$pwd_sql = "`password`= :password ";
					$params["password"] = $password;
				}

				$auth_sql = '';
				if ($authname != $result['authname']) {
					$auth_sql = "`authname`= :authname ";
					$params["authname"] = $authname;
				}

				if ($pwd_sql != '' || $auth_sql != '') {
					if ($pwd_sql != '' && $auth_sql != '') {
						$pwd_sql .= ', ';
					}

					$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_HTPASSWDS . "`
						SET " . $pwd_sql . $auth_sql . "
						WHERE `customerid`= :customerid
						AND `id`= :id");
					Database::pexecute($stmt, $params);
					$log->logAction(USR_ACTION, LOG_INFO, "edited htpasswd for '" . $result['username'] . " (" . $result['path'] . ")'");
					inserttask('1');
					redirectTo($filename, array(
						'page' => $page,
						's' => $s
					));
				}
			} else {
				if (strpos($result['path'], $userinfo['documentroot']) === 0) {
					$result['path'] = str_replace($userinfo['documentroot'], "/", $result['path']);
				}

				$result = htmlentities_array($result);

				$htpasswd_edit_data = include_once dirname(__FILE__) . '/lib/formfields/customer/extras/formfield.htpasswd_edit.php';
				$htpasswd_edit_form = htmlform::genHTMLForm($htpasswd_edit_data);

				$title = $htpasswd_edit_data['htpasswd_edit']['title'];
				$image = $htpasswd_edit_data['htpasswd_edit']['image'];

				eval("echo \"" . getTemplate("extras/htpasswds_edit") . "\";");
			}
		}
	}
} elseif ($page == 'htaccess') {

	// redirect if this customer sub-page is hidden via settings
	if (Settings::IsInList('panel.customer_hide_options','extras.pathoptions')) {
		redirectTo('customer_index.php');
	}

	if ($action == '') {
		$log->logAction(USR_ACTION, LOG_NOTICE, "viewed customer_extras::htaccess");
		$fields = array(
			'path' => $lng['panel']['path'],
			'options_indexes' => $lng['extras']['view_directory'],
			'error404path' => $lng['extras']['error404path'],
			'error403path' => $lng['extras']['error403path'],
			'error500path' => $lng['extras']['error500path'],
			'options_cgi' => $lng['extras']['execute_perl']
		);
		$paging = new paging($userinfo, TABLE_PANEL_HTACCESS, $fields);
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_HTACCESS . "`
			WHERE `customerid`= :customerid " . $paging->getSqlWhere(true) . " " . $paging->getSqlOrderBy() . " " . $paging->getSqlLimit());
		Database::pexecute($result_stmt, array(
			"customerid" => $userinfo['customerid']
		));
		$paging->setEntries(Database::num_rows());
		$sortcode = $paging->getHtmlSortCode($lng);
		$arrowcode = $paging->getHtmlArrowCode($filename . '?page=' . $page . '&s=' . $s);
		$searchcode = $paging->getHtmlSearchCode($lng);
		$pagingcode = $paging->getHtmlPagingCode($filename . '?page=' . $page . '&s=' . $s);
		$i = 0;
		$count = 0;
		$htaccess = '';

		$cperlenabled = customerHasPerlEnabled($userinfo['customerid']);

		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
			if ($paging->checkDisplay($i)) {
				if (strpos($row['path'], $userinfo['documentroot']) === 0) {
					$row['path'] = str_replace($userinfo['documentroot'], "/", $row['path']);
				}
				$row['path'] = makeCorrectDir($row['path']);
				$row['options_indexes'] = str_replace('1', $lng['panel']['yes'], $row['options_indexes']);
				$row['options_indexes'] = str_replace('0', $lng['panel']['no'], $row['options_indexes']);
				$row['options_cgi'] = str_replace('1', $lng['panel']['yes'], $row['options_cgi']);
				$row['options_cgi'] = str_replace('0', $lng['panel']['no'], $row['options_cgi']);
				$row = htmlentities_array($row);
				eval("\$htaccess.=\"" . getTemplate("extras/htaccess_htaccess") . "\";");
				$count ++;
			}

			$i ++;
		}

		eval("echo \"" . getTemplate("extras/htaccess") . "\";");
	} elseif ($action == 'delete' && $id != 0) {
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_HTACCESS . "`
			WHERE `customerid` = :customerid
			AND `id` = :id");
		Database::pexecute($result_stmt, array(
			"customerid" => $userinfo['customerid'],
			"id" => $id
		));
		$result = $result_stmt->fetch(PDO::FETCH_ASSOC);

		if (isset($result['customerid']) && $result['customerid'] != '' && $result['customerid'] == $userinfo['customerid']) {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				// do we have to remove the symlink and folder in suexecpath?
				if ((int) Settings::Get('perl.suexecworkaround') == 1) {
					$loginname = getCustomerDetail($result['customerid'], 'loginname');
					$suexecpath = makeCorrectDir(Settings::Get('perl.suexecpath') . '/' . $loginname . '/' . md5($result['path']) . '/');
					$perlsymlink = makeCorrectFile($result['path'] . '/cgi-bin');
					// remove symlink
					if (file_exists($perlsymlink)) {
						safe_exec('rm -f ' . escapeshellarg($perlsymlink));
						$log->logAction(USR_ACTION, LOG_DEBUG, "deleted suexecworkaround symlink '" . $perlsymlink . "'");
					}
					// remove folder in suexec-path
					if (file_exists($suexecpath)) {
						safe_exec('rm -rf ' . escapeshellarg($suexecpath));
						$log->logAction(USR_ACTION, LOG_DEBUG, "deleted suexecworkaround path '" . $suexecpath . "'");
					}
				}
				$stmt = Database::prepare("DELETE FROM `" . TABLE_PANEL_HTACCESS . "`
					WHERE `customerid`= :customerid
					AND `id`= :id");
				Database::pexecute($stmt, array(
					"customerid" => $userinfo['customerid'],
					"id" => $id
				));
				$log->logAction(USR_ACTION, LOG_INFO, "deleted htaccess for '" . str_replace($userinfo['documentroot'], '/', $result['path']) . "'");
				inserttask('1');
				redirectTo($filename, array(
					'page' => $page,
					's' => $s
				));
			} else {
				ask_yesno('extras_reallydelete_pathoptions', $filename, array(
					'id' => $id,
					'page' => $page,
					'action' => $action
				), str_replace($userinfo['documentroot'], '/', $result['path']));
			}
		}
	} elseif ($action == 'add') {
		if (isset($_POST['send']) && $_POST['send'] == 'send') {
			$path = makeCorrectDir(validate($_POST['path'], 'path'));
			$userpath = $path;
			$path = makeCorrectDir($userinfo['documentroot'] . '/' . $path);
			$path_dupe_check_stmt = Database::prepare("SELECT `id`, `path` FROM `" . TABLE_PANEL_HTACCESS . "`
				WHERE `path`= :path
				AND `customerid`= :customerid");
			Database::pexecute($path_dupe_check_stmt, array(
				"path" => $path,
				"customerid" => $userinfo['customerid']
			));
			$path_dupe_check = $path_dupe_check_stmt->fetch(PDO::FETCH_ASSOC);

			if (! $_POST['path']) {
				standard_error('invalidpath');
			}

			if (isset($_POST['options_cgi']) && (int) $_POST['options_cgi'] != 0) {
				$options_cgi = '1';
			} else {
				$options_cgi = '0';
			}

			$error404path = '';
			if (isset($_POST['error404path'])) {
				$error404path = correctErrorDocument($_POST['error404path']);
			}

			$error403path = '';
			if (isset($_POST['error403path'])) {
				$error403path = correctErrorDocument($_POST['error403path']);
			}

			$error500path = '';
			if (isset($_POST['error500path'])) {
				$error500path = correctErrorDocument($_POST['error500path']);
			}

			if ($path_dupe_check['path'] == $path) {
				standard_error('errordocpathdupe', $userpath);
			} elseif ($path == '') {
				standard_error('patherror');
			} else {
				$stmt = Database::prepare('INSERT INTO `' . TABLE_PANEL_HTACCESS . '` SET
					`customerid` = :customerid,
					`path` = :path,
					`options_indexes` = :options_indexes,
					`error404path` = :error404path,
					`error403path` = :error403path,
					`error500path` = :error500path,
					`options_cgi` = :options_cgi');
				$params = array(
					"customerid" => $userinfo['customerid'],
					"path" => $path,
					"options_indexes" => $_POST['options_indexes'] == '1' ? '1' : '0',
					"error403path" => $error403path,
					"error404path" => $error404path,
					"error500path" => $error500path,
					"options_cgi" => $options_cgi
				);
				Database::pexecute($stmt, $params);

				$log->logAction(USR_ACTION, LOG_INFO, "added htaccess for '" . $path . "'");
				inserttask('1');
				redirectTo($filename, array(
					'page' => $page,
					's' => $s
				));
			}
		} else {
			$pathSelect = makePathfield($userinfo['documentroot'], $userinfo['guid'], $userinfo['guid']);
			$cperlenabled = customerHasPerlEnabled($userinfo['customerid']);

			$htaccess_add_data = include_once dirname(__FILE__) . '/lib/formfields/customer/extras/formfield.htaccess_add.php';
			$htaccess_add_form = htmlform::genHTMLForm($htaccess_add_data);

			$title = $htaccess_add_data['htaccess_add']['title'];
			$image = $htaccess_add_data['htaccess_add']['image'];

			eval("echo \"" . getTemplate("extras/htaccess_add") . "\";");
		}
	} elseif (($action == 'edit') && ($id != 0)) {
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_HTACCESS . "`
			WHERE `customerid` = :customerid
			AND `id` = :id");
		Database::pexecute($result_stmt, array(
			"customerid" => $userinfo['customerid'],
			"id" => $id
		));
		$result = $result_stmt->fetch(PDO::FETCH_ASSOC);

		if ((isset($result['customerid'])) && ($result['customerid'] != '') && ($result['customerid'] == $userinfo['customerid'])) {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$option_indexes = intval($_POST['options_indexes']);
				$options_cgi = isset($_POST['options_cgi']) ? intval($_POST['options_cgi']) : 0;

				if ($option_indexes != '1') {
					$option_indexes = '0';
				}

				if ($options_cgi != '1') {
					$options_cgi = '0';
				}

				$error404path = correctErrorDocument($_POST['error404path']);
				$error403path = correctErrorDocument($_POST['error403path']);
				$error500path = correctErrorDocument($_POST['error500path']);

				if (($option_indexes != $result['options_indexes']) || ($error404path != $result['error404path']) || ($error403path != $result['error403path']) || ($error500path != $result['error500path']) || ($options_cgi != $result['options_cgi'])) {
					inserttask('1');
					$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_HTACCESS . "`
						SET `options_indexes` = :options_indexes,
						`error404path` = :error404path,
						`error403path` = :error403path,
						`error500path` = :error500path,
						`options_cgi` = :options_cgi
						WHERE `customerid` = :customerid
						AND `id` = :id");
					$params = array(
						"customerid" => $userinfo['customerid'],
						"options_indexes" => $_POST['options_indexes'] == '1' ? '1' : '0',
						"error403path" => $error403path,
						"error404path" => $error404path,
						"error500path" => $error500path,
						"options_cgi" => $options_cgi,
						"id" => $id
					);
					Database::pexecute($stmt, $params);
					$log->logAction(USR_ACTION, LOG_INFO, "edited htaccess for '" . str_replace($userinfo['documentroot'], '/', $result['path']) . "'");
				}

				redirectTo($filename, array(
					'page' => $page,
					's' => $s
				));
			} else {
				if (strpos($result['path'], $userinfo['documentroot']) === 0) {
					$result['path'] = str_replace($userinfo['documentroot'], "/", $result['path']);
				}

				$result['error404path'] = $result['error404path'];
				$result['error403path'] = $result['error403path'];
				$result['error500path'] = $result['error500path'];
				$cperlenabled = customerHasPerlEnabled($userinfo['customerid']);
				/*
				 * $options_indexes = makeyesno('options_indexes', '1', '0', $result['options_indexes']);
				 * $options_cgi = makeyesno('options_cgi', '1', '0', $result['options_cgi']);
				 */
				$result = htmlentities_array($result);

				$htaccess_edit_data = include_once dirname(__FILE__) . '/lib/formfields/customer/extras/formfield.htaccess_edit.php';
				$htaccess_edit_form = htmlform::genHTMLForm($htaccess_edit_data);

				$title = $htaccess_edit_data['htaccess_edit']['title'];
				$image = $htaccess_edit_data['htaccess_edit']['image'];

				eval("echo \"" . getTemplate("extras/htaccess_edit") . "\";");
			}
		}
	}
} elseif ($page == 'backup') {

	// redirect if this customer sub-page is hidden via settings
	if (Settings::IsInList('panel.customer_hide_options','extras.backup')) {
		redirectTo('customer_index.php');
	}

	if (Settings::Get('system.backupenabled') == 1)
	{
		if ($action == 'abort' && isset($_POST['send']) && $_POST['send'] == 'send') {
			$log->logAction(USR_ACTION, LOG_NOTICE, "customer_extras::backup - aborted scheduled backupjob");
			$entry = isset($_POST['backup_job_entry']) ? (int)$_POST['backup_job_entry'] : 0;
			if ($entry > 0) {
				$del_stmt = Database::prepare("DELETE FROM `".TABLE_PANEL_TASKS."` WHERE `id` = :tid");
				Database::pexecute($del_stmt, array('tid' => $entry));
				standard_success('backupaborted');
			}
			redirectTo($filename, array('page' => $page, 'action' => '', 's' => $s));
		}
		if ($action == '') {
			$log->logAction(USR_ACTION, LOG_NOTICE, "viewed customer_extras::backup");

			// check whether there is a backup-job for this customer
			$sel_stmt = Database::prepare("SELECT * FROM `".TABLE_PANEL_TASKS."` WHERE `type` = '20'");
			Database::pexecute($sel_stmt);
			$existing_backupJob = null;
			while ($entry = $sel_stmt->fetch())
			{
				$data = unserialize($entry['data']);
				if ($data['customerid'] == $userinfo['customerid']) {
					$existing_backupJob = $entry;
					break;
				}
			}

			if (isset($_POST['send']) && $_POST['send'] == 'send') {

				if (! $_POST['path']) {
					standard_error('invalidpath');
				}

				$path = makeCorrectDir(validate($_POST['path'], 'path'));
				$path = makeCorrectDir($userinfo['documentroot'] . '/' . $path);

				$backup_dbs = isset($_POST['backup_dbs']) ? intval($_POST['backup_dbs']) : 0;
				$backup_mail = isset($_POST['backup_mail']) ? intval($_POST['backup_mail']) : 0;
				$backup_web = isset($_POST['backup_web']) ? intval($_POST['backup_web']) : 0;

				if ($backup_dbs != '1') {
					$backup_dbs = '0';
				}

				if ($backup_mail != '1') {
					$backup_mail = '0';
				}

				if ($backup_web != '1') {
					$backup_web = '0';
				}

				$task_data = array(
					'customerid' => $userinfo['customerid'],
					'uid' => $userinfo['guid'],
					'gid' => $userinfo['guid'],
					'loginname' => $userinfo['loginname'],
					'destdir' => $path,
					'backup_dbs' => $backup_dbs,
					'backup_mail' => $backup_mail,
					'backup_web' => $backup_web
				);
				// schedule backup job
				inserttask('20', $task_data);

				standard_success('backupscheduled');
			} else {

				if (!empty($existing_backupJob)) {
					$action = "abort";
					$row = unserialize($entry['data']);
					$row['path'] = makeCorrectDir(str_replace($userinfo['documentroot'], "/", $row['destdir']));
					$row['backup_web'] = ($row['backup_web'] == '1') ? $lng['panel']['yes'] : $lng['panel']['no'];
					$row['backup_mail'] = ($row['backup_mail'] == '1') ? $lng['panel']['yes'] : $lng['panel']['no'];
					$row['backup_dbs'] = ($row['backup_dbs'] == '1') ? $lng['panel']['yes'] : $lng['panel']['no'];
				}
				$pathSelect = makePathfield($userinfo['documentroot'], $userinfo['guid'], $userinfo['guid']);
				$backup_data = include_once dirname(__FILE__) . '/lib/formfields/customer/extras/formfield.backup.php';
				$backup_form = htmlform::genHTMLForm($backup_data);
				$title = $backup_data['backup']['title'];
				$image = $backup_data['backup']['image'];

				if (!empty($existing_backupJob)) {
					// overwrite backup_form after we took everything from it we needed
					eval("\$backup_form = \"" . getTemplate("extras/backup_listexisting") . "\";");
				}
				eval("echo \"" . getTemplate("extras/backup") . "\";");
			}
		}
	}
	else
	{
		standard_error('backupfunctionnotenabled');
	}
}
