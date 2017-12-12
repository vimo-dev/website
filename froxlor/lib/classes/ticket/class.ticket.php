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
 * @author     Michael Kaufmann <mkaufmann@nutime.de>
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Logger
 *
 * @link       http://www.nutime.de/
 *
 * Support Tickets - Tickets-Class
 */

class ticket {

	/**
	 * Userinfo
	 * @var array
	 */
	private $userinfo = array();

	/**
	 * Ticket ID
	 * @var tid
	 */
	private $tid = - 1;

	/**
	 * Ticket Data Array
	 * @var t_data
	 */
	private $t_data = array();

	/**
	 * Ticket-Object-Array
	 * @var tickets
	 */
	static private $tickets = array();

	/**
	 * Class constructor.
	 *
	 * @param array userinfo
	 * @param int ticket id
	 */
	private function __construct($userinfo, $tid = - 1) {
		$this->userinfo = $userinfo;
		$this->tid = $tid;

		// initialize data array
		$this->initData();

		// read data from database
		$this->readData();
	}

	/**
	 * Singleton ftw ;-)
	 *
	 * @param array userinfo
	 * @param int ticket id
	 */
	static public function getInstanceOf($_usernfo, $_tid) {
		if (!isset(self::$tickets[$_tid])) {
			self::$tickets[$_tid] = new ticket($_usernfo, $_tid);
		}
		return self::$tickets[$_tid];
	}

	/**
	 * Initialize data-array
	 */
	private function initData() {

		$this->Set('customer', 0, true, true);
		$this->Set('admin', 1, true, true);
		$this->Set('subject', '', true, true);
		$this->Set('category', '0', true, true);
		$this->Set('priority', '2', true, true);
		$this->Set('message', '', true, true);
		$this->Set('dt', 0, true, true);
		$this->Set('lastchange', 0, true, true);
		$this->Set('ip', '', true, true);
		$this->Set('status', '0', true, true);
		$this->Set('lastreplier', '0', true, true);
		$this->Set('by', '0', true, true);
		$this->Set('answerto', '0', true, true);
		$this->Set('archived', '0', true, true);
	}

	/**
	 * Read ticket data from database.
	 */
	private function readData() {

		if (isset($this->tid)
			&& $this->tid != - 1
		) {
			$_ticket_stmt = Database::prepare('
				SELECT * FROM `' . TABLE_PANEL_TICKETS . '` WHERE `id` = :tid'
			);
			$_ticket = Database::pexecute_first($_ticket_stmt, array('tid' => $this->tid));

			$this->Set('customer', $_ticket['customerid'], true, false);
			$this->Set('admin', $_ticket['adminid'], true, false);
			$this->Set('subject', $_ticket['subject'], true, false);
			$this->Set('category', $_ticket['category'], true, false);
			$this->Set('priority', $_ticket['priority'], true, false);
			$this->Set('message', $_ticket['message'], true, false);
			$this->Set('dt', $_ticket['dt'], true, false);
			$this->Set('lastchange', $_ticket['lastchange'], true, false);
			$this->Set('ip', $_ticket['ip'], true, false);
			$this->Set('status', $_ticket['status'], true, false);
			$this->Set('lastreplier', $_ticket['lastreplier'], true, false);
			$this->Set('by', $_ticket['by'], true, false);
			$this->Set('answerto', $_ticket['answerto'], true, false);
			$this->Set('archived', $_ticket['archived'], true, false);
		}
	}

