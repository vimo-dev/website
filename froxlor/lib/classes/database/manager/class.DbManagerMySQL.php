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
 * @package    Classes
 *
 * @since      0.9.31
 *
 */

/**
 * Class DbManagerMySQL
 *
 * Explicit class for database-management like creating
 * and removing databases, users and permissions for MySQL
 *
 * @copyright  (c) the authors
 * @author     Michael Kaufmann <mkaufmann@nutime.de>
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Classes
 */
class DbManagerMySQL {

	/**
	 * FroxlorLogger object
	 * @var object
	 */
	private $_log = null;

	/**
	 * main constructor
	 *
	 * @param FroxlorLogger $log
	 */
	public function __construct(&$log = null) {
		$this->_log = $log;
	}

	/**
	 * creates a database
	 *
	 * @param string $dbname
	 */
	public function createDatabase($dbname = null) {
		Database::query("CREATE DATABASE `" . $dbname . "`");
	}

	/**
	 * grants access privileges on a database with the same
	 * username and sets the password for that user the given access_host
	 *
	 * @param string $username
	 * @param string $password
	 * @param string $access_host
	 * @param bool $p_encrypted optional, whether the password is encrypted or not, default false
	 */
	public function grantPrivilegesTo($username = null, $password = null, $access_host = null, $p_encrypted = false) {
		// grant privileges
		$stmt = Database::prepare("
				GRANT ALL PRIVILEGES ON `" . $username . "`.*
				TO :username@:host IDENTIFIED BY 'password'
				");
		Database::pexecute($stmt, array("username" => $username, "host" => $access_host));
		// set passoword
		if ($p_encrypted) {
			$stmt = Database::prepare("SET PASSWORD FOR :username@:host = :password");
		} else {
			$stmt = Database::prepare("SET PASSWORD FOR :username@:host = PASSWORD(:password)");
		}
		Database::pexecute($stmt, array("username" => $username, "host" => $access_host, "password" => $password));
	}

	/**
	 * removes the given database from the dbms and also
	 * takes away any privileges from a user to that db
	 *
	 * @param string $dbname
	 */
	public function deleteDatabase($dbname = null) {

		if (Database::getAttribute(PDO::ATTR_SERVER_VERSION) < '5.0.2') {
			// failsafe if user has been deleted manually (requires MySQL 4.1.2+)
			$stmt = Database::prepare("REVOKE ALL PRIVILEGES, GRANT OPTION FROM `".$dbname."`");
			Database::pexecute($stmt, array(), false);
		}

		$host_res_stmt = Database::prepare("
			SELECT `Host` FROM `mysql`.`user` WHERE `User` = :dbname"
		);
		Database::pexecute($host_res_stmt, array('dbname' => $dbname));

		while ($host = $host_res_stmt->fetch(PDO::FETCH_ASSOC)) {
			// as of MySQL 5.0.2 this also revokes privileges. (requires MySQL 4.1.2+)
			$drop_stmt = Database::prepare("DROP USER :dbname@:host");
			Database::pexecute($drop_stmt, array('dbname' => $dbname, 'host' => $host['Host']), false);
		}

		$drop_stmt = Database::prepare("DROP DATABASE IF EXISTS `".$dbname."`");
		Database::pexecute($drop_stmt);
	}

	/**
	 * removes a user from the dbms and revokes all privileges
	 *
	 * @param string $username
	 * @param string $host
	 */
	public function deleteUser($username = null, $host = null) {
		if (Database::getAttribute(PDO::ATTR_SERVER_VERSION) < '5.0.2') {
			// Revoke privileges (only required for MySQL 4.1.2 - 5.0.1)
			$stmt = Database::prepare("REVOKE ALL PRIVILEGES ON * . * FROM `". $username . "`@`".$host."`");
			Database::pexecute($stmt);
		}
		// as of MySQL 5.0.2 this also revokes privileges. (requires MySQL 4.1.2+)
		$stmt = Database::prepare("DROP USER :username@:host");
		Database::pexecute($stmt, array("username" => $username, "host" => $host));
	}

	/**
	 * removes permissions from a user
	 *
	 * @param string $username
	 * @param string $host (unused in mysql)
	 */
	public function disableUser($username = null, $host = null) {
		$stmt = Database::prepare("REVOKE ALL PRIVILEGES, GRANT OPTION FROM `".$row_database['databasename']."`");
		Database::pexecute($stmt, array(), false);
	}

	/**
	 * re-grant permissions to a user
	 *
	 * @param string $username
	 * @param string $host
	 */
	public function enableUser($username = null, $host = null) {
		Database::query('GRANT ALL PRIVILEGES ON `' . $username .'`.* TO `' . $username . '`@`' . $host . '`');
		Database::query('GRANT ALL PRIVILEGES ON `' . str_replace('_', '\_', $username) . '` . * TO `' . $username . '`@`' . $host . '`');
	}

	/**
	 * flushes the privileges...pretty obvious eh?
	 */
	public function flushPrivileges() {
		Database::query("FLUSH PRIVILEGES");
	}

	/**
	 * return an array of all usernames used in that DBMS
	 *
	 * @param bool $user_only if false, * will be selected from mysql.user and slightly different array will be generated
	 *
	 * @return array
	 */
	public function getAllSqlUsers($user_only = true) {

		if ($user_only == false) {
			$result_stmt = Database::prepare('SELECT * FROM mysql.user');
		} else {
			$result_stmt = Database::prepare('SELECT `User` FROM mysql.user');
		}
		Database::pexecute($result_stmt);
		$allsqlusers = array();
		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
			if ($user_only == false) {
				if (!isset($allsqlusers[$row['User']])
						|| !is_array($allsqlusers[$row['User']])
				) {
					$allsqlusers[$row['User']] = array(
							'password' => $row['Password'],
							'hosts' => array()
					);
				}
				$allsqlusers[$row['User']]['hosts'][] = $row['Host'];
			} else {
				$allsqlusers[] = $row['User'];
			}
		}
		return $allsqlusers;
	}

}
