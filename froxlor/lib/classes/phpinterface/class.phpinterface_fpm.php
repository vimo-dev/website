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
 * @author     Michael Kaufmann <mkaufmann@nutime.de>
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Cron
 *
 * @link       http://www.nutime.de/
 * @since      0.9.16
 *
 */

class phpinterface_fpm {

	/**
	 * Domain-Data array
	 * @var array
	*/
	private $_domain = array();

	/**
	 * Admin-Date cache array
	 * @var array
	*/
	private $_admin_cache = array();

	/**
	 * defines what can be used for pool-config from php.ini
	 * Mostly taken from http://php.net/manual/en/ini.list.php
	 *
	 * @var array
	*/
	private $_ini = array(
			'php_value' => array(
				'auto_append_file',
				'auto_prepend_file',
				'date.timezone',
				'default_charset',
				'error_reporting',
				'include_path',
				'log_errors_max_len',
				'mail.log',
				'max_execution_time',
				'session.cookie_domain',
				'session.cookie_lifetime',
				'session.cookie_path',
				'session.name',
				'session.serialize_handler',
				'upload_max_filesize',
				'xmlrpc_error_number',
				'session.auto_start',
				'always_populate_raw_post_data',
				'suhosin.session.cryptkey',
				'suhosin.session.cryptraddr',
				'suhosin.session.checkraddr',
				'suhosin.cookie.cryptkey',
				'suhosin.cookie.plainlist',
				'suhosin.cookie.cryptraddr',
				'suhosin.cookie.checkraddr',
				'suhosin.executor.func.blacklist',
				'suhosin.executor.eval.whitelist'
			),
			'php_flag' => array(
				'asp_tags',
				'display_errors',
				'display_startup_errors',
				'html_errors',
				'log_errors',
				'magic_quotes_gpc',
				'magic_quotes_runtime',
				'magic_quotes_sybase',
				'mail.add_x_header',
				'session.cookie_secure',
				'session.use_cookies',
				'short_open_tag',
				'track_errors',
				'xmlrpc_errors',
				'suhosin.simulation',
				'suhosin.session.encrypt',
				'suhosin.session.cryptua',
				'suhosin.session.cryptdocroot',
				'suhosin.cookie.encrypt',
				'suhosin.cookie.cryptua',
				'suhosin.cookie.cryptdocroot',
				'suhosin.executor.disable_eval',
				'mbstring.func_overload'
			),
			'php_admin_value' => array(
				'cgi.redirect_status_env',
				'date.timezone',
				'disable_classes',
				'disable_functions',
				'error_log',
				'gpc_order',
				'max_input_time',
				'max_input_vars',
				'memory_limit',
				'open_basedir',
				'output_buffering',
				'post_max_size',
				'precision',
				'sendmail_path',
				'session.gc_divisor',
				'session.gc_probability',
				'variables_order',
				'opcache.log_verbosity_level',
				'opcache.restrict_api',
				'opcache.revalidate_freq',
				'opcache.max_accelerated_files',
				'opcache.memory_consumption',
				'opcache.interned_strings_buffer'
			),
			'php_admin_flag' => array(
				'allow_call_time_pass_reference',
				'allow_url_fopen',
				'allow_url_include',
				'auto_detect_line_endings',
				'cgi.fix_pathinfo',
				'cgi.force_redirect',
				'enable_dl',
				'expose_php',
				'file_uploads',
				'ignore_repeated_errors',
				'ignore_repeated_source',
				'log_errors',
				'register_argc_argv',
				'report_memleaks',
				'opcache.enable',
				'opcache.consistency_checks',
				'opcache.dups_fix',
				'opcache.load_comments',
				'opcache.revalidate_path',
				'opcache.save_comments',
				'opcache.use_cwd',
				'opcache.validate_timestamps',
				'opcache.fast_shutdown'
			)
	);

	/**
	 * main constructor
	*/
	public function __construct($domain) {
		$this->_domain = $domain;
	}