	/**
	 * Insert data to database
	 */
	public function Insert() {

		$ins_stmt = Database::prepare("
			INSERT INTO `" . TABLE_PANEL_TICKETS . "` SET
                `customerid` = :customerid,
                `adminid` = :adminid,
                `category` = :category,
                `priority` = :priority,
                `subject` = :subject,
                `message` = :message,
                `dt` = :dt,
                `lastchange` = :lastchange,
                `ip` = :ip,
                `status` = :status,
                `lastreplier` = :lastreplier,
                `by` = :by,
                `answerto` = :answerto"
		);
		$ins_data = array(
			'customerid' => $this->Get('customer'),
			'adminid' => $this->Get('admin'),
			'category' => $this->Get('category'),
			'priority' => $this->Get('priority'),
			'subject' => $this->Get('subject'),
			'message' => $this->Get('message'),
			'dt' => time(),
			'lastchange' => time(),
			'ip' => $this->Get('ip'),
			'status' => $this->Get('status'),
			'lastreplier' => $this->Get('lastreplier'),
			'by' => $this->Get('by'),
			'answerto' => $this->Get('answerto')
		);
		Database::pexecute($ins_stmt, $ins_data);
		$this->tid = Database::lastInsertId();
		return true;
	}

	/**
	 * Update data in database
	 */
	public function Update() {

		// Update "main" ticket
		$upd_stmt = Database::prepare('
			UPDATE `' . TABLE_PANEL_TICKETS . '` SET
                `priority` = :priority,
                `lastchange` = :lastchange,
                `status` = :status,
                `lastreplier` = :lastreplier
                WHERE `id` = :tid'
		);
		$upd_data = array(
			'priority' => $this->Get('priority'),
			'lastchange' => $this->Get('lastchange'),
			'status' => $this->Get('status'),
			'lastreplier' => $this->Get('lastreplier'),
			'tid' => $this->tid
		);
		Database::pexecute($upd_stmt, $upd_data);
		return true;
	}

	/**
	 * Moves a ticket to the archive
	 */
	public function Archive() {

		// Update "main" ticket
		$upd_stmt = Database::prepare('
			UPDATE `' . TABLE_PANEL_TICKETS . '` SET `archived` = "1" WHERE `id` = :tid'
		);
		Database::pexecute($upd_stmt, array('tid' => $this->tid));

		// Update "answers" to ticket
		$upd_stmt = Database::prepare('
			UPDATE `' . TABLE_PANEL_TICKETS . '` SET `archived` = "1" WHERE `answerto` = :tid'
		);
		Database::pexecute($upd_stmt, array('tid' => $this->tid));
		return true;
	}

	/**
	 * Remove ticket from database
	 */
	public function Delete() {

		// Delete "main" ticket
		$del_stmt = Database::prepare('
			DELETE FROM `' . TABLE_PANEL_TICKETS . '` WHERE `id` = :tid'
		);
		Database::pexecute($del_stmt, array('tid' => $this->tid));

		// Delete "answers" to ticket"
		$del_stmt = Database::prepare('
			DELETE FROM `' . TABLE_PANEL_TICKETS . '` WHERE `answerto` = :tid'
		);
		Database::pexecute($del_stmt, array('tid' => $this->tid));
		return true;
	}

