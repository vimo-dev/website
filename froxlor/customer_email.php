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
if (Settings::IsInList('panel.customer_hide_options','email')) {
	redirectTo('customer_index.php');
}

if (isset($_POST['id'])) {
	$id = intval($_POST['id']);
} elseif (isset($_GET['id'])) {
	$id = intval($_GET['id']);
}

if ($page == 'overview') {
	$log->logAction(USR_ACTION, LOG_NOTICE, "viewed customer_email");
	eval("echo \"" . getTemplate("email/email") . "\";");
} elseif ($page == 'emails') {
	if ($action == '') {
		$log->logAction(USR_ACTION, LOG_NOTICE, "viewed customer_email::emails");
		$fields = array(
			'd.domain' => $lng['domains']['domainname'],
			'm.email_full' => $lng['emails']['emailaddress'],
			'm.destination' => $lng['emails']['forwarders']
		);
		$paging = new paging($userinfo, TABLE_MAIL_VIRTUAL, $fields);
		$result_stmt = Database::prepare('SELECT `m`.`id`, `m`.`domainid`, `m`.`email`, `m`.`email_full`, `m`.`iscatchall`, `u`.`quota`, `m`.`destination`, `m`.`popaccountid`, `d`.`domain`, `u`.`mboxsize` FROM `' . TABLE_MAIL_VIRTUAL . '` `m`
			LEFT JOIN `' . TABLE_PANEL_DOMAINS . '` `d` ON (`m`.`domainid` = `d`.`id`)
			LEFT JOIN `' . TABLE_MAIL_USERS . '` `u` ON (`m`.`popaccountid` = `u`.`id`)
			WHERE `m`.`customerid`= :customerid ' . $paging->getSqlWhere(true) . " " . $paging->getSqlOrderBy() . " " . $paging->getSqlLimit()
		);
		Database::pexecute($result_stmt, array("customerid" => $userinfo['customerid']));
		$emailscount = Database::num_rows();
		$paging->setEntries($emailscount);
		$sortcode = $paging->getHtmlSortCode($lng);
		$arrowcode = $paging->getHtmlArrowCode($filename . '?page=' . $page . '&s=' . $s);
		$searchcode = $paging->getHtmlSearchCode($lng);
		$pagingcode = $paging->getHtmlPagingCode($filename . '?page=' . $page . '&s=' . $s);
		$emails = array();

		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
			if (!isset($emails[$row['domain']]) || !is_array($emails[$row['domain']])) {
				$emails[$row['domain']] = array();
			}

			$emails[$row['domain']][$row['email_full']] = $row;
		}

		if ($paging->sortfield == 'd.domain' && $paging->sortorder == 'desc') {
			krsort($emails);
		} else {
			ksort($emails);
		}

		$i = 0;
		$count = 0;
		$accounts = '';
		$emails_count = 0;
		$domainname = '';
		foreach ($emails as $domainid => $emailaddresses) {
			if ($paging->sortfield == 'm.email_full' && $paging->sortorder == 'desc') {
				krsort($emailaddresses);
			} else {
				ksort($emailaddresses);
			}

			foreach ($emailaddresses as $row) {
				if ($paging->checkDisplay($i)) {
					if ($domainname != $idna_convert->decode($row['domain'])) {
						$domainname = $idna_convert->decode($row['domain']);
						eval("\$accounts.=\"" . getTemplate("email/emails_domain") . "\";");
					}

					$emails_count++;
					$row['email'] = $idna_convert->decode($row['email']);
					$row['email_full'] = $idna_convert->decode($row['email_full']);
					$row['destination'] = explode(' ', $row['destination']);
					uasort($row['destination'], 'strcasecmp');

					while (list($dest_id, $destination) = each($row['destination'])) {
						$row['destination'][$dest_id] = $idna_convert->decode($row['destination'][$dest_id]);

						if ($row['destination'][$dest_id] == $row['email_full']) {
							unset($row['destination'][$dest_id]);
						}
					}

					$destinations_count = count($row['destination']);
					$row['destination'] = implode(', ', $row['destination']);

					if (strlen($row['destination']) > 35) {
						$row['destination'] = substr($row['destination'], 0, 32) . '... (' . $destinations_count . ')';
					}

					$row['mboxsize'] = size_readable($row['mboxsize'], 'GiB', 'bi', '%01.' . (int)Settings::Get('panel.decimal_places') . 'f %s');

					$row = htmlentities_array($row);
					eval("\$accounts.=\"" . getTemplate("email/emails_email") . "\";");
					$count++;
				}

				$i++;
			}
		}

		$emaildomains_count_stmt = Database::prepare("SELECT COUNT(`id`) AS `count` FROM `" . TABLE_PANEL_DOMAINS . "`
			WHERE `customerid`= :customerid
			AND `isemaildomain`='1' ORDER BY `domain` ASC"
		);
		Database::pexecute($emaildomains_count_stmt, array("customerid" => $userinfo['customerid']));
		$emaildomains_count = $emaildomains_count_stmt->fetch(PDO::FETCH_ASSOC);
		$emaildomains_count = $emaildomains_count['count'];

		eval("echo \"" . getTemplate("email/emails") . "\";");
	} elseif ($action == 'delete' && $id != 0) {
		$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid`, `popaccountid` FROM `" . TABLE_MAIL_VIRTUAL . "`
			WHERE `customerid`= :customerid
			AND `id`= :id"
		);
		$result = Database::pexecute_first($stmt, array("customerid" => $userinfo['customerid'], "id" => $id));

		if (isset($result['email']) && $result['email'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$update_users_query_addon = '';

				if ($result['destination'] != '') {
					$result['destination'] = explode(' ', $result['destination']);
					$number_forwarders = count($result['destination']);

					if ($result['popaccountid'] != 0) {
						// Free the Quota used by the email account
						if (Settings::Get('system.mail_quota_enabled') == 1) {
							$stmt = Database::prepare("SELECT `quota` FROM `" . TABLE_MAIL_USERS . "`
								WHERE `customerid`= :customerid
								AND `id`= :id"
							);
							$res_quota = Database::pexecute_first($stmt, array("customerid" => $userinfo['customerid'], "id" => $result['popaccountid']));
							$update_users_query_addon.= " , `email_quota_used` = `email_quota_used` - " . (int)$res_quota['quota'] . " ";
						}

						$stmt = Database::prepare("DELETE FROM `" . TABLE_MAIL_USERS . "`
							WHERE `customerid`= :customerid
							AND `id`= :id"
						);
						Database::pexecute($stmt, array("customerid" => $userinfo['customerid'], "id" => $result['popaccountid']));
						$update_users_query_addon .= " , `email_accounts_used` = `email_accounts_used` - 1 ";
						$number_forwarders-= 1;
						$log->logAction(USR_ACTION, LOG_NOTICE, "deleted forwarder for email address '" . $result['email'] . "'");
					}
				} else {
					$number_forwarders = 0;
				}

				if (isset($_POST['delete_userfiles'])
					&& (int)$_POST['delete_userfiles'] == 1
				) {
					inserttask('7', $userinfo['loginname'], $result['email_full']);
				}

				$stmt = Database::prepare("DELETE FROM `" . TABLE_MAIL_VIRTUAL . "`
					WHERE `customerid`= :customerid
					AND `id`= :id"
				);
				Database::pexecute($stmt, array("customerid" => $userinfo['customerid'], "id" => $id));

				$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_CUSTOMERS . "`
					SET `emails_used`=`emails_used` - 1 ,
					`email_forwarders_used` = `email_forwarders_used` - :nforwarders
					$update_users_query_addon
					WHERE `customerid`= :customerid"
				);
				Database::pexecute($stmt, array("nforwarders" => $number_forwarders, "customerid" => $userinfo['customerid']));

				$log->logAction(USR_ACTION, LOG_INFO, "deleted email address '" . $result['email'] . "'");
				redirectTo($filename, array('page' => $page, 's' => $s));
			} else {
				if ($result['popaccountid'] != '0') {
					$show_checkbox = true;
				} else {
					$show_checkbox = false;
				}
				ask_yesno_withcheckbox('email_reallydelete', 'admin_customer_alsoremovemail', $filename, array('id' => $id, 'page' => $page, 'action' => $action), $idna_convert->decode($result['email_full']), $show_checkbox);
			}
		}
	} elseif ($action == 'add') {
		if ($userinfo['emails_used'] < $userinfo['emails'] || $userinfo['emails'] == '-1') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$email_part = $_POST['email_part'];
				// domain does not need idna encoding as the value of the select-box is already Punycode
				$domain = validate($_POST['domain'], 'domain');
				$stmt = Database::prepare("SELECT `id`, `domain`, `customerid` FROM `" . TABLE_PANEL_DOMAINS . "`
					WHERE `domain`= :domain
					AND `customerid`= :customerid
					AND `isemaildomain`='1' "
				);
				$domain_check = Database::pexecute_first($stmt, array("domain" => $domain, "customerid" => $userinfo['customerid']));

				if (isset($_POST['iscatchall']) && $_POST['iscatchall'] == '1') {
					$iscatchall = '1';
					$email = '@' . $domain;
				} else {
					$iscatchall = '0';
					$email = $email_part . '@' . $domain;
				}

				$email_full = $email_part . '@' . $domain;

				if (!validateEmail($email_full)) {
					standard_error('emailiswrong', $email_full);
				}

				$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid` FROM `" . TABLE_MAIL_VIRTUAL . "`
					WHERE (`email` = :email
					OR `email_full` = :emailfull )
					AND `customerid`= :cid"
				);
				$params = array(
					"email" => $email,
					"emailfull" => $email_full,
					"cid" => $userinfo['customerid']
				);
				$email_check = Database::pexecute_first($stmt, $params);

				if ($email == '' || $email_full == '' || $email_part == '') {
					standard_error(array('stringisempty', 'emailadd'));
				} elseif ($domain == '') {
					standard_error('domaincantbeempty');
				} elseif ($domain_check['domain'] != $domain) {
					standard_error('maindomainnonexist', $domain);
				} elseif (strtolower($email_check['email_full']) == strtolower($email_full)) {
					standard_error('emailexistalready', $email_full);
				} elseif ($email_check['email'] == $email) {
					standard_error('youhavealreadyacatchallforthisdomain');
				} else {
					$stmt = Database::prepare("INSERT INTO `" . TABLE_MAIL_VIRTUAL . "`
						(`customerid`, `email`, `email_full`, `iscatchall`, `domainid`)
						VALUES (:cid, :email, :email_full, :iscatchall, :domainid)"
					);
					$params = array(
						"cid" => $userinfo['customerid'],
						"email" => $email,
						"email_full" => $email_full,
						"iscatchall" => $iscatchall,
						"domainid" => $domain_check['id']
					);
					Database::pexecute($stmt, $params);

					$address_id = Database::lastInsertId();
					$stmt = Database::prepare("UPDATE " . TABLE_PANEL_CUSTOMERS . "
						SET `emails_used` = `emails_used` + 1
						WHERE `customerid`= :cid"
					);
					Database::pexecute($stmt, array("cid" => $userinfo['customerid']));

					$log->logAction(USR_ACTION, LOG_INFO, "added email address '" . $email_full . "'");
					redirectTo($filename, array('page' => $page, 'action' => 'edit', 'id' => $address_id, 's' => $s));
				}
			} else {
				$result_stmt = Database::prepare("SELECT `id`, `domain`, `customerid` FROM `" . TABLE_PANEL_DOMAINS . "`
					WHERE `customerid`= :cid
					AND `isemaildomain`='1'
					ORDER BY `domain` ASC"
				);
				Database::pexecute($result_stmt, array("cid" => $userinfo['customerid']));
				$domains = '';

				while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
					$domains.= makeoption($idna_convert->decode($row['domain']), $row['domain']);
				}

				//$iscatchall = makeyesno('iscatchall', '1', '0', '0');

				$email_add_data = include_once dirname(__FILE__).'/lib/formfields/customer/email/formfield.emails_add.php';

				if (Settings::Get('catchall.catchall_enabled') != '1') {
					unset($email_add_data['emails_add']['sections']['section_a']['fields']['iscatchall']);
				}

				$email_add_form = htmlform::genHTMLForm($email_add_data);

				$title = $email_add_data['emails_add']['title'];
				$image = $email_add_data['emails_add']['image'];

				eval("echo \"" . getTemplate("email/emails_add") . "\";");
			}
		} else {
			standard_error('allresourcesused');
		}
	} elseif ($action == 'edit' && $id != 0) {
		$stmt = Database::prepare("SELECT `v`.`id`, `v`.`email`, `v`.`email_full`, `v`.`iscatchall`, `v`.`destination`, `v`.`customerid`, `v`.`popaccountid`, `u`.`quota`
			FROM `" . TABLE_MAIL_VIRTUAL . "` `v`
			LEFT JOIN `" . TABLE_MAIL_USERS . "` `u`
			ON(`v`.`popaccountid` = `u`.`id`)
			WHERE `v`.`customerid`= :cid
			AND `v`.`id`= :id"
		);
		$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

		if (isset($result['email']) && $result['email'] != '') {
			$result['email'] = $idna_convert->decode($result['email']);
			$result['email_full'] = $idna_convert->decode($result['email_full']);
			$result['destination'] = explode(' ', $result['destination']);
			uasort($result['destination'], 'strcasecmp');
			$forwarders = '';
			$forwarders_count = 0;

			while (list($dest_id, $destination) = each($result['destination'])) {
				$destination = $idna_convert->decode($destination);

				if ($destination != $result['email_full'] && $destination != '') {
					eval("\$forwarders.=\"" . getTemplate("email/emails_edit_forwarder") . "\";");
					$forwarders_count++;
				}

				$result['destination'][$dest_id] = $destination;
			}

			$destinations_count = count($result['destination']);
			$result = htmlentities_array($result);

			$email_edit_data = include_once dirname(__FILE__).'/lib/formfields/customer/email/formfield.emails_edit.php';

			if (Settings::Get('catchall.catchall_enabled') != '1') {
				unset($email_edit_data['emails_edit']['sections']['section_a']['fields']['mail_catchall']);
			}

			$email_edit_form = htmlform::genHTMLForm($email_edit_data);

			$title = $email_edit_data['emails_edit']['title'];
			$image = $email_edit_data['emails_edit']['image'];

			eval("echo \"" . getTemplate("email/emails_edit") . "\";");
		}
	} elseif ($action == 'togglecatchall' && $id != 0) {
		if (Settings::Get('catchall.catchall_enabled') == '1') {
			$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid`, `popaccountid` FROM `" . TABLE_MAIL_VIRTUAL . "`
				WHERE `customerid`= :cid
				AND `id`= :id"
			);
			$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

			if (isset($result['email']) && $result['email'] != '') {
				if ($result['iscatchall'] == '1') {
					$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_VIRTUAL . "`
						SET `email` = :email, `iscatchall` = '0'
						WHERE `customerid`= :cid
						AND `id`= :id"
					);
					$params = array(
						"email" => $result['email_full'],
						"cid" => $userinfo['customerid'],
						"id" => $id
					);
					Database::pexecute($stmt, $params);
				} else {
					$email_parts = explode('@', $result['email_full']);
					$email = '@' . $email_parts[1];
					$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid` FROM `" . TABLE_MAIL_VIRTUAL . "`
						WHERE `email`= :email
						AND `customerid`= :cid"
					);
					$email_check = Database::pexecute_first($stmt, array("email" => $email, "cid" => $userinfo['customerid']));

					if ($email_check['email'] == $email) {
						standard_error('youhavealreadyacatchallforthisdomain');
					} else {
						$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_VIRTUAL . "`
							SET `email` = :email , `iscatchall` = '1'
							WHERE `customerid`= :cid
							AND `id`= :id"
						);
						$params = array(
							"email" => $email,
							"cid" => $userinfo['customerid'],
							"id" => $id
						);
						Database::pexecute($stmt, $params);
						$log->logAction(USR_ACTION, LOG_INFO, "edited email address '" . $email . "'");
					}
				}

				redirectTo($filename, array('page' => $page, 'action' => 'edit', 'id' => $id, 's' => $s));
			}
		} else {
			standard_error(array('operationnotpermitted', 'featureisdisabled'), 'Catchall');
		}
	}
} elseif ($page == 'accounts') {
	if ($action == 'add' && $id != 0) {
		// ensure the int is a positive one
		if (isset($_POST['email_quota'])) {
			$quota = validate($_POST['email_quota'], 'email_quota', '/^\d+$/', 'vmailquotawrong');
		}

		if ($userinfo['email_accounts'] == '-1' || ($userinfo['email_accounts_used'] < $userinfo['email_accounts'])) {

			// check for imap||pop3 == 1, see #1298
			if ($userinfo['imap'] != '1' && $userinfo['pop3'] != '1') {
				standard_error('notallowedtouseaccounts');
			}

			$stmt = Database::prepare("
			    SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid`, `popaccountid`, `domainid`
			    FROM `" . TABLE_MAIL_VIRTUAL . "`
			    WHERE `customerid`= :cid AND `id`= :id
			");
			$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

			if (isset($result['email']) && $result['email'] != '' && $result['popaccountid'] == '0') {
				if (isset($_POST['send']) && $_POST['send'] == 'send') {
					$email_full = $result['email_full'];
					$username = $idna_convert->decode($email_full);
					$password = validate($_POST['email_password'], 'password');
					$password = validatePassword($password);

					if (Settings::Get('panel.sendalternativemail') == 1) {
						$alternative_email = $idna_convert->encode(validate($_POST['alternative_email'], 'alternative_email'));
					} else {
						$alternative_email = '';
					}

					if (Settings::Get('system.mail_quota_enabled') == 1) {
						if ($userinfo['email_quota'] != '-1' && ($quota == 0 || ($quota + $userinfo['email_quota_used']) > $userinfo['email_quota'])) {
							standard_error('allocatetoomuchquota', $quota);
						}
					} else {
						$quota = 0;
					}

					if ($email_full == '') {
						standard_error(array('stringisempty', 'emailadd'));
					}
					elseif ($password == '' && !(Settings::Get('panel.sendalternativemail') == 1 && validateEmail($alternative_email))) {
						standard_error(array('stringisempty', 'mypassword'));
					}
					elseif ($password == $email_full) {
						standard_error('passwordshouldnotbeusername');
					} else {
						if ($password == '') {
							$password = generatePassword();
						}

						$cryptPassword = makeCryptPassword($password);

						$email_user=substr($email_full,0,strrpos($email_full,"@"));
						$email_domain=substr($email_full,strrpos($email_full,"@")+1);
						$maildirname=trim(Settings::Get('system.vmail_maildirname'));
						// Add trailing slash to Maildir if needed
						$maildirpath=$maildirname;
						if (!empty($maildirname) && substr($maildirname,-1) != "/") {
							$maildirpath.="/";
						}

						$stmt = Database::prepare("INSERT INTO `" . TABLE_MAIL_USERS . "`
							(`customerid`, `email`, `username`, " . (Settings::Get('system.mailpwcleartext') == '1' ? '`password`, ' : '') . " `password_enc`, `homedir`, `maildir`, `uid`, `gid`, `domainid`, `postfix`, `quota`, `imap`, `pop3`) ".
							"VALUES (:cid, :email, :username, " . (Settings::Get('system.mailpwcleartext') == '1' ? ":password, " : '') . ":password_enc, :homedir, :maildir, :uid, :gid, :domainid, 'y', :quota, :imap, :pop3)"
						);
						$params = array(
							"cid" => $userinfo['customerid'],
							"email" => $email_full,
							"username" => $username,
							"password_enc" => $cryptPassword,
							"homedir" => Settings::Get('system.vmail_homedir'),
							"maildir" => $userinfo['loginname'] . '/' . $email_domain . "/" . $email_user . "/" . $maildirpath,
							"uid" => Settings::Get('system.vmail_uid'),
							"gid" => Settings::Get('system.vmail_gid'),
							"domainid" => $result['domainid'],
							"quota" => $quota,
							"imap" => $userinfo['imap'],
							"pop3" => $userinfo['pop3']
						);
						if (Settings::Get('system.mailpwcleartext') == '1') { $params["password"] = $password; }
						Database::pexecute($stmt, $params);

						$popaccountid = Database::lastInsertId();
						$result['destination'].= ' ' . $email_full;
						$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_VIRTUAL . "`
							SET `destination` = :destination,
								`popaccountid` = :popaccountid
							WHERE `customerid`= :cid
							AND `id`= :id"
						);
						$params = array(
							"destination" => makeCorrectDestination($result['destination']),
							"popaccountid" => $popaccountid,
							"cid" => $userinfo['customerid'],
							"id" => $id
						);
						Database::pexecute($stmt, $params);

						$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_CUSTOMERS . "`
							SET `email_accounts_used`=`email_accounts_used`+1,
								`email_quota_used`=`email_quota_used`+ :quota
							WHERE `customerid`= :cid"
						);
						Database::pexecute($stmt, array("quota" => $quota, "cid" => $userinfo['customerid']));

						$log->logAction(USR_ACTION, LOG_INFO, "added email account for '" . $email_full . "'");
						$replace_arr = array(
							'EMAIL' => $email_full,
							'USERNAME' => $username,
							'PASSWORD' => $password
						);

						$stmt = Database::prepare("SELECT `name`, `email` FROM `" . TABLE_PANEL_ADMINS . "` WHERE `adminid`= :adminid");
						$admin = Database::pexecute_first($stmt, array("adminid" => $userinfo['adminid']));

						$stmt = Database::prepare("SELECT `value` FROM `" . TABLE_PANEL_TEMPLATES . "`
							WHERE `adminid`= :adminid
							AND `language`= :lang
							AND `templategroup`= 'mails'
							AND `varname`= 'pop_success_subject'"
						);
						$result = Database::pexecute_first($stmt, array("adminid" => $userinfo['adminid'], "lang" => $userinfo['def_language']));
						$mail_subject = html_entity_decode(replace_variables((($result['value'] != '') ? $result['value'] : $lng['mails']['pop_success']['subject']), $replace_arr));

						$stmt = Database::prepare("SELECT `value` FROM `" . TABLE_PANEL_TEMPLATES . "`
							WHERE `adminid`= :adminid
							AND `language`= :lang
							AND `templategroup`= 'mails'
							AND `varname`= 'pop_success_mailbody'"
						);
						$result = Database::pexecute_first($stmt, array("adminid" => $userinfo['adminid'], "lang" => $userinfo['def_language']));
						$mail_body = html_entity_decode(replace_variables((($result['value'] != '') ? $result['value'] : $lng['mails']['pop_success']['mailbody']), $replace_arr));

						$_mailerror = false;
						try {
							$mail->SetFrom($admin['email'], getCorrectUserSalutation($admin));
							$mail->Subject = $mail_subject;
							$mail->AltBody = $mail_body;
							$mail->MsgHTML(str_replace("\n", "<br />", $mail_body));
							$mail->AddAddress($email_full);
							$mail->Send();
						} catch(phpmailerException $e) {
							$mailerr_msg = $e->errorMessage();
							$_mailerror = true;
						} catch (Exception $e) {
							$mailerr_msg = $e->getMessage();
							$_mailerror = true;
						}

						if ($_mailerror) {
							$log->logAction(USR_ACTION, LOG_ERR, "Error sending mail: " . $mailerr_msg);
							standard_error('errorsendingmail', $email_full);
						}

						$mail->ClearAddresses();

						if (validateEmail($alternative_email) && Settings::Get('panel.sendalternativemail') == 1) {
							$stmt = Database::prepare("SELECT `value` FROM `" . TABLE_PANEL_TEMPLATES . "`
								WHERE `adminid`= :adminid
								AND `language`= :lang
								AND `templategroup`= 'mails'
								AND `varname`= 'pop_success_alternative_subject'"
							);
							$result = Database::pexecute_first($stmt, array("adminid" => $userinfo['adminid'], "lang" => $userinfo['def_language']));
							$mail_subject = replace_variables((($result['value'] != '') ? $result['value'] : $lng['mails']['pop_success_alternative']['subject']), $replace_arr);

							$stmt = Database::prepare("SELECT `value` FROM `" . TABLE_PANEL_TEMPLATES . "`
								WHERE `adminid`= :adminid
								AND `language`= :lang
								AND `templategroup`= 'mails'
								AND `varname`= 'pop_success_alternative_mailbody'"
							);
							$result = Database::pexecute_first($stmt, array("adminid" => $userinfo['adminid'], "lang" => $userinfo['def_language']));
							$mail_body = replace_variables((($result['value'] != '') ? $result['value'] : $lng['mails']['pop_success_alternative']['mailbody']), $replace_arr);

							$_mailerror = false;
							try {
								$mail->SetFrom($admin['email'], getCorrectUserSalutation($admin));
								$mail->Subject = $mail_subject;
								$mail->AltBody = $mail_body;
								$mail->MsgHTML(str_replace("\n", "<br />", $mail_body));
								$mail->AddAddress($idna_convert->encode($alternative_email), getCorrectUserSalutation($userinfo));
								$mail->Send();
							} catch(phpmailerException $e) {
								$mailerr_msg = $e->errorMessage();
								$_mailerror = true;
							} catch (Exception $e) {
								$mailerr_msg = $e->getMessage();
								$_mailerror = true;
							}

							if ($_mailerror) {
								$log->logAction(USR_ACTION, LOG_ERR, "Error sending mail: " . $mailerr_msg);
								standard_error(array('errorsendingmail'), $alternative_email);
							}

							$mail->ClearAddresses();
						}

						redirectTo($filename, array('page' => 'emails', 'action' => 'edit', 'id' => $id, 's' => $s));
					}
				} else {

					if (checkMailAccDeletionState($result['email_full'])) {
					   standard_error(array('mailaccistobedeleted'), $result['email_full']);
					}

					$result['email_full'] = $idna_convert->decode($result['email_full']);
					$result = htmlentities_array($result);
					$quota = Settings::Get('system.mail_quota');

					$account_add_data = include_once dirname(__FILE__) . '/lib/formfields/customer/email/formfield.emails_addaccount.php';
					$account_add_form = htmlform::genHTMLForm($account_add_data);

					$title = $account_add_data['emails_addaccount']['title'];
					$image = $account_add_data['emails_addaccount']['image'];

					eval("echo \"" . getTemplate("email/account_add") . "\";");
				}
			}
		} else {
			standard_error(array('allresourcesused', 'allocatetoomuchquota'), $quota);
		}
	} elseif ($action == 'changepw' && $id != 0) {
		$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid`, `popaccountid` FROM `" . TABLE_MAIL_VIRTUAL . "`
			WHERE `customerid`= :cid
			AND `id`= :id"
		);
		$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

		if (isset($result['popaccountid']) && $result['popaccountid'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$password = validate($_POST['email_password'], 'password');

				if ($password == '') {
					standard_error(array('stringisempty', 'mypassword'));
				}
				elseif ($password == $result['email_full']) {
					standard_error('passwordshouldnotbeusername');
				}

				$password = validatePassword($password);

				$log->logAction(USR_ACTION, LOG_NOTICE, "changed email password for '" . $result['email_full'] . "'");
				$cryptPassword = makeCryptPassword($password);
				$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_USERS . "`
					SET " . (Settings::Get('system.mailpwcleartext') == '1' ? "`password` = :password, " : '') . "
						`password_enc`= :password_enc
					WHERE `customerid`= :cid
					AND `id`= :id"
				);
				$params = array(
					"password_enc" => $cryptPassword,
					"cid" => $userinfo['customerid'],
					"id" => $result['popaccountid']
				);
				if (Settings::Get('system.mailpwcleartext') == '1') { $params["password"] = $password; }
				Database::pexecute($stmt, $params);

				redirectTo($filename, array('page' => 'emails', 'action' => 'edit', 'id' => $id, 's' => $s));
			} else {
				$result['email_full'] = $idna_convert->decode($result['email_full']);
				$result = htmlentities_array($result);

				$account_changepw_data = include_once dirname(__FILE__).'/lib/formfields/customer/email/formfield.emails_accountchangepasswd.php';
				$account_changepw_form = htmlform::genHTMLForm($account_changepw_data);

				$title = $account_changepw_data['emails_accountchangepasswd']['title'];
				$image = $account_changepw_data['emails_accountchangepasswd']['image'];

				eval("echo \"" . getTemplate("email/account_changepw") . "\";");
			}
		}
	} elseif ($action == 'changequota' && Settings::Get('system.mail_quota_enabled') == '1' && $id != 0) {
		$stmt = Database::prepare("SELECT `v`.`id`, `v`.`email`, `v`.`email_full`, `v`.`iscatchall`, `v`.`destination`, `v`.`customerid`, `v`.`popaccountid`, `u`.`quota`
			FROM `" . TABLE_MAIL_VIRTUAL . "` `v`
			LEFT JOIN `" . TABLE_MAIL_USERS . "` `u`
			ON(`v`.`popaccountid` = `u`.`id`)
			WHERE `v`.`customerid`= :cid
			AND `v`.`id`= :id"
		);
		$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

		if (isset($result['popaccountid']) && $result['popaccountid'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$quota = (int)validate($_POST['email_quota'], 'email_quota', '/^\d+$/', 'vmailquotawrong');

				if ($userinfo['email_quota'] != '-1' && ($quota == 0 || ($quota + $userinfo['email_quota_used'] - $result['quota']) > $userinfo['email_quota'])) {
					standard_error('allocatetoomuchquota', $quota);
				} else {
					$log->logAction(USR_ACTION, LOG_NOTICE, "updated quota for email address '" . $result['email'] . "' to " . $quota . " MB");
					$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_USERS . "`
						SET `quota` = :quota
						WHERE `id` = :id
						AND `customerid`= :cid"
					);
					$params = array(
						"quota" => $quota,
						"id" => $result['popaccountid'],
						"cid" => $userinfo['customerid']
					);
					Database::pexecute($stmt, $params);

					if ($userinfo['email_quota'] != '-1') {
						$new_used_quota = $userinfo['email_quota_used'] + ($quota - $result['quota']);
						$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_CUSTOMERS . "`
							SET `email_quota_used` = :used
							WHERE `customerid` = :cid"
						);
						Database::pexecute($stmt, array("used" => $new_used_quota, "cid" => $userinfo['customerid']));
					}

					redirectTo($filename, array('page' => 'emails', 'action' => 'edit', 'id' => $id, 's' => $s));
				}
			} else {
				$result['email_full'] = $idna_convert->decode($result['email_full']);
				$result = htmlentities_array($result);

				$quota_edit_data = include_once dirname(__FILE__).'/lib/formfields/customer/email/formfield.emails_accountchangequota.php';
				$quota_edit_form = htmlform::genHTMLForm($quota_edit_data);

				$title = $quota_edit_data['emails_accountchangequota']['title'];
				$image = $quota_edit_data['emails_accountchangequota']['image'];

				eval("echo \"" . getTemplate("email/account_changequota") . "\";");
			}
		}
	} elseif ($action == 'delete' && $id != 0) {
		$stmt = Database::prepare("SELECT `v`.`id`, `v`.`email`, `v`.`email_full`, `v`.`iscatchall`, `v`.`destination`, `v`.`customerid`, `v`.`popaccountid`, `u`.`quota`
			FROM `" . TABLE_MAIL_VIRTUAL . "` `v`
			LEFT JOIN `" . TABLE_MAIL_USERS . "` `u`
			ON(`v`.`popaccountid` = `u`.`id`)
			WHERE `v`.`customerid`='" . (int)$userinfo['customerid'] . "'
			AND `v`.`id`='" . (int)$id . "'"
		);
		$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

		if (isset($result['popaccountid']) && $result['popaccountid'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				$stmt = Database::prepare("DELETE FROM `" . TABLE_MAIL_USERS . "`
					WHERE `customerid`= :cid
					AND `id`= :id"
				);
				Database::pexecute($stmt, array("cid" => $userinfo['customerid'], "id" => $result['popaccountid']));
				$result['destination'] = str_replace($result['email_full'], '', $result['destination']);

				$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_VIRTUAL . "`
					SET `destination` = :dest,
						`popaccountid` = '0'
					WHERE `customerid`= :cid
					AND `id`= :id"
				);
				$params = array(
					"dest" => makeCorrectDestination($result['destination']),
					"cid" => $userinfo['customerid'],
					"id" => $id
				);
				Database::pexecute($stmt, $params);

				if (Settings::Get('system.mail_quota_enabled') == '1' && $userinfo['email_quota'] != '-1') {
					$quota = (int)$result['quota'];
				} else {
					$quota = 0;
				}

				if (isset($_POST['delete_userfiles']) && (int)$_POST['delete_userfiles'] == 1) {
					inserttask('7', $userinfo['loginname'], $result['email_full']);
				}

				$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_CUSTOMERS . "`
					SET `email_accounts_used` = `email_accounts_used` - 1,
						`email_quota_used` = `email_quota_used` - :quota
					WHERE `customerid`= :cid"
				);
				Database::pexecute($stmt, array("quota" => $quota, "cid" => $userinfo['customerid']));

				$log->logAction(USR_ACTION, LOG_INFO, "deleted email account for '" . $result['email_full'] . "'");
				redirectTo($filename, array('page' => 'emails', 'action' => 'edit', 'id' => $id, 's' => $s));
			} else {
				ask_yesno_withcheckbox('email_reallydelete_account', 'admin_customer_alsoremovemail', $filename, array('id' => $id, 'page' => $page, 'action' => $action), $idna_convert->decode($result['email_full']));
			}
		}
	}
} elseif ($page == 'forwarders') {
	if ($action == 'add' && $id != 0) {
		if ($userinfo['email_forwarders_used'] < $userinfo['email_forwarders'] || $userinfo['email_forwarders'] == '-1') {
			$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid`, `popaccountid`, `domainid` FROM `" . TABLE_MAIL_VIRTUAL . "`
				WHERE `customerid`= :cid
				AND `id`= :id"
			);
			$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid'], "id" => $id));

			if (isset($result['email']) && $result['email'] != '') {
				if (isset($_POST['send']) && $_POST['send'] == 'send') {
					$destination = $idna_convert->encode($_POST['destination']);
					$result['destination_array'] = explode(' ', $result['destination']);

					if ($destination == '') {
						standard_error('destinationnonexist');
					} elseif (!validateEmail($destination)) {
						standard_error('destinationiswrong', $destination);
					} elseif ($destination == $result['email']) {
						standard_error('destinationalreadyexistasmail', $destination);
					} elseif (in_array($destination, $result['destination_array'])) {
						standard_error('destinationalreadyexist', $destination);
					} else {
						$result['destination'].= ' ' . $destination;
						$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_VIRTUAL . "`
							SET `destination` = :dest
							WHERE `customerid`= :cid
							AND `id`= :id"
						);
						$params = array(
							"dest" => makeCorrectDestination($result['destination']),
							"cid" => $userinfo['customerid'],
							"id" => $id
						);
						Database::pexecute($stmt, $params);

						$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_CUSTOMERS . "`
							SET `email_forwarders_used` = `email_forwarders_used` + 1
							WHERE `customerid`= :cid"
						);
						Database::pexecute($stmt, array("cid" => $userinfo['customerid']));

						$log->logAction(USR_ACTION, LOG_NOTICE, "added email forwarder for '" . $result['email_full'] . "'");
						redirectTo($filename, array('page' => 'emails', 'action' => 'edit', 'id' => $id, 's' => $s));
					}
				} else {
					$result['email_full'] = $idna_convert->decode($result['email_full']);
					$result = htmlentities_array($result);

					$forwarder_add_data = include_once dirname(__FILE__).'/lib/formfields/customer/email/formfield.emails_addforwarder.php';
					$forwarder_add_form = htmlform::genHTMLForm($forwarder_add_data);

					$title = $forwarder_add_data['emails_addforwarder']['title'];
					$image = $forwarder_add_data['emails_addforwarder']['image'];

					eval("echo \"" . getTemplate("email/forwarder_add") . "\";");
				}
			}
		} else {
			standard_error('allresourcesused');
		}
	} elseif ($action == 'delete' && $id != 0) {
		$stmt = Database::prepare("SELECT `id`, `email`, `email_full`, `iscatchall`, `destination`, `customerid`, `popaccountid` FROM `" . TABLE_MAIL_VIRTUAL . "`
			WHERE `customerid`='" . (int)$userinfo['customerid'] . "'
			AND `id`='" . (int)$id . "'"
		);
		$result = Database::pexecute_first($stmt, array("cid" => $userinfo['customerid']));

		if (isset($result['destination']) && $result['destination'] != '') {
			if (isset($_POST['forwarderid'])) {
				$forwarderid = intval($_POST['forwarderid']);
			} elseif (isset($_GET['forwarderid'])) {
				$forwarderid = intval($_GET['forwarderid']);
			} else {
				$forwarderid = 0;
			}

			$result['destination'] = explode(' ', $result['destination']);

			if (isset($result['destination'][$forwarderid]) && $result['email'] != $result['destination'][$forwarderid]) {
				$forwarder = $result['destination'][$forwarderid];

				if (isset($_POST['send']) && $_POST['send'] == 'send') {
					unset($result['destination'][$forwarderid]);
					$result['destination'] = implode(' ', $result['destination']);
					$stmt = Database::prepare("UPDATE `" . TABLE_MAIL_VIRTUAL . "`
						SET `destination` = :dest
						WHERE `customerid`= :cid
						AND `id`= :id"
					);
					$params = array(
						"dest" => makeCorrectDestination($result['destination']),
						"cid" => $userinfo['customerid'],
						"id" => $id
					);
					Database::pexecute($stmt, $params);

					$stmt = Database::prepare("UPDATE `" . TABLE_PANEL_CUSTOMERS . "`
						SET `email_forwarders_used` = `email_forwarders_used` - 1
						WHERE `customerid`= :cid"
					);
					Database::pexecute($stmt, array("cid" => $userinfo['customerid']));

					$log->logAction(USR_ACTION, LOG_NOTICE, "deleted email forwarder for '" . $result['email_full'] . "'");
					redirectTo($filename, array('page' => 'emails', 'action' => 'edit', 'id' => $id, 's' => $s));
				} else {
					ask_yesno('email_reallydelete_forwarder', $filename, array('id' => $id, 'forwarderid' => $forwarderid, 'page' => $page, 'action' => $action), $idna_convert->decode($result['email_full']) . ' -> ' . $idna_convert->decode($forwarder));
				}
			}
		}
	}
}
