<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Language
 *
 */

/**
 * Function getPreConfig
 *
 * outputs various content before the update process
 * can be continued (askes for agreement whatever is being asked)
 *
 * @param string $current_version
 * @param int $current_db_version
 *
 * @return string
 */
function getPreConfig($current_version, $current_db_version)
{
	$has_preconfig = false;
	$return = '<div class="preconfig"><h3 class="red">PLEASE NOTE - Important update notifications</h3>';

	include_once makeCorrectFile(dirname(__FILE__).'/preconfig/0.9/preconfig_0.9.inc.php');
	parseAndOutputPreconfig($has_preconfig, $return, $current_version, $current_db_version);

	$return .= '<br /><br />'.makecheckbox('update_changesagreed', '<strong>I have read the update notifications above and I am aware of the changes made to my system.</strong>', '1', true, '0', true);
	$return .= '</div>';
	$return .= '<input type="hidden" name="update_preconfig" value="1" />';

	if($has_preconfig) {
		return $return;
	} else {
		return '';
	}
}

function versionInUpdate($current_version, $version_to_check)
{
	if (!isFroxlor()) {
		return true;
	}

	return (version_compare2($current_version, $version_to_check) == -1 ? true : false);
}
