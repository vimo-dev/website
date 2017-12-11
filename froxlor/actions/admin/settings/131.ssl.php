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
 * @package    Settings
 *
 */
return array(
	'groups' => array(
		'ssl' => array(
			'title' => $lng['admin']['sslsettings'],
			'fields' => array(
				'system_ssl_enabled' => array(
					'label' => $lng['serversettings']['ssl']['use_ssl'],
					'settinggroup' => 'system',
					'varname' => 'use_ssl',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'overview_option' => true
				),
				'system_ssl_cipher_list' => array(
					'label' => $lng['serversettings']['ssl']['ssl_cipher_list'],
					'settinggroup' => 'system',
					'varname' => 'ssl_cipher_list',
					'type' => 'string',
					'string_emptyallowed' => false,
					'default' => 'ECDH+AESGCM:ECDH+AES256:!aNULL:!MD5:!DSS:!DH:!AES128',
					'save_method' => 'storeSettingField'
				),
				'system_ssl_cert_file' => array(
					'label' => $lng['serversettings']['ssl']['ssl_cert_file'],
					'settinggroup' => 'system',
					'varname' => 'ssl_cert_file',
					'type' => 'string',
					'string_type' => 'file',
					'string_emptyallowed' => true,
					'default' => '/etc/apache2/apache2.pem',
					'save_method' => 'storeSettingField'
				),
				'system_ssl_key_file' => array(
					'label' => $lng['serversettings']['ssl']['ssl_key_file'],
					'settinggroup' => 'system',
					'varname' => 'ssl_key_file',
					'type' => 'string',
					'string_type' => 'file',
					'string_emptyallowed' => true,
					'default' => '/etc/apache2/apache2.key',
					'save_method' => 'storeSettingField'
				),
				'system_ssl_cert_chainfile' => array(
					'label' => $lng['admin']['ipsandports']['ssl_cert_chainfile'],
					'settinggroup' => 'system',
					'varname' => 'ssl_cert_chainfile',
					'type' => 'string',
					'string_type' => 'file',
					'string_emptyallowed' => true,
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'system_ssl_ca_file' => array(
					'label' => $lng['serversettings']['ssl']['ssl_ca_file'],
					'settinggroup' => 'system',
					'varname' => 'ssl_ca_file',
					'type' => 'string',
					'string_type' => 'file',
					'string_emptyallowed' => true,
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'system_leenabled' => array(
					'label' => $lng['serversettings']['leenabled'],
					'settinggroup' => 'system',
					'varname' => 'leenabled',
					'type' => 'bool',
					'default' => false,
					'cronmodule' => 'froxlor/letsencrypt',
					'save_method' => 'storeSettingField'
				),
				'system_letsencryptacmeconf' => array(
					'label' => $lng['serversettings']['letsencryptacmeconf'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptacmeconf',
					'type' => 'string',
					'string_type' => 'file',
					'default' => '/etc/apache2/conf-enabled/acme.conf',
					'save_method' => 'storeSettingField',
				),
				'system_letsencryptca' => array(
					'label' => $lng['serversettings']['letsencryptca'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptca',
					'type' => 'option',
					'default' => 'testing',
					'option_mode' => 'one',
					'option_options' => array(
						'testing' => 'https://acme-staging.api.letsencrypt.org (Test)',
						'production' => 'https://acme-v01.api.letsencrypt.org (Live)'
					),
					'save_method' => 'storeSettingField'
				),
				'system_letsencryptcountrycode' => array(
					'label' => $lng['serversettings']['letsencryptcountrycode'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptcountrycode',
					'type' => 'string',
					'string_emptyallowed' => false,
					'default' => 'DE',
					'save_method' => 'storeSettingField'
				),
				'system_letsencryptstate' => array(
					'label' => $lng['serversettings']['letsencryptstate'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptstate',
					'type' => 'string',
					'string_emptyallowed' => false,
					'default' => 'Hessen',
					'save_method' => 'storeSettingField'
				),
				'system_letsencryptchallengepath' => array(
					'label' => $lng['serversettings']['letsencryptchallengepath'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptchallengepath',
					'type' => 'string',
					'string_emptyallowed' => false,
					'default' => FROXLOR_INSTALL_DIR,
					'save_method' => 'storeSettingField'
				),
				'system_letsencryptkeysize' => array(
					'label' => $lng['serversettings']['letsencryptkeysize'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptkeysize',
					'type' => 'int',
					'int_min' => 2048,
					'default' => 4096,
					'save_method' => 'storeSettingField'
				),
				'system_letsencryptreuseold' => array(
					'label' => $lng['serversettings']['letsencryptreuseold'],
					'settinggroup' => 'system',
					'varname' => 'letsencryptreuseold',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField'
				)
			)
		)
	)
);
