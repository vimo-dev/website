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

function getLanguages() {

	$result_stmt = Database::query("SELECT * FROM `" . TABLE_PANEL_LANGUAGE . "` ");
	$languages_array = array();

	while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
		if (!isset($languages_array[$row['language']])
			&& !in_array($row['language'], $languages_array)
		) {
			$languages_array[$row['language']] = html_entity_decode($row['language']);
		}
	}

	return $languages_array;
}
