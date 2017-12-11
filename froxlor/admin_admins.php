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

define('AREA', 'admin');
require './lib/init.php';

if (isset($_POST['id'])) {
	$id = intval($_POST['id']);
} elseif(isset($_GET['id'])) {
	$id = intval($_GET['id']);
}

if ($page == 'admins'
	&& $userinfo['change_serversettings'] == '1'
) {

	if ($action == '') {

		$log->logAction(ADM_ACTION, LOG_NOTICE, "viewed admin_admins");
		$fields = array(
			'loginname' => $lng['login']['username'],
			'name' => $lng['customer']['name'],
			'diskspace' => $lng['customer']['diskspace'],
			'diskspace_used' => $lng['customer']['diskspace'] . ' (' . $lng['panel']['used'] . ')',
			'traffic' => $lng['customer']['traffic'],
			'traffic_used' => $lng['customer']['traffic'] . ' (' . $lng['panel']['used'] . ')',
			'deactivated' => $lng['admin']['deactivated']
		);
		$paging = new paging($userinfo, TABLE_PANEL_ADMINS, $fields);
		$admins = '';
		$result_stmt = Database::query("SELECT * FROM `" . TABLE_PANEL_ADMINS . "` " . $paging->getSqlWhere(false) . " " . $paging->getSqlOrderBy() . " " . $paging->getSqlLimit());
		$numrows_admins = Database::num_rows();
		$paging->setEntries($numrows_admins);
		$sortcode = $paging->getHtmlSortCode($lng, true);
		$arrowcode = $paging->getHtmlArrowCode($filename . '?page=' . $page . '&s=' . $s);
		$searchcode = $paging->getHtmlSearchCode($lng);
		$pagingcode = $paging->getHtmlPagingCode($filename . '?page=' . $page . '&s=' . $s);
		$i = 0;
		$count = 0;

		$dec_places = Settings::Get('panel.decimal_places');

		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {

			if ($paging->checkDisplay($i)) {

				$row['traffic_used'] = round($row['traffic_used'] / (1024 * 1024), $dec_places);
				$row['traffic'] = round($row['traffic'] / (1024 * 1024), $dec_places);
				$row['diskspace_used'] = round($row['diskspace_used'] / 1024, $dec_places);
				$row['diskspace'] = round($row['diskspace'] / 1024, $dec_places);

				// percent-values for progressbar
				// For Disk usage
				if ($row['diskspace'] > 0) {
					$disk_percent = round(($row['diskspace_used']*100)/$row['diskspace'], 0);
					$disk_doublepercent = round($disk_percent*2, 2);
				} else {
					$disk_percent = 0;
					$disk_doublepercent = 0;
				}
				// For Traffic usage
				if ($row['traffic'] > 0) {
					$traffic_percent = round(($row['traffic_used']*100)/$row['traffic'], 0);
					$traffic_doublepercent = round($traffic_percent*2, 2);
				} else {
					$traffic_percent = 0;
					$traffic_doublepercent = 0;
				}

				// fix progress-bars if value is >100%
				if ($disk_percent > 100) {
					$disk_percent = 100;
				}
				if ($traffic_percent > 100) {
					$traffic_percent = 100;
				}

				$row = str_replace_array('-1', 'UL', $row, 'customers domains diskspace traffic mysqls emails email_accounts email_forwarders email_quota ftps subdomains tickets');
				$row = htmlentities_array($row);

				$row['custom_notes'] = ($row['custom_notes'] != '') ? nl2br($row['custom_notes']) : '';

				eval("\$admins.=\"" . getTemplate("admins/admins_admin") . "\";");
				$count++;
			}
			$i++;
		}

		$admincount = $numrows_admins;
		eval("echo \"" . getTemplate("admins/admins") . "\";");

	} elseif($action == 'su') {

		$result_stmt = Database::prepare("
			SELECT * FROM `" . TABLE_PANEL_ADMINS . "` WHERE `adminid` = :adminid
		");
		$result = Database::pexecute_first($result_stmt, array('adminid' => $id));
		$destination_admin = $result['loginname'];

		if ($destination_admin != ''
			&& $result['adminid'] != $userinfo['userid']
		) {
			$result_stmt = Database::prepare("
				SELECT * FROM `" . TABLE_PANEL_SESSIONS . "` WHERE `userid` = :userid
			");
			$result = Database::pexecute_first($result_stmt, array('userid' => $userinfo['userid']));

			$s = md5(uniqid(microtime(), 1));
			$ins_stmt = Database::prepare("
				INSERT INTO `" . TABLE_PANEL_SESSIONS . "` SET
				`hash` = :hash, `userid` = :userid, `ipaddress` = :ip,
				`useragent` = :ua, `lastactivity` = :la,
				`language` = :lang, `adminsession` = '1'
			");
			$ins_data = array(
				'hash' => $s,
				'userid' => $id,
				'ip' => $result['ipaddress'],
				'ua' => $result['useragent'],
				'la' => time(),
				'lang' => $result['language']
			);
			Database::pexecute($ins_stmt, $ins_data);
			$log->logAction(ADM_ACTION, LOG_INFO, "switched adminuser and is now '" . $destination_admin . "'");
			redirectTo('admin_index.php', array('s' => $s));

		} else {
			redirectTo('index.php', array('action' => 'login'));
		}

	} elseif ($action == 'delete'
		&& $id != 0
	) {
		$result_stmt = Database::prepare("
			SELECT * FROM `" . TABLE_PANEL_ADMINS . "` WHERE `adminid` = :adminid
		");
		$result = Database::pexecute_first($result_stmt, array('adminid' => $id));

		if ($result['loginname'] != '') {
			if ($result['adminid'] == $userinfo['userid']) {
				standard_error('youcantdeleteyourself');
			}

			if (isset($_POST['send'])
				&& $_POST['send'] == 'send'
			) {
				$del_stmt = Database::prepare("
					DELETE FROM `" . TABLE_PANEL_ADMINS . "` WHERE `adminid` = :adminid
				");
				Database::pexecute($del_stmt, array('adminid' => $id));

				$del_stmt = Database::prepare("
					DELETE FROM `" . TABLE_PANEL_TRAFFIC_ADMINS . "` WHERE `adminid` = :adminid
				");
				Database::pexecute($del_stmt, array('adminid' => $id));

				$upd_stmt = Database::prepare("
					UPDATE `" . TABLE_PANEL_CUSTOMERS . "` SET
					`adminid` = :userid WHERE `adminid` = :adminid
				");
				Database::pexecute($upd_stmt, array('userid' => $userinfo['userid'], 'adminid' => $id));

				$upd_stmt = Database::prepare("
					UPDATE `" . TABLE_PANEL_DOMAINS . "` SET
					`adminid` = :userid WHERE `adminid` = :adminid
				");
				Database::pexecute($upd_stmt, array('userid' => $userinfo['userid'], 'adminid' => $id));

				$log->logAction(ADM_ACTION, LOG_INFO, "deleted admin '" . $result['loginname'] . "'");
				updateCounters();
				redirectTo($filename, array('page' => $page, 's' => $s));

			} else {
				ask_yesno('admin_admin_reallydelete', $filename, array('id' => $id, 'page' => $page, 'action' => $action), $result['loginname']);
			}
		}

	} elseif($action == 'add') {

		if (isset($_POST['send'])
			&& $_POST['send'] == 'send'
		) {

			$name = validate($_POST['name'], 'name');
			$email = $idna_convert->encode(validate($_POST['email'], 'email'));

			$custom_notes = validate(str_replace("\r\n", "\n", $_POST['custom_notes']), 'custom_notes', '/^[^\0]*$/');
			$custom_notes_show = 0;
			if (isset($_POST['custom_notes_show'])) {
			    $custom_notes_show = intval_ressource($_POST['custom_notes_show']);
			}

			$loginname = validate($_POST['loginname'], 'loginname');
			$password = validate($_POST['admin_password'], 'password');
			$password = validatePassword($password);
			$def_language = validate($_POST['def_language'], 'default language');

			$customers = intval_ressource($_POST['customers']);
			if (isset($_POST['customers_ul'])) {
				$customers = -1;
			}

			$domains = intval_ressource($_POST['domains']);
			if (isset($_POST['domains_ul'])) {
				$domains = -1;
			}

			$subdomains = intval_ressource($_POST['subdomains']);
			if (isset($_POST['subdomains_ul'])) {
				$subdomains = -1;
			}

			$emails = intval_ressource($_POST['emails']);
			if (isset($_POST['emails_ul'])) {
				$emails = -1;
			}

			$email_accounts = intval_ressource($_POST['email_accounts']);
			if (isset($_POST['email_accounts_ul'])) {
				$email_accounts = -1;
			}

			$email_forwarders = intval_ressource($_POST['email_forwarders']);
			if (isset($_POST['email_forwarders_ul'])) {
				$email_forwarders = -1;
			}

			if (Settings::Get('system.mail_quota_enabled') == '1') {

				$email_quota = validate($_POST['email_quota'], 'email_quota', '/^\d+$/', 'vmailquotawrong', array('0', ''));
				if (isset($_POST['email_quota_ul'])) {
					$email_quota = -1;
				}
			} else {
				$email_quota = -1;
			}

			$ftps = intval_ressource($_POST['ftps']);
			if (isset($_POST['ftps_ul'])) {
				$ftps = -1;
			}

			if (Settings::Get('ticket.enabled') == 1) {

				$tickets = intval_ressource($_POST['tickets']);
				if (isset($_POST['tickets_ul'])) {
					$tickets = -1;
				}
			} else {
				$tickets = 0;
			}

			$mysqls = intval_ressource($_POST['mysqls']);
			if (isset($_POST['mysqls_ul'])) {
				$mysqls = -1;
			}

			$customers_see_all = 0;
			if (isset($_POST['customers_see_all'])) {
				$customers_see_all = intval($_POST['customers_see_all']);
			}

			$domains_see_all = 0;
			if (isset($_POST['domains_see_all'])) {
				$domains_see_all = intval($_POST['domains_see_all']);
			}

			$caneditphpsettings = 0;
			if (isset($_POST['caneditphpsettings'])) {
				$caneditphpsettings = intval($_POST['caneditphpsettings']);
			}

			$change_serversettings = 0;
			if (isset($_POST['change_serversettings'])) {
				$change_serversettings = intval($_POST['change_serversettings']);
			}

			$diskspace = intval_ressource($_POST['diskspace']);
			if (isset($_POST['diskspace_ul'])) {
				$diskspace = -1;
			}

			$traffic = doubleval_ressource($_POST['traffic']);
			if (isset($_POST['traffic_ul'])) {
				$traffic = -1;
			}

			$tickets_see_all = 0;
			if (isset($_POST['tickets_see_all'])) {
				$tickets_see_all = intval($_POST['tickets_see_all']);
			}

			$diskspace = $diskspace * 1024;
			$traffic = $traffic * 1024 * 1024;
			$ipaddress = intval_ressource($_POST['ipaddress']);

			// Check if the account already exists
			$loginname_check_stmt = Database::prepare("
				SELECT `loginname` FROM `" . TABLE_PANEL_CUSTOMERS . "` WHERE `loginname` = :login
			");
			$loginname_check = Database::pexecute_first($loginname_check_stmt, array('login' => $loginname));

			$loginname_check_admin_stmt = Database::prepare("
				SELECT `loginname` FROM `" . TABLE_PANEL_ADMINS . "` WHERE `loginname` = :login
			");
			$loginname_check_admin = Database::pexecute_first($loginname_check_admin_stmt, array('login' => $loginname));

			if ($loginname == '') {
				standard_error(array('stringisempty', 'myloginname'));
			}
			elseif (strtolower($loginname_check['loginname']) == strtolower($loginname)
				|| strtolower($loginname_check_admin['loginname']) == strtolower($loginname)
			) {
				standard_error('loginnameexists', $loginname);
			}
			// Accounts which match systemaccounts are not allowed, filtering them
			elseif (preg_match('/^' . preg_quote(Settings::Get('customer.accountprefix'), '/') . '([0-9]+)/', $loginname)) {
				standard_error('loginnameissystemaccount', Settings::Get('customer.accountprefix'));
			}
			elseif (!validateUsername($loginname)) {
				standard_error('loginnameiswrong', $loginname);
			}
			elseif ($name == '') {
				standard_error(array('stringisempty', 'myname'));
			}
			elseif ($email == '') {
				standard_error(array('stringisempty', 'emailadd'));
			}
			elseif ($password == '') {
				standard_error(array('stringisempty', 'mypassword'));
			}
			elseif (!validateEmail($email)) {
				standard_error('emailiswrong', $email);

			} else {

				if ($customers_see_all != '1') {
					$customers_see_all = '0';
				}

				if ($domains_see_all != '1') {
					$domains_see_all = '0';
				}

				if ($caneditphpsettings != '1') {
					$caneditphpsettings = '0';
				}

				if ($change_serversettings != '1') {
					$change_serversettings = '0';
				}

				if ($tickets_see_all != '1') {
					$tickets_see_all  = '0';
				}

				$_theme = Settings::Get('panel.default_theme');

				$ins_data = array(
					'loginname' => $loginname,
					'password' => makeCryptPassword($password),
					'name' => $name,
					'email' => $email,
					'lang' => $def_language,
					'change_serversettings' => $change_serversettings,
					'customers' => $customers,
					'customers_see_all' => $customers_see_all,
					'domains' => $domains,
					'domains_see_all' => $domains_see_all,
					'caneditphpsettings' => $caneditphpsettings,
					'diskspace' => $diskspace,
					'traffic' => $traffic,
					'subdomains' => $subdomains,
					'emails' => $emails,
					'accounts' => $email_accounts,
					'forwarders' => $email_forwarders,
					'quota' => $email_quota,
					'ftps' => $ftps,
					'tickets' => $tickets,
					'tickets_see_all' => $tickets_see_all,
					'mysqls' => $mysqls,
					'ip' => $ipaddress,
					'theme' => $_theme,
					'custom_notes' => $custom_notes,
					'custom_notes_show' => $custom_notes_show
				);

				$ins_stmt = Database::prepare("
					INSERT INTO `" . TABLE_PANEL_ADMINS . "` SET
					`loginname` = :loginname,
					`password` = :password,
					`name` = :name,
					`email` = :email,
					`def_language` = :lang,
					`change_serversettings` = :change_serversettings,
					`customers` = :customers,
					`customers_see_all` = :customers_see_all,
					`domains` = :domains,
					`domains_see_all` = :domains_see_all,
					`caneditphpsettings` = :caneditphpsettings,
					`diskspace` = :diskspace,
					`traffic` = :traffic,
					`subdomains` = :subdomains,
					`emails` = :emails,
					`email_accounts` = :accounts,
					`email_forwarders` = :forwarders,
					`email_quota` = :quota,
					`ftps` = :ftps,
					`tickets` = :tickets,
					`tickets_see_all` = :tickets_see_all,
					`mysqls` = :mysqls,
					`ip` = :ip,
					`theme` = :theme,
					`custom_notes` = :custom_notes,
					`custom_notes_show` = :custom_notes_show
				");
				Database::pexecute($ins_stmt, $ins_data);

				$adminid = Database::lastInsertId();
				$log->logAction(ADM_ACTION, LOG_INFO, "added admin '" . $loginname . "'");
				redirectTo($filename, array('page' => $page, 's' => $s));
			}

		} else {

			$language_options = '';
			while (list($language_file, $language_name) = each($languages)) {
				$language_options.= makeoption($language_name, $language_file, $userinfo['language'], true);
			}

			$ipaddress = makeoption($lng['admin']['allips'], "-1");
			$ipsandports_stmt = Database::query("
				SELECT `id`, `ip` FROM `" . TABLE_PANEL_IPSANDPORTS . "` GROUP BY `ip` ORDER BY `ip` ASC
			");

			while ($row = $ipsandports_stmt->fetch(PDO::FETCH_ASSOC)) {
				$ipaddress.= makeoption($row['ip'], $row['id']);
			}

			$customers_ul = makecheckbox('customers_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$diskspace_ul = makecheckbox('diskspace_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$traffic_ul = makecheckbox('traffic_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$domains_ul = makecheckbox('domains_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$subdomains_ul = makecheckbox('subdomains_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$emails_ul = makecheckbox('emails_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$email_accounts_ul = makecheckbox('email_accounts_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$email_forwarders_ul = makecheckbox('email_forwarders_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$email_quota_ul = makecheckbox('email_quota_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$ftps_ul = makecheckbox('ftps_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$tickets_ul = makecheckbox('tickets_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);
			$mysqls_ul = makecheckbox('mysqls_ul', $lng['customer']['unlimited'], '-1', false, '0', true, true);

			$admin_add_data = include_once dirname(__FILE__).'/lib/formfields/admin/admin/formfield.admin_add.php';
			$admin_add_form = htmlform::genHTMLForm($admin_add_data);

			$title = $admin_add_data['admin_add']['title'];
			$image = $admin_add_data['admin_add']['image'];

			eval("echo \"" . getTemplate("admins/admins_add") . "\";");
		}

	} elseif($action == 'edit'
		&& $id != 0
	) {

		$result_stmt = Database::prepare("
			SELECT * FROM `" . TABLE_PANEL_ADMINS . "` WHERE `adminid` = :adminid
		");
		$result = Database::pexecute_first($result_stmt, array('adminid' => $id));

		if ($result['loginname'] != '') {

			if (isset($_POST['send'])
				&& $_POST['send'] == 'send'
			) {
				$name = validate($_POST['name'], 'name');
				$email = $idna_convert->encode(validate($_POST['email'], 'email'));

				$custom_notes = validate(str_replace("\r\n", "\n", $_POST['custom_notes']), 'custom_notes', '/^[^\0]*$/');
				$custom_notes_show = $result['custom_notes_show'];
				if (isset($_POST['custom_notes_show'])) {
				    $custom_notes_show = intval_ressource($_POST['custom_notes_show']);
				}

				if ($result['adminid'] == $userinfo['userid']) {

					$password = '';
					$def_language = $result['def_language'];
					$deactivated = $result['deactivated'];
					$customers = $result['customers'];
					$domains = $result['domains'];
					$subdomains = $result['subdomains'];
					$emails = $result['emails'];
					$email_accounts = $result['email_accounts'];
					$email_forwarders = $result['email_forwarders'];
					$email_quota = $result['email_quota'];
					$ftps = $result['ftps'];
					$tickets = $result['tickets'];
					$mysqls = $result['mysqls'];
					$tickets_see_all = $result['tickets_see_all'];
					$customers_see_all = $result['customers_see_all'];
					$domains_see_all = $result['domains_see_all'];
					$caneditphpsettings = $result['caneditphpsettings'];
					$change_serversettings = $result['change_serversettings'];
					$diskspace = $result['diskspace'];
					$traffic = $result['traffic'];
					$ipaddress = $result['ip'];

				} else {

					$password = validate($_POST['admin_password'], 'new password');
					$def_language = validate($_POST['def_language'], 'default language');
					$deactivated = isset($_POST['deactivated']) ? 1 : 0;

					$customers = intval_ressource($_POST['customers']);
					if (isset($_POST['customers_ul'])) {
						$customers = -1;
					}

					$domains = intval_ressource($_POST['domains']);
					if (isset($_POST['domains_ul'])) {
						$domains = -1;
					}

					$subdomains = intval_ressource($_POST['subdomains']);
					if (isset($_POST['subdomains_ul'])) {
						$subdomains = -1;
					}

					$emails = intval_ressource($_POST['emails']);
					if (isset($_POST['emails_ul'])) {
						$emails = -1;
					}

					$email_accounts = intval_ressource($_POST['email_accounts']);
					if (isset($_POST['email_accounts_ul'])) {
						$email_accounts = -1;
					}

					$email_forwarders = intval_ressource($_POST['email_forwarders']);
					if (isset($_POST['email_forwarders_ul'])) {
						$email_forwarders = -1;
					}

					if (Settings::Get('system.mail_quota_enabled') == '1') {
						$email_quota = validate($_POST['email_quota'], 'email_quota', '/^\d+$/', 'vmailquotawrong', array('0', ''));
						if (isset($_POST['email_quota_ul'])) {
							$email_quota = -1;
						}
					} else {
						$email_quota = -1;
					}

					$ftps = intval_ressource($_POST['ftps']);
					if (isset($_POST['ftps_ul'])) {
						$ftps = -1;
					}

					if (Settings::Get('ticket.enabled') == 1) {
						$tickets = intval_ressource($_POST['tickets']);
						if (isset($_POST['tickets_ul'])) {
							$tickets = -1;
						}
					} else {
						$tickets = 0;
					}

					$mysqls = intval_ressource($_POST['mysqls']);
					if (isset($_POST['mysqls_ul'])) {
						$mysqls = -1;
					}

					$customers_see_all = 0;
					if (isset($_POST['customers_see_all'])) {
						$customers_see_all = intval($_POST['customers_see_all']);
					}

					$domains_see_all = 0;
					if (isset($_POST['domains_see_all'])) {
						$domains_see_all = intval($_POST['domains_see_all']);
					}

					$caneditphpsettings = 0;
					if (isset($_POST['caneditphpsettings'])) {
						$caneditphpsettings = intval($_POST['caneditphpsettings']);
					}

					$change_serversettings = 0;
					if (isset($_POST['change_serversettings'])) {
						$change_serversettings = isset($_POST['change_serversettings']) ? 1 : 0;
					}

					$tickets_see_all = 0;
					if (isset($_POST['tickets_see_all'])) {
						$tickets_see_all = intval($_POST['tickets_see_all']);
					}

					$diskspace = intval($_POST['diskspace']);
					if (isset($_POST['diskspace_ul'])) {
						$diskspace = -1;
					}

					$traffic = doubleval_ressource($_POST['traffic']);
					if (isset($_POST['traffic_ul'])) {
						$traffic = -1;
					}

					$diskspace = $diskspace * 1024;
					$traffic = $traffic * 1024 * 1024;
					$ipaddress = intval_ressource($_POST['ipaddress']);
				}

				if ($name == '') {
					standard_error(array('stringisempty', 'myname'));
				} elseif($email == '') {
					standard_error(array('stringisempty', 'emailadd'));
				} elseif(!validateEmail($email)) {
					standard_error('emailiswrong', $email);
				} else {
					if ($password != '') {
						$password = validatePassword($password);
						$password = makeCryptPassword($password);
					} else {
						$password = $result['password'];
					}

					if ($deactivated != '1') {
						$deactivated = '0';
					}

					if ($customers_see_all != '1') {
						$customers_see_all = '0';
					}

					if ($domains_see_all != '1') {
						$domains_see_all = '0';
					}

					if ($caneditphpsettings != '1') {
						$caneditphpsettings = '0';
					}

					if ($change_serversettings != '1') {
						$change_serversettings = '0';
					}

					if ($tickets_see_all != '1') {
						$tickets_see_all = '0';
					}

					// check if a resource was set to something lower
					// than actually used by the admin/reseller
					$res_warning = "";
					if ($customers != $result['customers'] && $customers != -1 && $customers < $result['customers_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'customers');
					}
					if ($domains != $result['domains'] && $domains != -1 && $domains < $result['domains_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'domains');
					}
					if ($diskspace != $result['diskspace'] && ($diskspace / 1024) != -1 && $diskspace < $result['diskspace_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'diskspace');
					}
					if ($traffic != $result['traffic'] && ($traffic / 1024 / 1024) != -1 && $traffic < $result['traffic_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'traffic');
					}
					if ($emails != $result['emails'] && $emails != -1 && $emails < $result['emails_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'emails');
					}
					if ($email_accounts != $result['email_accounts'] && $email_accounts != -1 && $email_accounts < $result['email_accounts_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'email accounts');
					}
					if ($email_forwarders != $result['email_forwarders'] && $email_forwarders != -1 && $email_forwarders < $result['email_forwarders_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'email forwarders');
					}
					if ($email_quota != $result['email_quota'] && $email_quota != -1 && $email_quota < $result['email_quota_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'email quota');
					}
					if ($ftps != $result['ftps'] && $ftps != -1 && $ftps < $result['ftps_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'ftps');
					}
					if ($tickets != $result['tickets'] && $tickets != -1 && $tickets < $result['tickets_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'tickets');
					}
					if ($mysqls != $result['mysqls'] && $mysqls != -1 && $mysqls < $result['mysqls_used']) {
						$res_warning .= sprintf($lng['error']['setlessthanalreadyused'], 'mysqls');
					}

					if ($res_warning != "") {
						$link = '';
						$error = $res_warning;
						eval("echo \"" . getTemplate('misc/error', '1') . "\";");
						exit;
					}

					$upd_data = array(
						'password' => $password,
						'name' => $name,
						'email' => $email,
						'lang' => $def_language,
						'change_serversettings' => $change_serversettings,
						'customers' => $customers,
						'customers_see_all' => $customers_see_all,
						'domains' => $domains,
						'domains_see_all' => $domains_see_all,
						'caneditphpsettings' => $caneditphpsettings,
						'diskspace' => $diskspace,
						'traffic' => $traffic,
						'subdomains' => $subdomains,
						'emails' => $emails,
						'accounts' => $email_accounts,
						'forwarders' => $email_forwarders,
						'quota' => $email_quota,
						'ftps' => $ftps,
						'tickets' => $tickets,
						'tickets_see_all' => $tickets_see_all,
						'mysqls' => $mysqls,
						'ip' => $ipaddress,
						'deactivated' => $deactivated,
						'custom_notes' => $custom_notes,
						'custom_notes_show' => $custom_notes_show,
						'adminid' => $id
					);

					$upd_stmt = Database::prepare("
						UPDATE `" . TABLE_PANEL_ADMINS . "` SET
						`password` = :password,
						`name` = :name,
						`email` = :email,
						`def_language` = :lang,
						`change_serversettings` = :change_serversettings,
						`customers` = :customers,
						`customers_see_all` = :customers_see_all,
						`domains` = :domains,
						`domains_see_all` = :domains_see_all,
						`caneditphpsettings` = :caneditphpsettings,
						`diskspace` = :diskspace,
						`traffic` = :traffic,
						`subdomains` = :subdomains,
						`emails` = :emails,
						`email_accounts` = :accounts,
						`email_forwarders` = :forwarders,
						`email_quota` = :quota,
						`ftps` = :ftps,
						`tickets` = :tickets,
						`tickets_see_all` = :tickets_see_all,
						`mysqls` = :mysqls,
						`ip` = :ip,
						`deactivated` = :deactivated,
						`custom_notes` = :custom_notes,
						`custom_notes_show` = :custom_notes_show
						WHERE `adminid` = :adminid
					");
					Database::pexecute($upd_stmt, $upd_data);

					$log->logAction(ADM_ACTION, LOG_INFO, "edited admin '#" . $id . "'");
					redirectTo($filename, array('page' => $page, 's' => $s));
				}

			} else {

				$dec_places = Settings::Get('panel.decimal_places');
				$result['traffic'] = round($result['traffic'] / (1024 * 1024), $dec_places);
				$result['diskspace'] = round($result['diskspace'] / 1024, $dec_places);
				$result['email'] = $idna_convert->decode($result['email']);

				$customers_ul = makecheckbox('customers_ul', $lng['customer']['unlimited'], '-1', false, $result['customers'], true, true);
				if ($result['customers'] == '-1') {
					$result['customers'] = '';
				}

				$diskspace_ul = makecheckbox('diskspace_ul', $lng['customer']['unlimited'], '-1', false, $result['diskspace'], true, true);
				if ($result['diskspace'] == '-1') {
					$result['diskspace'] = '';
				}

				$traffic_ul = makecheckbox('traffic_ul', $lng['customer']['unlimited'], '-1', false, $result['traffic'], true, true);
				if ($result['traffic'] == '-1') {
					$result['traffic'] = '';
				}

				$domains_ul = makecheckbox('domains_ul', $lng['customer']['unlimited'], '-1', false, $result['domains'], true, true);
				if ($result['domains'] == '-1') {
					$result['domains'] = '';
				}

				$subdomains_ul = makecheckbox('subdomains_ul', $lng['customer']['unlimited'], '-1', false, $result['subdomains'], true, true);
				if ($result['subdomains'] == '-1') {
					$result['subdomains'] = '';
				}

				$emails_ul = makecheckbox('emails_ul', $lng['customer']['unlimited'], '-1', false, $result['emails'], true, true);
				if ($result['emails'] == '-1') {
					$result['emails'] = '';
				}

				$email_accounts_ul = makecheckbox('email_accounts_ul', $lng['customer']['unlimited'], '-1', false, $result['email_accounts'], true, true);
				if ($result['email_accounts'] == '-1') {
					$result['email_accounts'] = '';
				}

				$email_forwarders_ul = makecheckbox('email_forwarders_ul', $lng['customer']['unlimited'], '-1', false, $result['email_forwarders'], true, true);
				if ($result['email_forwarders'] == '-1') {
					$result['email_forwarders'] = '';
				}

				$email_quota_ul = makecheckbox('email_quota_ul', $lng['customer']['unlimited'], '-1', false, $result['email_quota'], true, true);
				if ($result['email_quota'] == '-1') {
					$result['email_quota'] = '';
				}

				$ftps_ul = makecheckbox('ftps_ul', $lng['customer']['unlimited'], '-1', false, $result['ftps'], true, true);
				if ($result['ftps'] == '-1') {
					$result['ftps'] = '';
				}

				$tickets_ul = makecheckbox('tickets_ul', $lng['customer']['unlimited'], '-1', false, $result['tickets'], true, true);
				if ($result['tickets'] == '-1') {
					$result['tickets'] = '';
				}

				$mysqls_ul = makecheckbox('mysqls_ul', $lng['customer']['unlimited'], '-1', false, $result['mysqls'], true, true);
				if ($result['mysqls'] == '-1') {
					$result['mysqls'] = '';
				}

				$language_options = '';
				while (list($language_file, $language_name) = each($languages)) {
					$language_options.= makeoption($language_name, $language_file, $result['def_language'], true);
				}

				$ipaddress = makeoption($lng['admin']['allips'], "-1", $result['ip']);
				$ipsandports_stmt = Database::query("
					SELECT `id`, `ip` FROM `" . TABLE_PANEL_IPSANDPORTS . "` GROUP BY `ip` ORDER BY `ip`, `port` ASC
				");

				while ($row = $ipsandports_stmt->fetch(PDO::FETCH_ASSOC)) {
					$ipaddress.= makeoption($row['ip'], $row['id'], $result['ip']);
				}

				$result = htmlentities_array($result);

				$admin_edit_data = include_once dirname(__FILE__).'/lib/formfields/admin/admin/formfield.admin_edit.php';
				$admin_edit_form = htmlform::genHTMLForm($admin_edit_data);

				$title = $admin_edit_data['admin_edit']['title'];
				$image = $admin_edit_data['admin_edit']['image'];

				eval("echo \"" . getTemplate("admins/admins_edit") . "\";");
			}
		}
	}
}