	/**
	 * Mail notifications
	 */
	public function sendMail($customerid = - 1, $template_subject = null, $default_subject = null, $template_body = null, $default_body = null)
	{
		global $mail, $theme;

		// Some checks are to be made here in the future
		if ($customerid != - 1) {
			// Get e-mail message for customer
			$usr_stmt = Database::prepare('
				SELECT `name`, `firstname`, `company`, `email`
				FROM `' . TABLE_PANEL_CUSTOMERS . '` WHERE `customerid` = :customerid'
			);
			$usr = Database::pexecute_first($usr_stmt, array('customerid' => $customerid));

			$replace_arr = array(
				'FIRSTNAME' => $usr['firstname'],
				'NAME' => $usr['name'],
				'COMPANY' => $usr['company'],
				'SALUTATION' => getCorrectUserSalutation($usr),
				'SUBJECT' => $this->Get('subject', true)
			);
		} else {
			$replace_arr = array(
				'SUBJECT' => $this->Get('subject', true)
			);
		}
		$tpl_seldata = array(
			'adminid' => $this->userinfo['adminid'],
			'lang' => $this->userinfo['def_language'],
			'tplsubject' => $template_subject
		);
		$result_stmt = Database::prepare("
			SELECT `value` FROM `" . TABLE_PANEL_TEMPLATES . "`
			WHERE `adminid`= :adminid
			AND `language`= :lang
			AND `templategroup`= 'mails' AND `varname`= :tplsubject"
		);
		$result = Database::pexecute_first($result_stmt, $tpl_seldata);
		$mail_subject = html_entity_decode(replace_variables((($result['value'] != '') ? $result['value'] : $default_subject), $replace_arr));

		unset($tpl_seldata['tplsubject']);
		$tpl_seldata['tplmailbody'] = $template_body;

		$result_stmt = Database::prepare("
			SELECT `value` FROM `" . TABLE_PANEL_TEMPLATES . "`
			WHERE `adminid`= :adminid
			AND `language`= :lang
			AND `templategroup`= 'mails' AND `varname`= :tplmailbody"
		);
		$result = Database::pexecute_first($result_stmt, $tpl_seldata);
		$mail_body = html_entity_decode(replace_variables((($result['value'] != '') ? $result['value'] : $default_body), $replace_arr));

		if ($customerid != - 1) {
			$_mailerror = false;
			try {
				$mail->SetFrom(Settings::Get('ticket.noreply_email'), Settings::Get('ticket.noreply_name'));
				$mail->Subject = $mail_subject;
				$mail->AltBody = $mail_body;
				$mail->MsgHTML(str_replace("\n", "<br />", $mail_body));
				$mail->AddAddress($usr['email'], $usr['firstname'] . ' ' . $usr['name']);
				$mail->Send();
			} catch(phpmailerException $e) {
				$mailerr_msg = $e->errorMessage();
				$_mailerror = true;
			} catch (Exception $e) {
				$mailerr_msg = $e->getMessage();
				$_mailerror = true;
			}

			if ($_mailerror) {
				$rstlog = FroxlorLogger::getInstanceOf(array('loginname' => 'ticket_class'));
				$rstlog->logAction(ADM_ACTION, LOG_ERR, "Error sending mail: " . $mailerr_msg);
				standard_error('errorsendingmail', $usr['email']);
			}
			$mail->ClearAddresses();

		} else {

			$admin_stmt = Database::prepare("
				SELECT `name`, `email` FROM `" . TABLE_PANEL_ADMINS . "`
				WHERE `adminid` = :adminid"
			);
			$admin = Database::pexecute_first($admin_stmt, array('adminid' => $this->userinfo['adminid']));
			$_mailerror = false;
			try {
				$mail->SetFrom(Settings::Get('ticket.noreply_email'), Settings::Get('ticket.noreply_name'));
				$mail->Subject = $mail_subject;
				$mail->AltBody = $mail_body;
				$mail->MsgHTML(str_replace("\n", "<br />", $mail_body));
				$mail->AddAddress($admin['email'], $admin['name']);
				$mail->Send();
			} catch(phpmailerException $e) {
				$mailerr_msg = $e->errorMessage();
				$_mailerror = true;
			} catch (Exception $e) {
				$mailerr_msg = $e->getMessage();
				$_mailerror = true;
			}

			if ($_mailerror) {
				$rstlog = FroxlorLogger::getInstanceOf(array('loginname' => 'ticket_class'));
				$rstlog->logAction(ADM_ACTION, LOG_ERR, "Error sending mail: " . $mailerr_msg);
				standard_error('errorsendingmail', $admin['email']);
			}

			$mail->ClearAddresses();
		}
	}

