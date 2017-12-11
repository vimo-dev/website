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

function validateFormFieldBool($fieldname, $fielddata, $newfieldvalue)
{
	if($newfieldvalue === '1' || $newfieldvalue === 1 || $newfieldvalue === true || strtolower($newfieldvalue) === 'yes' || strtolower($newfieldvalue) === 'ja' || $newfieldvalue === '0' || $newfieldvalue === 0 || $newfieldvalue === false || strtolower($newfieldvalue) === 'no' || strtolower($newfieldvalue) === 'nein' || strtolower($newfieldvalue) === '')
	{
		return true;
	}
	else
	{
		return 'noboolean';
	}
}