	/**
	 * create fpm-pool config
	 *
	 * @param array $phpconfig
	 */
	public function createConfig($phpconfig) {

		$fh = @fopen($this->getConfigFile(), 'w');

		if ($fh) {
			$fpm_pm = Settings::Get('phpfpm.pm');
			$fpm_children = (int)Settings::Get('phpfpm.max_children');
			$fpm_start_servers = (int)Settings::Get('phpfpm.start_servers');
			$fpm_min_spare_servers = (int)Settings::Get('phpfpm.min_spare_servers');
			$fpm_max_spare_servers = (int)Settings::Get('phpfpm.max_spare_servers');
			$fpm_requests = (int)Settings::Get('phpfpm.max_requests');
			$fpm_process_idle_timeout = (int)Settings::Get('phpfpm.idle_timeout');

			if ($fpm_children == 0) {
				$fpm_children = 1;
			}

			$fpm_config = ';PHP-FPM configuration for "'.$this->_domain['domain'].'" created on ' . date("Y.m.d H:i:s") . "\n";
			$fpm_config.= '['.$this->_domain['domain'].']'."\n";
			$fpm_config.= 'listen = '.$this->getSocketFile()."\n";
			if ($this->_domain['loginname'] == 'froxlor.panel') {
				$fpm_config.= 'listen.owner = '.$this->_domain['guid']."\n";
				$fpm_config.= 'listen.group = '.$this->_domain['guid']."\n";
			} else {
				$fpm_config.= 'listen.owner = '.$this->_domain['loginname']."\n";
				$fpm_config.= 'listen.group = '.$this->_domain['loginname']."\n";
			}
			// see #1418 why this is 0660
			$fpm_config.= 'listen.mode = 0660'."\n";

			if ($this->_domain['loginname'] == 'froxlor.panel') {
				$fpm_config.= 'user = '.$this->_domain['guid']."\n";
				$fpm_config.= 'group = '.$this->_domain['guid']."\n";
			} else {
				$fpm_config.= 'user = '.$this->_domain['loginname']."\n";
				$fpm_config.= 'group = '.$this->_domain['loginname']."\n";
			}

			$fpm_config.= 'pm = '.$fpm_pm."\n";
			$fpm_config.= 'pm.max_children = '.$fpm_children."\n";

			if ($fpm_pm == 'dynamic') {
				// honor max_children
				if ($fpm_children < $fpm_min_spare_servers) {
					$fpm_min_spare_servers = $fpm_children;
				}
				if ($fpm_children < $fpm_max_spare_servers) {
					$fpm_max_spare_servers = $fpm_children;
				}
				// failsafe, refs #955
				if ($fpm_start_servers < $fpm_min_spare_servers) {
					$fpm_start_servers = $fpm_min_spare_servers;
				}
				if ($fpm_start_servers > $fpm_max_spare_servers) {
					$fpm_start_servers = $fpm_max_spare_servers;
				}
				$fpm_config.= 'pm.start_servers = '.$fpm_start_servers."\n";
				$fpm_config.= 'pm.min_spare_servers = '.$fpm_min_spare_servers."\n";
				$fpm_config.= 'pm.max_spare_servers = '.$fpm_max_spare_servers."\n";
			} elseif ($fpm_pm == 'ondemand') {
				$fpm_config.= 'pm.process_idle_timeout = '.$fpm_process_idle_timeout."\n";
			}

			$fpm_config.= 'pm.max_requests = '.$fpm_requests."\n";

			// possible slowlog configs
			if ($phpconfig['fpm_slowlog'] == '1') {
				$fpm_config.= 'request_terminate_timeout = ' . $phpconfig['fpm_reqterm'] . "\n";
				$fpm_config.= 'request_slowlog_timeout = ' . $phpconfig['fpm_reqslow'] . "\n";
				$slowlog = makeCorrectFile(Settings::Get('system.logfiles_directory') . '/' . $this->_domain['loginname'] . '-php-slow.log');
				$fpm_config.= 'slowlog = ' . $slowlog . "\n";
				$fpm_config.= 'catch_workers_output = yes' . "\n";
			}

			$fpm_config.= ';chroot = '.makeCorrectDir($this->_domain['documentroot'])."\n";

			$tmpdir = makeCorrectDir(Settings::Get('phpfpm.tmpdir') . '/' . $this->_domain['loginname'] . '/');
			if (!is_dir($tmpdir)) {
				$this->getTempDir();
			}

			$fpm_config.= 'env[TMP] = '.$tmpdir."\n";
			$fpm_config.= 'env[TMPDIR] = '.$tmpdir."\n";
			$fpm_config.= 'env[TEMP] = '.$tmpdir."\n";

			$openbasedir = '';
			if ($this->_domain['loginname'] != 'froxlor.panel') {
				if ($this->_domain['openbasedir'] == '1') {
					$_phpappendopenbasedir = '';
					$_custom_openbasedir = explode(':', Settings::Get('phpfpm.peardir'));
					foreach ($_custom_openbasedir as $cobd) {
						$_phpappendopenbasedir .= appendOpenBasedirPath($cobd);
					}

					$_custom_openbasedir = explode(':', Settings::Get('system.phpappendopenbasedir'));
					foreach ($_custom_openbasedir as $cobd) {
						$_phpappendopenbasedir .= appendOpenBasedirPath($cobd);
					}

					if ($this->_domain['openbasedir_path'] == '0'
							&& strstr($this->_domain['documentroot'], ":") === false
					) {
						$openbasedir = appendOpenBasedirPath($this->_domain['documentroot'], true);
					} else {
						$openbasedir = appendOpenBasedirPath($this->_domain['customerroot'], true);
					}

					$openbasedir .= appendOpenBasedirPath($this->getTempDir());
					$openbasedir .= $_phpappendopenbasedir;
				}
			}
			$fpm_config.= 'php_admin_value[session.save_path] = ' . makeCorrectDir(Settings::Get('phpfpm.tmpdir') . '/' . $this->_domain['loginname'] . '/') . "\n";
			$fpm_config.= 'php_admin_value[upload_tmp_dir] = ' . makeCorrectDir(Settings::Get('phpfpm.tmpdir') . '/' . $this->_domain['loginname'] . '/') . "\n";

			$admin = $this->_getAdminData($this->_domain['adminid']);
			$php_ini_variables = array(
					'SAFE_MODE' => 'Off', // keep this for compatibility, just in case
					'PEAR_DIR' => Settings::Get('phpfpm.peardir'),
					'TMP_DIR' => $this->getTempDir(),
					'CUSTOMER_EMAIL' => $this->_domain['email'],
					'ADMIN_EMAIL' => $admin['email'],
					'DOMAIN' => $this->_domain['domain'],
					'CUSTOMER' => $this->_domain['loginname'],
					'ADMIN' => $admin['loginname'],
					'OPEN_BASEDIR' => $openbasedir,
					'OPEN_BASEDIR_C' => '',
					'OPEN_BASEDIR_GLOBAL' => Settings::Get('system.phpappendopenbasedir'),
					'DOCUMENT_ROOT' => makeCorrectDir($this->_domain['documentroot'])
			);

			$phpini = replace_variables($phpconfig['phpsettings'], $php_ini_variables);
			$phpini_array = explode("\n", $phpini);

			$fpm_config.= "\n\n";
			foreach ($phpini_array as $inisection) {
				$is = explode("=", $inisection);
				foreach ($this->_ini as $sec => $possibles) {
					if (in_array(trim($is[0]), $possibles)) {
						// check explicitly for open_basedir
						if (trim($is[0]) == 'open_basedir' && $openbasedir == '') {
							continue;
						}
						$fpm_config.= $sec.'['.trim($is[0]).'] = ' . trim($is[1]) . "\n";
					}
				}
			}

			// now check if 'sendmail_path' has not beed set in the custom-php.ini
			// if not we use our fallback-default as usual
			if (strpos($fpm_config, 'php_admin_value[sendmail_path]') === false) {
				$fpm_config.= 'php_admin_value[sendmail_path] = /usr/sbin/sendmail -t -i -f '.$this->_domain['email']."\n";
			}

			fwrite($fh, $fpm_config, strlen($fpm_config));
			fclose($fh);
		}
	}

