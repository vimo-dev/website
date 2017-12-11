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

if ($page == 'ipsandports'
	|| $page == 'overview'
) {
	// Do not display attributes that are not used by the current webserver
	$websrv = Settings::Get('system.webserver');
	$is_nginx = ($websrv == 'nginx');
	$is_apache = ($websrv == 'apache2');
	$is_apache24 = $is_apache && (Settings::Get('system.apache24') === '1');

	if ($action == '') {

		$log->logAction(ADM_ACTION, LOG_NOTICE, "viewed admin_ipsandports");
		$fields = array(
			'ip' => $lng['admin']['ipsandports']['ip'],
			'port' => $lng['admin']['ipsandports']['port']
		);
		$paging = new paging($userinfo, TABLE_PANEL_IPSANDPORTS, $fields);
		$ipsandports = '';
		$result_stmt = Database::prepare("SELECT * FROM `" . TABLE_PANEL_IPSANDPORTS . "` " . $paging->getSqlWhere(false) . " " . $paging->getSqlOrderBy() . " " . $paging->getSqlLimit());
		Database::pexecute($result_stmt);
		$paging->setEntries(Database::num_rows());
		$sortcode = $paging->getHtmlSortCode($lng);
		$arrowcode = $paging->getHtmlArrowCode($filename . '?page=' . $page . '&s=' . $s);
		$searchcode = $paging->getHtmlSearchCode($lng);
		$pagingcode = $paging->getHtmlPagingCode($filename . '?page=' . $page . '&s=' . $s);
		$i = 0;
		$count = 0;

		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {

			if ($paging->checkDisplay($i)) {
				$row = htmlentities_array($row);
				if (filter_var($row['ip'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
					$row['ip'] = '[' . $row['ip'] . ']';
				}
				eval("\$ipsandports.=\"" . getTemplate("ipsandports/ipsandports_ipandport") . "\";");
				$count++;
			}
			$i++;
		}

		eval("echo \"" . getTemplate("ipsandports/ipsandports") . "\";");

	} elseif($action == 'delete'
		&& $id != 0
	) {
		$result_stmt = Database::prepare("SELECT `id`, `ip`, `port` FROM `" . TABLE_PANEL_IPSANDPORTS . "` WHERE `id` = :id");
		$result = Database::pexecute_first($result_stmt, array('id' => $id));

		if (isset($result['id'])
			&& $result['id'] == $id
		) {
			$result_checkdomain_stmt = Database::prepare("
				SELECT `id_domain` as `id` FROM `" . TABLE_DOMAINTOIP . "` WHERE `id_ipandports` = :id"
			);
			$result_checkdomain = Database::pexecute_first($result_checkdomain_stmt, array('id' => $id));

			if ($result_checkdomain['id'] == '') {
				if (!in_array($result['id'], explode(',', Settings::Get('system.defaultip')))) {

					$result_sameipotherport_stmt = Database::prepare("
						SELECT `id` FROM `" . TABLE_PANEL_IPSANDPORTS . "`
						WHERE `ip` = :ip AND `id` <> :id"
					);
					$result_sameipotherport = Database::pexecute_first($result_sameipotherport_stmt, array('id' => $id, 'ip' => $result['ip']));

					if (($result['ip'] != Settings::Get('system.ipaddress'))
						|| ($result['ip'] == Settings::Get('system.ipaddress')
						&& $result_sameipotherport['id'] != '')
					) {
						$result_stmt = Database::prepare("
							SELECT `ip`, `port` FROM `" . TABLE_PANEL_IPSANDPORTS . "`
							WHERE `id` = :id"
						);
						$result = Database::pexecute_first($result_stmt, array('id' => $id));

						if ($result['ip'] != '') {

							if (isset($_POST['send'])
								&& $_POST['send'] == 'send'
							) {
								$del_stmt = Database::prepare("
									DELETE FROM `" . TABLE_PANEL_IPSANDPORTS . "`
									WHERE `id` = :id"
								);
								Database::pexecute($del_stmt, array('id' => $id));

								// also, remove connections to domains (multi-stack)
								$del_stmt = Database::prepare("
									DELETE FROM `".TABLE_DOMAINTOIP."` WHERE `id_ipandports` = :id"
								);
								Database::pexecute($del_stmt, array('id' => $id));

								$log->logAction(ADM_ACTION, LOG_WARNING, "deleted IP/port '" . $result['ip'] . ":" . $result['port'] . "'");
								inserttask('1');
								// Using nameserver, insert a task which rebuilds the server config
								inserttask('4');

								redirectTo($filename, array('page' => $page, 's' => $s));

							} else {
								ask_yesno('admin_ip_reallydelete', $filename, array('id' => $id, 'page' => $page, 'action' => $action), $result['ip'] . ':' . $result['port']);
							}
						}
					} else {
						standard_error('cantdeletesystemip');
					}
				} else {
					standard_error('cantdeletedefaultip');
				}
			} else {
				standard_error('ipstillhasdomains');
			}
		}

	} elseif($action == 'add') {

		if (isset($_POST['send'])
			&& $_POST['send'] == 'send'
		) {

			$ip = validate_ip($_POST['ip']);
			$port = validate($_POST['port'], 'port', '/^(([1-9])|([1-9][0-9])|([1-9][0-9][0-9])|([1-9][0-9][0-9][0-9])|([1-5][0-9][0-9][0-9][0-9])|(6[0-4][0-9][0-9][0-9])|(65[0-4][0-9][0-9])|(655[0-2][0-9])|(6553[0-5]))$/Di', array('stringisempty', 'myport'));
			$listen_statement = isset($_POST['listen_statement']) ? 1 : 0;
			$namevirtualhost_statement = isset($_POST['namevirtualhost_statement']) ? 1 : 0;
			$vhostcontainer = isset($_POST['vhostcontainer']) ? 1 : 0;
			$specialsettings = validate(str_replace("\r\n", "\n", $_POST['specialsettings']), 'specialsettings', '/^[^\0]*$/');
			$vhostcontainer_servername_statement = isset($_POST['vhostcontainer_servername_statement']) ? 1 : 0;
			$default_vhostconf_domain = validate(str_replace("\r\n", "\n", $_POST['default_vhostconf_domain']), 'default_vhostconf_domain', '/^[^\0]*$/');
			$docroot = validate($_POST['docroot'], 'docroot');

			if ((int)Settings::Get('system.use_ssl') == 1) {
				$ssl = isset($_POST['ssl']) ? intval($_POST['ssl']) : 0;
				$ssl_cert_file = validate($_POST['ssl_cert_file'], 'ssl_cert_file');
				$ssl_key_file = validate($_POST['ssl_key_file'], 'ssl_key_file');
				$ssl_ca_file = validate($_POST['ssl_ca_file'], 'ssl_ca_file');
				$ssl_cert_chainfile = validate($_POST['ssl_cert_chainfile'], 'ssl_cert_chainfile');
			} else {
				$ssl = 0;
				$ssl_cert_file = '';
				$ssl_key_file = '';
				$ssl_ca_file = '';
				$ssl_cert_chainfile = '';
			}

			if ($listen_statement != '1') {
				$listen_statement = '0';
			}

			if ($namevirtualhost_statement != '1') {
				$namevirtualhost_statement = '0';
			}

			if ($vhostcontainer != '1') {
				$vhostcontainer = '0';
			}

			if ($vhostcontainer_servername_statement != '1') {
				$vhostcontainer_servername_statement = '0';
			}

			if ($ssl != '1') {
				$ssl = '0';
			}

			if ($ssl_cert_file != '') {
				$ssl_cert_file = makeCorrectFile($ssl_cert_file);
			}

			if ($ssl_key_file != '') {
				$ssl_key_file = makeCorrectFile($ssl_key_file);
			}

			if ($ssl_ca_file != '') {
				$ssl_ca_file = makeCorrectFile($ssl_ca_file);
			}

			if ($ssl_cert_chainfile != '') {
				$ssl_cert_chainfile = makeCorrectFile($ssl_cert_chainfile);
			}

			if (strlen(trim($docroot)) > 0) {
				$docroot = makeCorrectDir($docroot);
			} else {
				$docroot = '';
			}

			$result_checkfordouble_stmt = Database::prepare("
				SELECT `id` FROM `" . TABLE_PANEL_IPSANDPORTS . "`
				WHERE `ip` = :ip AND `port` = :port"
			);
			$result_checkfordouble = Database::pexecute_first($result_checkfordouble_stmt, array('ip' => $ip, 'port' => $port));

			if ($result_checkfordouble['id'] != '') {
				standard_error('myipnotdouble');
			} else {
				$ins_stmt = Database::prepare("
					INSERT INTO `" . TABLE_PANEL_IPSANDPORTS . "`
					SET
						`ip` = :ip, `port` = :port, `listen_statement` = :ls,
						`namevirtualhost_statement` = :nvhs, `vhostcontainer` = :vhc,
						`vhostcontainer_servername_statement` = :vhcss,
						`specialsettings` = :ss, `ssl` = :ssl,
						`ssl_cert_file` = :ssl_cert, `ssl_key_file` = :ssl_key,
						`ssl_ca_file` = :ssl_ca, `ssl_cert_chainfile` = :ssl_chain,
						`default_vhostconf_domain` = :dvhd, `docroot` = :docroot;
				");
				$ins_data = array(
					'ip' => $ip,
					'port' => $port,
					'ls' => $listen_statement,
					'nvhs' => $namevirtualhost_statement,
					'vhc' => $vhostcontainer,
					'vhcss' => $vhostcontainer_servername_statement,
					'ss' => $specialsettings,
					'ssl' => $ssl,
					'ssl_cert' => $ssl_cert_file,
					'ssl_key' => $ssl_key_file,
					'ssl_ca' => $ssl_ca_file,
					'ssl_chain' => $ssl_cert_chainfile,
					'dvhd' => $default_vhostconf_domain,
					'docroot' => $docroot
				);
				Database::pexecute($ins_stmt, $ins_data);

				if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
					$ip = '[' . $ip . ']';
				}

				$log->logAction(ADM_ACTION, LOG_WARNING, "added IP/port '" . $ip . ":" . $port . "'");
				inserttask('1');
				// Using nameserver, insert a task which rebuilds the server config
				inserttask('4');
				redirectTo($filename, Array('page' => $page, 's' => $s));
			}

		} else {

			$ipsandports_add_data = include_once dirname(__FILE__).'/lib/formfields/admin/ipsandports/formfield.ipsandports_add.php';
			$ipsandports_add_form = htmlform::genHTMLForm($ipsandports_add_data);

			$title = $ipsandports_add_data['ipsandports_add']['title'];
			$image = $ipsandports_add_data['ipsandports_add']['image'];

			eval("echo \"" . getTemplate("ipsandports/ipsandports_add") . "\";");
		}

	} elseif($action == 'edit'
		&& $id != 0
	) {
		$result_stmt = Database::prepare("
			SELECT * FROM `" . TABLE_PANEL_IPSANDPORTS . "` WHERE `id` = :id"
		);
		$result = Database::pexecute_first($result_stmt, array('id' => $id));

		if ($result['ip'] != '') {

			if (isset($_POST['send'])
				&& $_POST['send'] == 'send'
			) {

				$ip = validate_ip($_POST['ip']);
				$port = validate($_POST['port'], 'port', '/^(([1-9])|([1-9][0-9])|([1-9][0-9][0-9])|([1-9][0-9][0-9][0-9])|([1-5][0-9][0-9][0-9][0-9])|(6[0-4][0-9][0-9][0-9])|(65[0-4][0-9][0-9])|(655[0-2][0-9])|(6553[0-5]))$/Di', array('stringisempty', 'myport'));
				$listen_statement = isset($_POST['listen_statement']) ? 1 : 0;
				$namevirtualhost_statement = isset($_POST['namevirtualhost_statement']) ? 1 : 0;
				$vhostcontainer = isset($_POST['vhostcontainer']) ? 1 : 0;
				$specialsettings = validate(str_replace("\r\n", "\n", $_POST['specialsettings']), 'specialsettings', '/^[^\0]*$/');
				$vhostcontainer_servername_statement = isset($_POST['vhostcontainer_servername_statement']) ? 1 : 0;
				$default_vhostconf_domain = validate(str_replace("\r\n", "\n", $_POST['default_vhostconf_domain']), 'default_vhostconf_domain', '/^[^\0]*$/');
				$docroot =  validate($_POST['docroot'], 'docroot');

				$result_checkfordouble_stmt = Database::prepare("
					SELECT `id` FROM `" . TABLE_PANEL_IPSANDPORTS . "`
					WHERE `ip` = :ip AND `port` = :port"
				);
				$result_checkfordouble = Database::pexecute_first($result_checkfordouble_stmt, array('ip' => $ip, 'port' => $port));

				$result_sameipotherport_stmt = Database::prepare("
					SELECT `id` FROM `" . TABLE_PANEL_IPSANDPORTS . "`
					WHERE `ip` = :ip AND `id` <> :id"
				);
				$result_sameipotherport = Database::pexecute_first($result_sameipotherport_stmt, array('ip' => $ip, 'id' => $id));

				if ((int)Settings::Get('system.use_ssl') == 1
					&& isset($_POST['ssl'])
					&& $_POST['ssl'] != 0
				) {
					$ssl = 1;
					$ssl_cert_file = validate($_POST['ssl_cert_file'], 'ssl_cert_file');
					$ssl_key_file = validate($_POST['ssl_key_file'], 'ssl_key_file');
					$ssl_ca_file = validate($_POST['ssl_ca_file'], 'ssl_ca_file');
					$ssl_cert_chainfile = validate($_POST['ssl_cert_chainfile'], 'ssl_cert_chainfile');
				} else {
					$ssl = 0;
					$ssl_cert_file = '';
					$ssl_key_file = '';
					$ssl_ca_file = '';
					$ssl_cert_chainfile = '';
				}

				if ($listen_statement != '1') {
					$listen_statement = '0';
				}

				if ($namevirtualhost_statement != '1') {
					$namevirtualhost_statement = '0';
				}

				if ($vhostcontainer != '1') {
					$vhostcontainer = '0';
				}

				if ($vhostcontainer_servername_statement != '1') {
					$vhostcontainer_servername_statement = '0';
				}

				if ($ssl != '1') {
					$ssl = '0';
				}

				if ($ssl_cert_file != '') {
					$ssl_cert_file = makeCorrectFile($ssl_cert_file);
				}

				if ($ssl_key_file != '') {
					$ssl_key_file = makeCorrectFile($ssl_key_file);
				}

				if ($ssl_ca_file != '') {
					$ssl_ca_file = makeCorrectFile($ssl_ca_file);
				}

				if ($ssl_cert_chainfile != '') {
					$ssl_cert_chainfile = makeCorrectFile($ssl_cert_chainfile);
				}

				if (strlen(trim($docroot)) > 0) {
					$docroot = makeCorrectDir($docroot);
				} else {
					$docroot = '';
				}

				if ($result['ip'] != $ip
					&& $result['ip'] == Settings::Get('system.ipaddress')
					&& $result_sameipotherport['id'] == ''
				) {
					standard_error('cantchangesystemip');

				} elseif($result_checkfordouble['id'] != ''
					&& $result_checkfordouble['id'] != $id
				) {
					standard_error('myipnotdouble');

				} else {

					$upd_stmt = Database::prepare("
						UPDATE `" . TABLE_PANEL_IPSANDPORTS . "`
						SET
							`ip` = :ip, `port` = :port, `listen_statement` = :ls,
							`namevirtualhost_statement` = :nvhs, `vhostcontainer` = :vhc,
							`vhostcontainer_servername_statement` = :vhcss,
							`specialsettings` = :ss, `ssl` = :ssl,
							`ssl_cert_file` = :ssl_cert, `ssl_key_file` = :ssl_key,
							`ssl_ca_file` = :ssl_ca, `ssl_cert_chainfile` = :ssl_chain,
							`default_vhostconf_domain` = :dvhd, `docroot` = :docroot
						WHERE `id` = :id;
					");
					$upd_data = array(
						'ip' => $ip,
						'port' => $port,
						'ls' => $listen_statement,
						'nvhs' => $namevirtualhost_statement,
						'vhc' => $vhostcontainer,
						'vhcss' => $vhostcontainer_servername_statement,
						'ss' => $specialsettings,
						'ssl' => $ssl,
						'ssl_cert' => $ssl_cert_file,
						'ssl_key' => $ssl_key_file,
						'ssl_ca' => $ssl_ca_file,
						'ssl_chain' => $ssl_cert_chainfile,
						'dvhd' => $default_vhostconf_domain,
						'docroot' => $docroot,
						'id' => $id
					);
					Database::pexecute($upd_stmt, $upd_data);

					$log->logAction(ADM_ACTION, LOG_WARNING, "changed IP/port from '" . $result['ip'] . ":" . $result['port'] . "' to '" . $ip . ":" . $port . "'");
					inserttask('1');

					// Using nameserver, insert a task which rebuilds the server config
					inserttask('4');

					redirectTo($filename, Array('page' => $page, 's' => $s));
				}

			} else {

				$result = htmlentities_array($result);

				$ipsandports_edit_data = include_once dirname(__FILE__).'/lib/formfields/admin/ipsandports/formfield.ipsandports_edit.php';
				$ipsandports_edit_form = htmlform::genHTMLForm($ipsandports_edit_data);

				$title = $ipsandports_edit_data['ipsandports_edit']['title'];
				$image = $ipsandports_edit_data['ipsandports_edit']['image'];

				eval("echo \"" . getTemplate("ipsandports/ipsandports_edit") . "\";");
			}
		}
	}
}