	/**
	 * Add a support-categories
	 */
	static public function addCategory($_category = null, $_admin = 1, $_order = 1) {

		if ($_category != null
			&& $_category != ''
		) {
			if ($_order < 1) {
				$_order = 1;
			}

			$ins_stmt = Database::prepare("
				INSERT INTO `" . TABLE_PANEL_TICKET_CATS . "` SET
					`name` = :name,
					`adminid` = :adminid,
					`logicalorder` = :lo"
			);
			$ins_data = array(
				'name' => $_category,
				'adminid' => $_admin,
				'lo' => $_order
			);
			Database::pexecute($ins_stmt, $ins_data);
			return true;
		}
		return false;
	}

	/**
	 * Edit a support-categories
	 */
	static public function editCategory($_category = null, $_id = 0, $_order = 1) {

		if ($_category != null
			&& $_category != ''
			&& $_id != 0
		) {
			if ($_order < 1) {
				$_order = 1;
			}

			$upd_stmt = Database::prepare("
				UPDATE `" . TABLE_PANEL_TICKET_CATS . "` SET
					`name` = :name,
					`logicalorder` = :lo
                  WHERE `id` = :id
			");
			Database::pexecute($upd_stmt, array('name' => $_category, 'lo' => $_order, 'id' => $_id));
			return true;
		}
		return false;
	}

	/**
	 * Delete a support-categories
	 */
	static public function deleteCategory($_id = 0) {

		if ($_id != 0) {

			$result_stmt = Database::prepare("
				SELECT COUNT(`id`) as `numtickets` FROM `" . TABLE_PANEL_TICKETS . "`
				WHERE `category` = :cat"
			);
			$result = Database::pexecute_first($result_stmt, array('cat' => $_id));

			if ($result['numtickets'] == "0") {
				$del_stmt = Database::prepare("
					DELETE FROM `" . TABLE_PANEL_TICKET_CATS . "` WHERE `id` = :id"
				);
				Database::pexecute($del_stmt, array('id' => $_id));
				return true;
			} else {
				return false;
			}
		}

		return false;
	}

	/**
	 * Return a support-category-name
	 */
	static public function getCategoryName($_id = 0) {

		if ($_id != 0) {
			$stmt = Database::prepare("
				SELECT `name` FROM `" . TABLE_PANEL_TICKET_CATS . "` WHERE `id` = :id"
			);
			$category = Database::pexecute_first($stmt, array('id' => $_id));
			return $category['name'];
		}
		return null;
	}

	/**
	 * get the highest order number
	 * 
	 * @param object $_uid admin-id (optional)
	 * 
	 * @return int highest order number
	 */
	static public function getHighestOrderNumber($_uid = 0) {

		$where = '';
		$sel_data = array();
		if ($_uid > 0) {
			$where = " WHERE `adminid` = :adminid";
			$sel_data['adminid'] = $_uid;
		}
		$sql = "SELECT MAX(`logicalorder`) as `highestorder` FROM `" . TABLE_PANEL_TICKET_CATS . "`".$where.";";
		$result_stmt = Database::prepare($sql);
		$result = Database::pexecute_first($result_stmt, $sel_data);
		return (isset($result['highestorder']) ? (int)$result['highestorder'] : 0);
	}

	/**
	 * returns the last x archived tickets
	 */
	static public function getLastArchived($_num = 10, $_admin = 1) {

		if ($_num > 0) {

			$archived = array();
			$counter = 0;
			$result_stmt = Database::prepare("
				SELECT *, (
					SELECT COUNT(`sub`.`id`)
					FROM `" . TABLE_PANEL_TICKETS . "` `sub`
					WHERE `sub`.`answerto` = `main`.`id`
				) as `ticket_answers`
				FROM `" . TABLE_PANEL_TICKETS . "` `main`
				WHERE `main`.`answerto` = '0' AND `main`.`archived` = '1'
				AND `main`.`adminid` = :adminid
				ORDER BY `main`.`lastchange` DESC LIMIT 0, ".(int)$_num
			);
			Database::pexecute($result_stmt, array('adminid' => $_admin));

			while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {

				$archived[$counter]['id'] = $row['id'];
				$archived[$counter]['customerid'] = $row['customerid'];
				$archived[$counter]['adminid'] = $row['adminid'];
				$archived[$counter]['lastreplier'] = $row['lastreplier'];
				$archived[$counter]['ticket_answers'] = $row['ticket_answers'];
				$archived[$counter]['category'] = $row['category'];
				$archived[$counter]['priority'] = $row['priority'];
				$archived[$counter]['subject'] = $row['subject'];
				$archived[$counter]['message'] = $row['message'];
				$archived[$counter]['dt'] = $row['dt'];
				$archived[$counter]['lastchange'] = $row['lastchange'];
				$archived[$counter]['status'] = $row['status'];
				$archived[$counter]['by'] = $row['by'];
				$counter++;
			}

			if (isset($archived[0]['id'])) {
				return $archived;
			} else {
				return false;
			}
		}
	}

	/**
	 * Returns a sql-statement to search the archive
	 * including necessary parameter-array for PDO
	 *
	 * @return array 0 = query, 1 = params-array
	 */
	static public function getArchiveSearchStatement($subject = null, $priority = null, $fromdate = null, $todate = null, $message = null, $customer = - 1, $admin = 1, $categories = null)
	{
		$search_params = array();

		$query = "
			SELECT `main`.*, (
				SELECT COUNT(`sub`.`id`) FROM `" . TABLE_PANEL_TICKETS . "` `sub`
				WHERE `sub`.`answerto` = `main`.`id`
			) as `ticket_answers`
			FROM `" . TABLE_PANEL_TICKETS . "` `main`
			WHERE `main`.`archived` = '1' AND `main`.`adminid` = :admin"
		;

		$search_params['admin'] = $admin;

		if ($subject != NULL
			&& $subject != ''
		) {
			$query .= " AND `main`.`subject` LIKE :subject";
			$search_params['subject'] = "%".$subject."%";
		}

		if ($priority != null
			&& isset($priority[0])
			&& $priority[0] != ''
		) {

			if (isset($priority[1])
				&& $priority[1] != ''
			) {

				if (isset($priority[2])
					&& $priority[2] != ''
				) {

					$query .= " AND (`main`.`priority` = '1' OR `main`.`priority` = '2' OR `main`.`priority` = '3')";

				} else {

					$query .= " AND (`main`.`priority` = '1' OR `main`.`priority` = '1')";
				}

			} elseif (isset($priority[2])
				&& $priority[2] != ''
			) {

				$query .= " AND (`main`.`priority` = '1' OR `main`.`priority` = '3')";

			} else {
				$query .= " AND `main`.`priority` = '1'";
			}

		} elseif($priority != null
			&& isset($priority[1])
			&& $priority[1] != ''
		) {
			if (isset($priority[2])
				&& $priority[2] != ''
			) {
				$query .= " AND (`main`.`priority` = '2' OR `main`.`priority` = '3')";
			} else {
				$query .= " AND `main`.`priority` = '2'";
			}

		} elseif($priority != null) {

			if (isset($priority[3])
				&& $priority[3] != ''
			) {
				$query .= " AND `main`.`priority` = '3'";
			}
		}

		if ($fromdate != null
			&& $fromdate > 0
		) {
			$query .= " AND `main`.`lastchange` > :fromdate";
			$search_params['fromdate'] = strtotime($fromdate);
		}

		if ($todate != null
			&& $todate > 0
		) {
			$query .= " AND `main`.`lastchange` < :todate";
			$search_params['todate'] = strtotime($todate);
		}

		if ($message != null
			&& $message != ''
		) {
			$query .= " AND `main`.`message` LIKE :message";
			$search_params['message'] = "%".$message."%";
		}

		if ($customer != - 1) {
			$query .= " AND `main`.`customerid` = :customer";
			$search_params['customer'] = $customer;
		}

		if ($categories != null) {

			$cats = array();
			foreach ($categories as $index => $catid) {
				if ($catid != "") {
					$cats[] = $catid;
				}
			}

			if (count($cats) > 0) {
				$query .= " AND (";
			}

			foreach ($cats as $catid) {
				if (isset($catid) && $catid > 0) {
					$query .= "`main`.`category` = :catid_".$catid." OR ";
					$search_params['catid_'.$catid] = $catid;
				}
			}

			if (count($cats) > 0) {
				$query = substr($query, 0, strlen($query) - 3);
				$query .= ") ";
			}
		}

		return array('0' => $query, '1' => $search_params);
	}

	/**
	 * Get statustext by status-no
	 */
	static public function getStatusText($_lng, $_status = 0)
	{
		switch($_status)
		{
			case 0:
				return $_lng['ticket']['open'];
				break;
			case 1:
				return $_lng['ticket']['wait_reply'];
				break;
			case 2:
				return $_lng['ticket']['replied'];
				break;
			default:
				return $_lng['ticket']['closed'];
				break;
		}
	}

	/**
	 * Get prioritytext by priority-no
	 */
	static public function getPriorityText($_lng, $_priority = 0)
	{
		switch($_priority)
		{
			case 1:
				return $_lng['ticket']['high'];
				break;
			case 2:
				return $_lng['ticket']['normal'];
				break;
			default:
				return $_lng['ticket']['low'];
				break;
		}
	}

	private function convertLatin1ToHtml($str)
	{
		$html_entities = array (
					"Ä" =>  "&Auml;",
					"ä" =>  "&auml;",
					"Ö" =>  "&Ouml;",
					"ö" =>  "&ouml;",
					"Ü" =>  "&Uuml;",
					"ü" =>  "&uuml;",
					"ß" =>  "&szlig;"
					/*
					 * @TODO continue this table for all the special-characters
					 */
		);

		foreach ($html_entities as $key => $value) {
			$str = str_replace($key, $value, $str);
		}
		return $str;
	}

	/**
	 * function customerHasTickets
	 *
	 * @param	int		customer-id
	 *
	 * @return	array/bool	array of ticket-ids if customer has any, else false
	 */
	static public function customerHasTickets($_cid = 0) {

		if ($_cid != 0) {
			$result_stmt = Database::prepare("
				SELECT `id` FROM `" . TABLE_PANEL_TICKETS . "` WHERE `customerid` = :cid"
			);
			Database::pexecute($result_stmt, array('cid' => $_cid));

			$tickets = array();
			while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
				$tickets[] = $row['id'];
			}

			return $tickets;
		}

		return false;
	}