	/**
	 * this is done via createConfig as php-fpm defines
	 * the ini-values/flags in its pool-config
	 *
	 * @param string $phpconfig
	 */
	public function createIniFile($phpconfig) {
		return;
	}

	/**
	 * fpm-config file
	 *
	 * @param boolean $createifnotexists create the directory if it does not exist
	 *
	 * @return string the full path to the file
	 */
	public function getConfigFile($createifnotexists = true) {

		$configdir = makeCorrectDir(Settings::Get('phpfpm.configdir'));
		$config = makeCorrectFile($configdir.'/'.$this->_domain['domain'].'.conf');

		if (!is_dir($configdir) && $createifnotexists) {
			safe_exec('mkdir -p ' . escapeshellarg($configdir));
		}

		return $config;
	}

	/**
	 * return path of fpm-socket file
	 *
	 * @param boolean $createifnotexists create the directory if it does not exist
	 *
	 * @return string the full path to the socket
	 */
	public function getSocketFile($createifnotexists = true) {

		$socketdir = makeCorrectDir(Settings::Get('phpfpm.fastcgi_ipcdir'));
		$socket = strtolower(makeCorrectFile($socketdir.'/'.$this->_domain['loginname'].'-'.$this->_domain['domain'].'-php-fpm.socket'));

		if (!is_dir($socketdir) && $createifnotexists) {
			safe_exec('mkdir -p '.escapeshellarg($socketdir));
			safe_exec('chown -R '.Settings::Get('system.httpuser').':'.Settings::Get('system.httpgroup').' '.escapeshellarg($socketdir));
		}

		return $socket;
	}

