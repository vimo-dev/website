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

function checkUsername($fieldname, $fielddata, $newfieldvalue, $allnewfieldvalues) {

	if (!isset($allnewfieldvalues['customer_mysqlprefix'])) {
		$allnewfieldvalues['customer_mysqlprefix'] = Settings::Get('customer.mysqlprefix');
	}

	$returnvalue = array();
	if (validateUsername(
		$newfieldvalue,
		Settings::Get('panel.unix_names'),
		14 - strlen($allnewfieldvalues['customer_mysqlprefix'])) === true
	) {
		$returnvalue = array(FORMFIELDS_PLAUSIBILITY_CHECK_OK);
	} else {
		$errmsg = 'accountprefixiswrong';
		if ($fieldname == 'customer_mysqlprefix') {
			$errmsg = 'mysqlprefixiswrong';
		}
		$returnvalue = array(FORMFIELDS_PLAUSIBILITY_CHECK_ERROR, $errmsg);
	}
	return $returnvalue;
}