	/**
	 * Get a data-var
	 */
	public function Get($_var = '', $_vartrusted = false) {

		if ($_var != '') {
			if (!$_vartrusted) {
				$_var = htmlspecialchars($_var);
			}

			if (isset($this->t_data[$_var])) {
				if (strtolower($_var) == 'message') {
					// avoid double line-breaks, #1413
					$this->t_data[$_var] = str_replace("<br />\n", "\n", $this->t_data[$_var]);
					return nl2br($this->t_data[$_var]);
				} elseif(strtolower($_var) == 'subject') {
					return nl2br($this->t_data[$_var]);
				} else {
					return $this->t_data[$_var];
				}
			} else {
				return null;
			}
		}
	}

	/**
	 * Set a data-var
	 */
	public function Set($_var = '', $_value = '', $_vartrusted = false, $_valuetrusted = false) {

		if ($_var != ''
			&& $_value != ''
		) {
			if (!$_vartrusted) {
				$_var = strip_tags($_var);
			}

			if (!$_valuetrusted) {
				$_value = strip_tags($_value, '<br />');
			}

			if (strtolower($_var) == 'message'
				|| strtolower($_var) == 'subject'
			) {
				$_value = $this->convertLatin1ToHtml($_value);
			}

			$this->t_data[$_var] = $_value;
		}
	}
}
