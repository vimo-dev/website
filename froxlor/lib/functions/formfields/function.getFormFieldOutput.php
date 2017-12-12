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

function getFormFieldOutput($fieldname, $fielddata) {

	global $lng;

	$returnvalue = '';
	if (is_array($fielddata)
		&& isset($fielddata['type'])
		&& $fielddata['type'] != ''
		&& function_exists('getFormFieldOutput' . ucfirst($fielddata['type']))
	) {
		if (isset($fielddata['label']) && is_array($fielddata['label'])) {
			if (isset($fielddata['label']['title']) && isset($fielddata['label']['description'])) {
				$fielddata['label'] = '<b>' . $fielddata['label']['title'] . '</b><br />' . $fielddata['label']['description'];
			} else {
				$fielddata['label'] = implode(' ', $fielddata['label']);
			}
		}

		if (!isset($fielddata['value'])) {
			if (isset($fielddata['default'])) {
				$fielddata['value'] = $fielddata['default'];
			} else {
				$fielddata['value'] = null;
			}
		}

		/**
		 * this part checks for the 'websrv_avail' entry in the settings-array
		 * if found, we check if the current webserver is in the array. If this
		 * is not the case, we change the setting type to "hidden", #502
		 */
		$do_show = true;
		if (isset($fielddata['websrv_avail']) && is_array($fielddata['websrv_avail'])) {
			$websrv = Settings::Get('system.webserver');
			if (!in_array($websrv, $fielddata['websrv_avail'])) {
				$do_show = false;
				$fielddata['label'].= sprintf($lng['serversettings']['option_unavailable_websrv'], implode(", ", $fielddata['websrv_avail']));
			}
		}

		// visible = Settings::Get('phpfpm.enabled') for example would result in false if not enabled
		// and therefore not shown as intended. Only check if do_show is still true as it might
		// be false due to websrv_avail
		if (isset($fielddata['visible']) && $do_show) {
			$do_show = $fielddata['visible'];
			if (!$do_show) {
				$fielddata['label'].= $lng['serversettings']['option_unavailable'];
			}
		}

		//if ($do_show) {
			$returnvalue = call_user_func('getFormFieldOutput' . ucfirst($fielddata['type']), $fieldname, $fielddata, $do_show);
		//}
	}
	return $returnvalue;
}
