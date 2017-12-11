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
 * @package    Functions
 *
 */

/**
 * Function updateToVersion
 *
 * updates the panel.version field
 * to the given value (no checks here!)
 *
 * @param string $new_version new-version
 *
 * @return bool true on success, else false
 */
function updateToVersion($new_version = null) {

	if ($new_version !== null && $new_version != '') {
		$upd_stmt = Database::prepare("
				UPDATE `".TABLE_PANEL_SETTINGS."` SET `value` = :newversion
				WHERE `settinggroup` = 'panel' AND `varname` = 'version'"
		);
		Database::pexecute($upd_stmt, array('newversion' => $new_version));
		Settings::Set('panel.version', $new_version);
		return true;
	}
	return false;
}

/**
 * Function isFroxlor
 *
 * checks if the panel is froxlor
 *
 * @return bool true if panel is froxlor, else false
 */
function isFroxlor() {

	if (Settings::Get('panel.frontend') !== null
			&& Settings::Get('panel.frontend') == 'froxlor'
	) {
		return true;
	}
	return false;
}

/**
 * Function isFroxlorVersion
 *
 * checks if a given version is the
 * current one (and panel is froxlor)
 *
 * @param string $to_check version to check
 *
 * @return bool true if version to check matches, else false
 */
function isFroxlorVersion($to_check = null) {

	if (Settings::Get('panel.frontend') == 'froxlor'
			&& Settings::Get('panel.version') == $to_check
	) {
		return true;
	}
	return false;
}

/**
 * Function hasUpdates
 *
 * checks if a given version is not equal the current one
 *
 * @param string $to_check version to check
 *
 * @return bool true if version to check does not match, else false
 */
function hasUpdates($to_check = null) {

	if (Settings::Get('panel.version') == null
			|| Settings::Get('panel.version') != $to_check
	) {
		return true;
	}
	return false;
}

/**
 * Function showUpdateStep
 *
 * outputs and logs the current
 * update progress
 *
 * @param	string		task/status
 * @param	bool		needs_status (if false, a linebreak will be added)
 *
 * @return	string		formatted output and log-entry
 */
function showUpdateStep($task = null, $needs_status = true) {

	global $updatelog, $filelog;

	if (!$needs_status) echo "<b>";

	// output
	echo $task;

	if (!$needs_status) {
		echo "</b><br />";
	}

	$updatelog->logAction(ADM_ACTION, LOG_WARNING, $task);
	$filelog->logAction(ADM_ACTION, LOG_WARNING, $task);
}

/**
 * Function lastStepStatus
 *
 * outputs [OK] (success), [??] (warning) or [!!] (failure)
 * of the last update-step
 *
 * @param	int			status	(0 = success, 1 = warning, 2 = failure)
 *
 * @return	string		formatted output and log-entry
 */
function lastStepStatus($status = -1, $message = '') {

	global $updatelog, $filelog;

	switch($status) {

		case 0:
			$status_sign = ($message != '') ? '['.$message.']' : '[OK]';
			$status_color = 'ok';
			break;
		case 1:
			$status_sign = ($message != '') ? '['.$message.']' : '[??]';
			$status_color = 'warn';
			break;
		case 2:
			$status_sign = ($message != '') ? '['.$message.']' : '[!!]';
			$status_color = 'err';
			break;
		default:
			$status_sign = '[unknown]';
			$status_color = 'unknown';
			break;
	}

	// output
	echo "<span class=\"update-step update-step-".$status_color."\">".$status_sign."</span><br />";

	if ($status == -1 || $status == 2) {
		$updatelog->logAction(ADM_ACTION, LOG_WARNING, 'Attention - last update task failed!!!');
		$filelog->logAction(ADM_ACTION, LOG_WARNING, 'Attention - last update task failed!!!');

	} elseif($status == 0 || $status == 1) {
		$filelog->logAction(ADM_ACTION, LOG_WARNING, 'Success');
	}
}

/**
 * validate if full path to update.log is sane
 * if not, the update.log is created in /tmp/
 *
 * @param string $filename the file name to validate
 *
 * @return string the full path with filename (can differ if not writeable => /tmp)
 */
function validateUpdateLogFile($filename) {

	if (!is_dir($filename)) {
		$fh = @fopen($filename, 'a');
		if ($fh) {
			fclose($fh);
			return $filename;
		}
	}
	return '/tmp/froxlor_update.log';
}

/**
 * Function isDatabaseVersion
 *
 * checks if a given database-version is the current one
 *
 * @param int $to_check version to check
 *
 * @return bool true if version to check matches, else false
 */
function isDatabaseVersion($to_check = null) {

    if (Settings::Get('panel.frontend') == 'froxlor'
        && Settings::Get('panel.db_version') == $to_check
        ) {
            return true;
        }
        return false;
}

/**
 * Function hasUpdates
 *
 * checks if a given database-version is not equal the current one
 *
 * @param int $to_check version to check
 *
 * @return bool true if version to check does not match, else false
 */
function hasDbUpdates($to_check = null) {

    if (Settings::Get('panel.db_version') == null
        || Settings::Get('panel.db_version') != $to_check
        ) {
            return true;
        }
        return false;
}

/**
 * Function updateToDbVersion
 *
 * updates the panel.version field
 * to the given value (no checks here!)
 *
 * @param string $new_version new-version
 *
 * @return bool true on success, else false
 */
function updateToDbVersion($new_version = null) {

    if ($new_version !== null && $new_version != '') {
        $upd_stmt = Database::prepare("
				UPDATE `".TABLE_PANEL_SETTINGS."` SET `value` = :newversion
				WHERE `settinggroup` = 'panel' AND `varname` = 'db_version'"
            );
        Database::pexecute($upd_stmt, array('newversion' => $new_version));
        Settings::Set('panel.db_version', $new_version);
        return true;
    }
    return false;
}