	/**
	 * fpm-temp directory
	 *
	 * @param boolean $createifnotexists create the directory if it does not exist
	 *
	 * @return string the directory
	 */
	public function getTempDir($createifnotexists = true) {

		$tmpdir = makeCorrectDir(Settings::Get('phpfpm.tmpdir') . '/' . $this->_domain['loginname'] . '/');

		if (!is_dir($tmpdir) && $createifnotexists) {
			safe_exec('mkdir -p ' . escapeshellarg($tmpdir));
			safe_exec('chown -R ' . $this->_domain['guid'] . ':' . $this->_domain['guid'] . ' ' . escapeshellarg($tmpdir));
			safe_exec('chmod 0750 ' . escapeshellarg($tmpdir));
		}

		return $tmpdir;
	}

	/**
	 * fastcgi-fakedirectory directory
	 *
	 * @param boolean $createifnotexists create the directory if it does not exist
	 *
	 * @return string the directory
	 */
	public function getAliasConfigDir($createifnotexists = true) {

		// ensure default...
		if (Settings::Get('phpfpm.aliasconfigdir') == null) {
			Settings::Set('phpfpm.aliasconfigdir', '/var/www/php-fpm');
		}

		$configdir = makeCorrectDir(Settings::Get('phpfpm.aliasconfigdir') . '/' . $this->_domain['loginname'] . '/' . $this->_domain['domain'] . '/');
		if (!is_dir($configdir) && $createifnotexists) {
			safe_exec('mkdir -p ' . escapeshellarg($configdir));
			safe_exec('chown ' . $this->_domain['guid'] . ':' . $this->_domain['guid'] . ' ' . escapeshellarg($configdir));
		}

		return $configdir;
	}

	/**
	 * return the admin-data of a specific admin
	 *
	 * @param int $adminid id of the admin-user
	 *
	 * @return array
	 */
	private function _getAdminData($adminid) {

		$adminid = intval($adminid);

		if (!isset($this->_admin_cache[$adminid])) {
			$stmt = Database::prepare("
					SELECT `email`, `loginname` FROM `" . TABLE_PANEL_ADMINS . "` WHERE `adminid` = :id"
			);
			$this->_admin_cache[$adminid] = Database::pexecute_first($stmt, array('id' => $adminid));
		}
		return $this->_admin_cache[$adminid];
	}
}
