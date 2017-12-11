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
 */

return array(
	'ftp_add' => array(
		'title' => $lng['ftp']['account_add'],
		'image' => 'icons/user_add.png',
		'sections' => array(
			'section_a' => array(
				'title' => $lng['ftp']['account_add'],
				'image' => 'icons/user_add.png',
				'fields' => array(
					'ftp_username' => array(
						'visible' => (Settings::Get('customer.ftpatdomain') == '1' ? true : false),
						'label' => $lng['login']['username'],
						'type' => 'text'
					),
					'ftp_domain' => array(
						'visible' => (Settings::Get('customer.ftpatdomain') == '1' ? true : false),
						'label' => $lng['domains']['domainname'],
						'type' => 'select',
						'select_var' => (isset($domains) ? $domains : ""),
					),
					'ftp_description' => array(
						'label' => $lng['panel']['ftpdesc'] = 'FTP description',
						'type' => 'text'
					),
					'path' => array(
						'label' => $lng['panel']['path'],
						'desc' => (Settings::Get('panel.pathedit') != 'Dropdown' ? $lng['panel']['pathDescription'] : null).(isset($pathSelect['note']) ? '<br />'.$pathSelect['value'] : ''),
						'type' => $pathSelect['type'],
						'select_var' => $pathSelect['value'],
						'value' => $pathSelect['value']
					),
					'ftp_password' => array(
						'label' => $lng['login']['password'],
						'type' => 'password',
						'autocomplete' => 'off'
					),
					'ftp_password_suggestion' => array(
						'label' => $lng['customer']['generated_pwd'],
						'type' => 'text',
						'visible' => (Settings::Get('panel.password_regex') == ''),
						'value' => generatePassword(),
					),
					'sendinfomail' => array(
						'label' => $lng['customer']['sendinfomail'],
						'type' => 'checkbox',
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array()
					),
					'shell' => array(
						'visible' => (Settings::Get('system.allow_customer_shell') == '1' ? true : false),
						'label' => $lng['panel']['shell'],
						'type' => 'select',
						'select_var' => (isset($shells) ? $shells : ""),
					)
				)
			)
		)
	)
);
