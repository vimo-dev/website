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
	'htaccess_edit' => array(
		'title' => $lng['extras']['pathoptions_edit'],
		'image' => 'icons/htpasswd_edit.png',
		'sections' => array(
			'section_a' => array(
				'title' => $lng['extras']['pathoptions_edit'],
				'image' => 'icons/htpasswd_edit.png',
				'fields' => array(
					'path' => array(
						'label' => $lng['panel']['path'],
						'type' => 'label',
						'value' => $result['path']
					),
					'options_indexes' => array(
						'label' => $lng['extras']['directory_browsing'],
						'type' => 'checkbox',
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array($result['options_indexes'])
					),
					'error404path' => array(
						'label' => $lng['extras']['errordocument404path'],
						'desc' => $lng['panel']['descriptionerrordocument'],
						'type' => 'text',
						'value' => $result['error404path']
					),
					'error403path' => array(
						'visible' => (Settings::Get('system.webserver') == 'apache2'),
						'label' => $lng['extras']['errordocument403path'],
						'desc' => $lng['panel']['descriptionerrordocument'],
						'type' => 'text',
						'value' => $result['error403path']
					),
					'error500path' => array(
						'visible' => (Settings::Get('system.webserver') == 'apache2'),
						'label' => $lng['extras']['errordocument500path'],
						'desc' => $lng['panel']['descriptionerrordocument'],
						'type' => 'text',
						'value' => $result['error500path']
					),
					'options_cgi' => array(
						'visible' => ($cperlenabled == 1),
						'label' => $lng['extras']['execute_perl'],
						'type' => 'checkbox',
						'values' => array(
										array ('label' => $lng['panel']['yes'], 'value' => '1')
									),
						'value' => array($result['options_cgi'])
					)
				)
			)
		)
	)
);
