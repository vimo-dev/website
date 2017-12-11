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
 * @package    Formfields
 *
 */

return array(
	'htpasswd_add' => array(
		'title' => $lng['extras']['directoryprotection_add'],
		'image' => 'icons/htpasswd_add.png',
		'sections' => array(
			'section_a' => array(
				'title' => $lng['extras']['directoryprotection_add'],
				'image' => 'icons/htpasswd_add.png',
				'fields' => array(
					'path' => array(
						'label' => $lng['panel']['path'],
						'desc' => (Settings::Get('panel.pathedit') != 'Dropdown' ? $lng['panel']['pathDescription'] : null).(isset($pathSelect['note']) ? '<br />'.$pathSelect['value'] : ''),
						'type' => $pathSelect['type'],
						'select_var' => $pathSelect['value'],
						'value' => $pathSelect['value']
					),
					'username' => array(
						'label' => $lng['login']['username'],
						'type' => 'text'
					),
					'directory_password' => array(
						'label' => $lng['login']['password'],
						'type' => 'password',
						'autocomplete' => 'off'
					),
					'directory_password_suggestion' => array(
						'label' => $lng['customer']['generated_pwd'],
						'type' => 'text',
						'visible' => (Settings::Get('panel.password_regex') == ''),
						'value' => generatePassword(),
					),
					'directory_authname' => array(
						'label' => $lng['extras']['htpasswdauthname'],
						'type' => 'text'
					)
				)
			)
		)
	)
);
