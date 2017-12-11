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
 * @package    Functions
 *
 */

function getCustomerDetail($customerid, $varname) {

	$customer_stmt = Database::prepare("
		SELECT `" . $varname . "` FROM `" . TABLE_PANEL_CUSTOMERS . "` WHERE `customerid` = :customerid
	");
	$customer = Database::pexecute_first($customer_stmt, array('customerid' => $customerid));

	if (isset($customer[$varname])) {
		return $customer[$varname];
	} else {
		return false;
	}
}
