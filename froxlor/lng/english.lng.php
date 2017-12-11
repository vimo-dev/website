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
 * @author     Florian Lippert <flo@syscp.org>
 * @author     Froxlor Team <team@froxlor.org>
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Language
 *
 */

/**
 * Global
 */

$lng['translator'] = '';
$lng['panel']['edit'] = 'Edit';
$lng['panel']['delete'] = 'Delete';
$lng['panel']['create'] = 'Create';
$lng['panel']['save'] = 'Save';
$lng['panel']['yes'] = 'Yes';
$lng['panel']['no'] = 'No';
$lng['panel']['emptyfornochanges'] = 'empty for no changes';
$lng['panel']['emptyfordefault'] = 'empty for defaults';
$lng['panel']['path'] = 'Path';
$lng['panel']['toggle'] = 'Toggle';
$lng['panel']['next'] = 'Next';
$lng['panel']['dirsmissing'] = 'Can not find or read the directory!';

/**
 * Login
 */

$lng['login']['username'] = 'Username';
$lng['login']['password'] = 'Password';
$lng['login']['language'] = 'Language';
$lng['login']['login'] = 'Login';
$lng['login']['logout'] = 'Logout';
$lng['login']['profile_lng'] = 'Profile language';

/**
 * Customer
 */

$lng['customer']['documentroot'] = 'Home directory';
$lng['customer']['name'] = 'Name';
$lng['customer']['firstname'] = 'First name';
$lng['customer']['company'] = 'Company';
$lng['customer']['street'] = 'Street';
$lng['customer']['zipcode'] = 'Zipcode';
$lng['customer']['city'] = 'City';
$lng['customer']['phone'] = 'Phone';
$lng['customer']['fax'] = 'Fax';
$lng['customer']['email'] = 'Email';
$lng['customer']['customernumber'] = 'Customer ID';
$lng['customer']['diskspace'] = 'Webspace (MiB)';
$lng['customer']['traffic'] = 'Traffic (GiB)';
$lng['customer']['mysqls'] = 'MySQL-databases';
$lng['customer']['emails'] = 'Email-addresses';
$lng['customer']['accounts'] = 'Email-accounts';
$lng['customer']['forwarders'] = 'Email-forwarders';
$lng['customer']['ftps'] = 'FTP-accounts';
$lng['customer']['subdomains'] = 'Subdomains';
$lng['customer']['domains'] = 'Domains';
$lng['customer']['unlimited'] = '∞';
$lng['customer']['mib'] = 'MiB';

/**
 * Customermenue
 */

$lng['menue']['main']['main'] = 'Main';
$lng['menue']['main']['changepassword'] = 'Change password';
$lng['menue']['main']['changelanguage'] = 'Change language';
$lng['menue']['email']['email'] = 'Email';
$lng['menue']['email']['emails'] = 'Addresses';
$lng['menue']['email']['webmail'] = 'Webmail';
$lng['menue']['mysql']['mysql'] = 'MySQL';
$lng['menue']['mysql']['databases'] = 'Databases';
$lng['menue']['mysql']['phpmyadmin'] = 'phpMyAdmin';
$lng['menue']['domains']['domains'] = 'Domains';
$lng['menue']['domains']['settings'] = 'Settings';
$lng['menue']['ftp']['ftp'] = 'FTP';
$lng['menue']['ftp']['accounts'] = 'Accounts';
$lng['menue']['ftp']['webftp'] = 'WebFTP';
$lng['menue']['extras']['extras'] = 'Extras';
$lng['menue']['extras']['directoryprotection'] = 'Directory protection';
$lng['menue']['extras']['pathoptions'] = 'Path options';

/**
 * Index
 */

$lng['index']['customerdetails'] = 'Customer details';
$lng['index']['accountdetails'] = 'Account details';

/**
 * Change Password
 */

$lng['changepassword']['old_password'] = 'Old password';
$lng['changepassword']['new_password'] = 'New password';
$lng['changepassword']['new_password_confirm'] = 'Confirm password';
$lng['changepassword']['new_password_ifnotempty'] = 'New password (empty = no change)';
$lng['changepassword']['also_change_ftp'] = ' also change password of the main FTP account';

/**
 * Domains
 */

$lng['domains']['description'] = 'Here you can create (sub-)domains and change their paths.<br />The system will need some time to apply the new settings after every change.';
$lng['domains']['domainsettings'] = 'Domain settings';
$lng['domains']['domainname'] = 'Domain name';
$lng['domains']['subdomain_add'] = 'Create subdomain';
$lng['domains']['subdomain_edit'] = 'Edit (sub)domain';
$lng['domains']['wildcarddomain'] = 'Create as wildcarddomain?';
$lng['domains']['aliasdomain'] = 'Alias for domain';
$lng['domains']['noaliasdomain'] = 'No alias domain';

/**
 * E-mails
 */

$lng['emails']['description'] = 'Here you can create and change your email addresses.<br />An account is like your letterbox in front of your house. If someone sends you an email, it will be dropped into the account.<br /><br />To download your emails use the following settings in your mailprogram: (The data in <i>italics</i> has to be changed to the equivalents you typed in!)<br />Hostname: <b><i>domainname</i></b><br />Username: <b><i>account name / e-mail address</i></b><br />password: <b><i>the password you\'ve chosen</i></b>';
$lng['emails']['emailaddress'] = 'Email-address';
$lng['emails']['emails_add'] = 'Create email-address';
$lng['emails']['emails_edit'] = 'Edit email-address';
$lng['emails']['catchall'] = 'Catchall';
$lng['emails']['iscatchall'] = 'Define as catchall-address?';
$lng['emails']['account'] = 'Account';
$lng['emails']['account_add'] = 'Create account';
$lng['emails']['account_delete'] = 'Delete account';
$lng['emails']['from'] = 'Source';
$lng['emails']['to'] = 'Destination';
$lng['emails']['forwarders'] = 'Forwarders';
$lng['emails']['forwarder_add'] = 'Create forwarder';

/**
 * FTP
 */

$lng['ftp']['description'] = 'Here you can create and change your FTP-accounts.<br />The changes are made instantly and the accounts can be used immediately.';
$lng['ftp']['account_add'] = 'Create account';

/**
 * MySQL
 */

$lng['mysql']['databasename'] = 'User/Database name';
$lng['mysql']['databasedescription'] = 'Database description';
$lng['mysql']['database_create'] = 'Create database';

/**
 * Extras
 */

$lng['extras']['description'] = 'Here you can add some extras, for example directory protection.<br />The system will need some time to apply the new settings after every change.';
$lng['extras']['directoryprotection_add'] = 'Add directory protection';
$lng['extras']['view_directory'] = 'Display directory content';
$lng['extras']['pathoptions_add'] = 'Add path options';
$lng['extras']['directory_browsing'] = 'Directory content browsing';
$lng['extras']['pathoptions_edit'] = 'Edit path options';
$lng['extras']['error404path'] = '404';
$lng['extras']['error403path'] = '403';
$lng['extras']['error500path'] = '500';
$lng['extras']['error401path'] = '401';
$lng['extras']['errordocument404path'] = 'ErrorDocument 404';
$lng['extras']['errordocument403path'] = 'ErrorDocument 403';
$lng['extras']['errordocument500path'] = 'ErrorDocument 500';
$lng['extras']['errordocument401path'] = 'ErrorDocument 401';

/**
 * Errors
 */

$lng['error']['error'] = 'Error';
$lng['error']['directorymustexist'] = 'The directory %s must exist. Please create it with your FTP client.';
$lng['error']['filemustexist'] = 'The file %s must exist.';
$lng['error']['allresourcesused'] = 'You have already used all of your resources.';
$lng['error']['domains_cantdeletemaindomain'] = 'You cannot delete a domain which is used as an email-domain.';
$lng['error']['domains_canteditdomain'] = 'You cannot edit this domain. It has been disabled by the admin.';
$lng['error']['domains_cantdeletedomainwithemail'] = 'You cannot delete a domain which is used as an email-domain. Delete all email addresses first.';
$lng['error']['firstdeleteallsubdomains'] = 'You have to delete all subdomains first before you can create a wildcard domain.';
$lng['error']['youhavealreadyacatchallforthisdomain'] = 'You have already defined a catchall for this domain.';
$lng['error']['ftp_cantdeletemainaccount'] = 'You cannot delete your main FTP account';
$lng['error']['login'] = 'The username or password you typed in is wrong. Please try it again!';
$lng['error']['login_blocked'] = 'This account has been suspended because of too many login errors. <br />Please try again in %s seconds.';
$lng['error']['notallreqfieldsorerrors'] = 'You have not filled in all or filled in some fields incorrectly.';
$lng['error']['oldpasswordnotcorrect'] = 'The old password is not correct.';
$lng['error']['youcantallocatemorethanyouhave'] = 'You cannot allocate more resources than you own for yourself.';
$lng['error']['mustbeurl'] = 'You have not typed a valid or complete url (e.g. http://somedomain.com/error404.htm)';
$lng['error']['invalidpath'] = 'You have not chosen a valid URL (maybe problems with the dirlisting?)';
$lng['error']['stringisempty'] = 'Missing Input in Field';
$lng['error']['stringiswrong'] = 'Wrong Input in Field';
$lng['error']['newpasswordconfirmerror'] = 'New password and confirmation does not match';
$lng['error']['mydomain'] = '\'Domain\'';
$lng['error']['mydocumentroot'] = '\'Documentroot\'';
$lng['error']['loginnameexists'] = 'Loginname %s already exists';
$lng['error']['emailiswrong'] = 'Email-address %s contains invalid characters or is incomplete';
$lng['error']['loginnameiswrong'] = 'Loginname "%s" contains illegal characters.';
$lng['error']['loginnameiswrong2'] = 'Loginname contains too many characters. Only %s characters are allowed.';
$lng['error']['userpathcombinationdupe'] = 'Combination of username and path already exists';
$lng['error']['patherror'] = 'General Error! Path cannot be empty';
$lng['error']['errordocpathdupe'] = 'Option for path %s already exists';
$lng['error']['adduserfirst'] = 'Please create a customer first';
$lng['error']['domainalreadyexists'] = 'The domain %s is already assigned to a customer';
$lng['error']['nolanguageselect'] = 'No language selected.';
$lng['error']['nosubjectcreate'] = 'You must define a topic for this mail template.';
$lng['error']['nomailbodycreate'] = 'You must define a mail-text for this mail template.';
$lng['error']['templatenotfound'] = 'Template was not found.';
$lng['error']['alltemplatesdefined'] = 'You can\'t define more templates, all languages are supported already.';
$lng['error']['wwwnotallowed'] = 'www is not allowed for subdomains.';
$lng['error']['subdomainiswrong'] = 'The subdomain %s contains invalid characters.';
$lng['error']['domaincantbeempty'] = 'The domain-name can not be empty.';
$lng['error']['domainexistalready'] = 'The domain %s already exists.';
$lng['error']['domainisaliasorothercustomer'] = 'The selected alias domain is either itself an alias domain, has a different ip/port combination or belongs to another customer.';
$lng['error']['emailexistalready'] = 'The email-address %s already exists.';
$lng['error']['maindomainnonexist'] = 'The main-domain %s does not exist.';
$lng['error']['destinationnonexist'] = 'Please create your forwarder in the field \'Destination\'.';
$lng['error']['destinationalreadyexistasmail'] = 'The forwarder to %s already exists as active email-address.';
$lng['error']['destinationalreadyexist'] = 'You have already defined a forwarder to %s .';
$lng['error']['destinationiswrong'] = 'The forwarder %s contains invalid character(s) or is incomplete.';
$lng['error']['ticketnotaccessible'] = 'You cannot access this ticket.';

/**
 * Questions
 */

$lng['question']['question'] = 'Security question';
$lng['question']['admin_customer_reallydelete'] = 'Do you really want to delete the customer %s? This cannot be undone!';
$lng['question']['admin_domain_reallydelete'] = 'Do you really want to delete the domain %s?';
$lng['question']['admin_domain_reallydisablesecuritysetting'] = 'Do you really want to disable this security setting OpenBasedir?';
$lng['question']['admin_admin_reallydelete'] = 'Do you really want to delete the admin %s? Every customer and domain will be reassigned to your account.';
$lng['question']['admin_template_reallydelete'] = 'Do you really want to delete the template \'%s\'?';
$lng['question']['domains_reallydelete'] = 'Do you really want to delete the domain %s?';
$lng['question']['email_reallydelete'] = 'Do you really want to delete the email-address %s?';
$lng['question']['email_reallydelete_account'] = 'Do you really want to delete the email-account of %s?';
$lng['question']['email_reallydelete_forwarder'] = 'Do you really want to delete the forwarder %s?';
$lng['question']['extras_reallydelete'] = 'Do you really want to delete the directory protection for %s?';
$lng['question']['extras_reallydelete_pathoptions'] = 'Do you really want to delete the path options for %s?';
$lng['question']['ftp_reallydelete'] = 'Do you really want to delete the FTP-account %s?';
$lng['question']['mysql_reallydelete'] = 'Do you really want to delete the database %s? This cannot be undone!';
$lng['question']['admin_configs_reallyrebuild'] = 'Do you really want to rebuild all config files?';
$lng['question']['admin_customer_alsoremovefiles'] = 'Remove user files too?';
$lng['question']['admin_customer_alsoremovemail'] = 'Completely remove email data from filesystem?';
$lng['question']['admin_customer_alsoremoveftphomedir'] = 'Also remove FTP-user homedir?';

/**
 * Mails
 */

$lng['mails']['pop_success']['mailbody'] = 'Hello,\n\nyour mail account {EMAIL}\nwas set up successfully.\n\nThis is an automatically created\ne-mail, please do not answer!\n\nYours sincerely, your administrator';
$lng['mails']['pop_success']['subject'] = 'Mail account set up successfully';
$lng['mails']['createcustomer']['mailbody'] = 'Hello {FIRSTNAME} {NAME},\n\nhere is your account information:\n\nUsername: {USERNAME}\nPassword: {PASSWORD}\n\nThank you,\nyour administrator';
$lng['mails']['createcustomer']['subject'] = 'Account information';

/**
 * Admin
 */

$lng['admin']['overview'] = 'Overview';
$lng['admin']['ressourcedetails'] = 'Used resources';
$lng['admin']['systemdetails'] = 'System details';
$lng['admin']['froxlordetails'] = 'Froxlor details';
$lng['admin']['installedversion'] = 'Installed version';
$lng['admin']['latestversion'] = 'Latest version';
$lng['admin']['lookfornewversion']['clickhere'] = 'Search via webservice';
$lng['admin']['lookfornewversion']['error'] = 'Error while reading';
$lng['admin']['resources'] = 'Resources';
$lng['admin']['customer'] = 'Customer';
$lng['admin']['customers'] = 'Customers';
$lng['admin']['customer_add'] = 'Create customer';
$lng['admin']['customer_edit'] = 'Edit customer';
$lng['admin']['domains'] = 'Domains';
$lng['admin']['domain_add'] = 'Create domain';
$lng['admin']['domain_edit'] = 'Edit domain';
$lng['admin']['subdomainforemail'] = 'Subdomains as email-domains';
$lng['admin']['admin'] = 'Admin';
$lng['admin']['admins'] = 'Admins';
$lng['admin']['admin_add'] = 'Create admin';
$lng['admin']['admin_edit'] = 'Edit admin';
$lng['admin']['customers_see_all'] = 'Can see all customers?';
$lng['admin']['domains_see_all'] = 'Can see all domains?';
$lng['admin']['change_serversettings'] = 'Can change server settings?';
$lng['admin']['server'] = 'System';
$lng['admin']['serversettings'] = 'Settings';
$lng['admin']['rebuildconf'] = 'Rebuild config files';
$lng['admin']['stdsubdomain'] = 'Standard subdomain';
$lng['admin']['stdsubdomain_add'] = 'Create standard subdomain';
$lng['admin']['phpenabled'] = 'PHP enabled';
$lng['admin']['deactivated'] = 'Deactivated';
$lng['admin']['deactivated_user'] = 'Deactivate user';
$lng['admin']['sendpassword'] = 'Send password';
$lng['admin']['ownvhostsettings'] = 'Own vHost-settings';
$lng['admin']['configfiles']['serverconfiguration'] = 'Configuration';
$lng['admin']['templates']['templates'] = 'Email-templates';
$lng['admin']['templates']['template_add'] = 'Add template';
$lng['admin']['templates']['template_edit'] = 'Edit template';
$lng['admin']['templates']['action'] = 'Action';
$lng['admin']['templates']['email'] = 'Email & file templates';
$lng['admin']['templates']['subject'] = 'Subject';
$lng['admin']['templates']['mailbody'] = 'Mail body';
$lng['admin']['templates']['createcustomer'] = 'Welcome mail for new customers';
$lng['admin']['templates']['pop_success'] = 'Welcome mail for new email accounts';
$lng['admin']['templates']['template_replace_vars'] = 'Variables to be replaced in the template:';
$lng['admin']['templates']['SALUTATION'] = 'Replaced with a correct salutation (name or company)';
$lng['admin']['templates']['FIRSTNAME'] = 'Replaced with the customers firstname.';
$lng['admin']['templates']['NAME'] = 'Replaced with the customers name.';
$lng['admin']['templates']['COMPANY'] = 'Replaces with the customers company name';
$lng['admin']['templates']['USERNAME'] = 'Replaced with the customers account username.';
$lng['admin']['templates']['PASSWORD'] = 'Replaced with the customers account password.';
$lng['admin']['templates']['EMAIL'] = 'Replaced with the address of the POP3/IMAP account.';
$lng['admin']['webserver'] = 'Webserver';
$lng['admin']['bindzonewarning'] = $lng['panel']['emptyfordefault'] . '<br /><strong class="red">ATTENTION:</strong> If you use a zonefile you will have to manage all required records for all sub-zones manually as well.';

/**
 * Serversettings
 */

$lng['serversettings']['session_timeout']['title'] = 'Session Timeout';
$lng['serversettings']['session_timeout']['description'] = 'How long does a user have to be inactive before a session gets invalid (seconds)?';
$lng['serversettings']['accountprefix']['title'] = 'Customer prefix';
$lng['serversettings']['accountprefix']['description'] = 'Which prefix should customer accounts have?';
$lng['serversettings']['mysqlprefix']['title'] = 'SQL Prefix';
$lng['serversettings']['mysqlprefix']['description'] = 'Which prefix should MySQL accounts have?</br>Use "RANDOM" as value to get a 3-digit random prefix';
$lng['serversettings']['ftpprefix']['title'] = 'FTP Prefix';
$lng['serversettings']['ftpprefix']['description'] = 'Which prefix should ftp accounts have?<br/><b>If you change this you also have to change the Quota SQL Query in your FTP Server config file in case you use it!</b> ';
$lng['serversettings']['documentroot_prefix']['title'] = 'Home directory';
$lng['serversettings']['documentroot_prefix']['description'] = 'Where should all home directories be stored?';
$lng['serversettings']['logfiles_directory']['title'] = 'Logfiles directory';
$lng['serversettings']['logfiles_directory']['description'] = 'Where should all log files be stored?';
$lng['serversettings']['ipaddress']['title'] = 'IP-address';
$lng['serversettings']['ipaddress']['description'] = 'What\'s the main IP-address of this server?';
$lng['serversettings']['hostname']['title'] = 'Hostname';
$lng['serversettings']['hostname']['description'] = 'What\'s the Hostname of this server?';
$lng['serversettings']['apachereload_command']['title'] = 'Webserver reload command';
$lng['serversettings']['apachereload_command']['description'] = 'What\'s the webserver command to reload configfiles?';
$lng['serversettings']['bindenable']['title'] = 'Enable Nameserver';
$lng['serversettings']['bindenable']['description'] = 'Here the Nameserver can be enabled and disabled globaly.';
$lng['serversettings']['bindconf_directory']['title'] = 'Dns server config directory';
$lng['serversettings']['bindconf_directory']['description'] = 'Where should dns-server configfiles be saved?';
$lng['serversettings']['bindreload_command']['title'] = 'DNS server reload command';
$lng['serversettings']['bindreload_command']['description'] = 'What\'s the command to reload the dns server daemon?';
$lng['serversettings']['vmail_uid']['title'] = 'Mails-UID';
$lng['serversettings']['vmail_uid']['description'] = 'Which UserID should mails have?';
$lng['serversettings']['vmail_gid']['title'] = 'Mails-GID';
$lng['serversettings']['vmail_gid']['description'] = 'Which GroupID should mails have?';
$lng['serversettings']['vmail_homedir']['title'] = 'Mails-homedir';
$lng['serversettings']['vmail_homedir']['description'] = 'Where should all mails be stored?';
$lng['serversettings']['adminmail']['title'] = 'Sender';
$lng['serversettings']['adminmail']['description'] = 'What\'s the sender address for emails sent from the Panel?';
$lng['serversettings']['phpmyadmin_url']['title'] = 'phpMyAdmin URL';
$lng['serversettings']['phpmyadmin_url']['description'] = 'What\'s the URL to phpMyAdmin? (has to start with http(s)://)';
$lng['serversettings']['webmail_url']['title'] = 'Webmail URL';
$lng['serversettings']['webmail_url']['description'] = 'What\'s the URL to webmail? (has to start with http(s)://)';
$lng['serversettings']['webftp_url']['title'] = 'WebFTP URL';
$lng['serversettings']['webftp_url']['description'] = 'What\'s the URL to  WebFTP? (has to start with http(s)://)';
$lng['serversettings']['language']['description'] = 'What\'s your standard server language?';
$lng['serversettings']['maxloginattempts']['title'] = 'Max Login Attempts';
$lng['serversettings']['maxloginattempts']['description'] = 'Maximum login attempts after which the account gets disabled.';
$lng['serversettings']['deactivatetime']['title'] = 'Deactivation Time';
$lng['serversettings']['deactivatetime']['description'] = 'Time (sec.) an account gets disabled after too many login tries.';
$lng['serversettings']['pathedit']['title'] = 'Type of path input';
$lng['serversettings']['pathedit']['description'] = 'Should a path be selected by a dropdown menu or by an input field?';
$lng['serversettings']['nameservers']['title'] = 'Nameservers';
$lng['serversettings']['nameservers']['description'] = 'A comma separated list containing the hostnames of all nameservers. The first one will be the primary one.';
$lng['serversettings']['mxservers']['title'] = 'MX servers';
$lng['serversettings']['mxservers']['description'] = 'A comma separated list containing a pair of a number and a hostname separated by whitespace (e.g. \'10 mx.example.com\') containing the mx servers.';

/**
 * CHANGED BETWEEN 1.2.12 and 1.2.13
 */

$lng['mysql']['description'] = 'Here you can create and change your MySQL-databases.<br />The changes are made instantly and the database can be used immediately.<br />At the menu on the left side you find the tool phpMyAdmin with which you can easily administer your database.<br /><br />To use your databases in your own php-scripts use the following settings: (The data in <i>italics</i> have to be changed into the equivalents you typed in!)<br />Hostname: <b><SQL_HOST></b><br />Username: <b><i>databasename</i></b><br />Password: <b><i>the password you\'ve chosen</i></b><br />Database: <b><i>databasename</i></b>';

/**
 * ADDED BETWEEN 1.2.12 and 1.2.13
 */

$lng['serversettings']['paging']['title'] = 'Entries per page';
$lng['serversettings']['paging']['description'] = 'How many entries shall be shown on one page? (0 = disable paging)';
$lng['error']['ipstillhasdomains'] = 'The IP/Port combination you want to delete still has domains assigned to it, please reassign those to other IP/Port combinations before deleting this IP/Port combination.';
$lng['error']['cantdeletedefaultip'] = 'You cannot delete the default reseller IP/Port combination, please make another IP/Port combination default for resellers before deleting this IP/Port combination.';
$lng['error']['cantdeletesystemip'] = 'You cannot delete the last system IP, either create a new IP/Port combination for the system IP or change the system IP.';
$lng['error']['myipaddress'] = '\'IP\'';
$lng['error']['myport'] = '\'Port\'';
$lng['error']['myipdefault'] = 'You need to select an IP/Port combination that should become default.';
$lng['error']['myipnotdouble'] = 'This IP/Port combination already exists.';
$lng['error']['admin_domain_emailsystemhostname'] = 'The server-hostname cannot be used as customer-domain.';
$lng['question']['admin_ip_reallydelete'] = 'Do you really want to delete the IP address %s?';
$lng['admin']['ipsandports']['ipsandports'] = 'IPs and Ports';
$lng['admin']['ipsandports']['add'] = 'Add IP/Port';
$lng['admin']['ipsandports']['edit'] = 'Edit IP/Port';
$lng['admin']['ipsandports']['ipandport'] = 'IP/Port';
$lng['admin']['ipsandports']['ip'] = 'IP';
$lng['admin']['ipsandports']['port'] = 'Port';

// ADDED IN 1.2.13-rc3

$lng['error']['cantchangesystemip'] = 'You cannot change the last system IP, either create another new IP/Port combination for the system IP or change the system IP.';
$lng['question']['admin_domain_reallydocrootoutofcustomerroot'] = 'Are you sure, you want the document root for this domain, not being within the customer root of the customer?';

// ADDED IN 1.2.14-rc1

$lng['admin']['memorylimitdisabled'] = 'Disabled';
$lng['domain']['openbasedirpath'] = 'OpenBasedir-path';
$lng['domain']['docroot'] = 'Path from field above';
$lng['domain']['homedir'] = 'Home directory';
$lng['admin']['valuemandatory'] = 'This value is mandatory';
$lng['admin']['valuemandatorycompany'] = 'Either "name" and "firstname" or "company" must be filled';
$lng['menue']['main']['username'] = 'Logged in as: ';
$lng['panel']['urloverridespath'] = 'URL (overrides path)';
$lng['panel']['pathorurl'] = 'Path or URL';
$lng['error']['sessiontimeoutiswrong'] = 'Only numerical "session timeout" is allowed.';
$lng['error']['maxloginattemptsiswrong'] = 'Only numerical "max login attempts" are allowed.';
$lng['error']['deactivatetimiswrong'] = 'Only numerical "deactivation time" is allowed.';
$lng['error']['accountprefixiswrong'] = 'The "customerprefix" is wrong.';
$lng['error']['mysqlprefixiswrong'] = 'The "SQL prefix" is wrong.';
$lng['error']['ftpprefixiswrong'] = 'The "FTP prefix" is wrong.';
$lng['error']['ipiswrong'] = 'The "IP-address" is wrong. Only a valid IP-address is allowed.';
$lng['error']['vmailuidiswrong'] = 'The "mails-uid" is wrong. Only a numerical UID is allowed.';
$lng['error']['vmailgidiswrong'] = 'The "mails-gid" is wrong. Only a numerical GID is allowed.';
$lng['error']['adminmailiswrong'] = 'The "sender-address" is wrong. Only a valid email-address is allowed.';
$lng['error']['pagingiswrong'] = 'The "entries per page"-value is wrong. Only numerical characters are allowed.';
$lng['error']['phpmyadminiswrong'] = 'The phpMyAdmin-link is not a valid link.';
$lng['error']['webmailiswrong'] = 'The webmail-link is not a valid link.';
$lng['error']['webftpiswrong'] = 'The WebFTP-link is not a valid link.';
$lng['domains']['hasaliasdomains'] = 'Has alias domain(s)';
$lng['serversettings']['defaultip']['title'] = 'Default IP/Port';
$lng['serversettings']['defaultip']['description'] = 'Select all IP-addresses you want to use as default for new domains';
$lng['domains']['statstics'] = 'Usage Statistics';
$lng['panel']['ascending'] = 'ascending';
$lng['panel']['descending'] = 'descending';
$lng['panel']['search'] = 'Search';
$lng['panel']['used'] = 'used';

// ADDED IN 1.2.14-rc3

$lng['panel']['translator'] = 'Translator';

// ADDED IN 1.2.14-rc4

$lng['error']['stringformaterror'] = 'The value for the field "%s" is not in the expected format.';

// ADDED IN 1.2.15-rc1

$lng['admin']['serversoftware'] = 'Serversoftware';
$lng['admin']['phpversion'] = 'PHP-Version';
$lng['admin']['mysqlserverversion'] = 'MySQL server version';
$lng['admin']['webserverinterface'] = 'Webserver interface';
$lng['domains']['isassigneddomain'] = 'Is assigned domain';
$lng['serversettings']['phpappendopenbasedir']['title'] = 'Paths to append to OpenBasedir';
$lng['serversettings']['phpappendopenbasedir']['description'] = 'These paths (separated by colons) will be added to the OpenBasedir-statement in every vHost-container.';

// CHANGED IN 1.2.15-rc1

$lng['error']['loginnameissystemaccount'] = 'You cannot create accounts which are similar to system accounts (as for example begin with "%s"). Please enter another account name.';
$lng['error']['youcantdeleteyourself'] = 'You cannot delete yourself for security reasons.';
$lng['error']['youcanteditallfieldsofyourself'] = 'Note: You cannot edit all fields of your own account for security reasons.';

// ADDED IN 1.2.16-svn1

$lng['serversettings']['natsorting']['title'] = 'Use natural human sorting in list view';
$lng['serversettings']['natsorting']['description'] = 'Sorts lists as web1 -> web2 -> web11 instead of web1 -> web11 -> web2.';

// ADDED IN 1.2.16-svn2

$lng['serversettings']['deactivateddocroot']['title'] = 'Docroot for deactivated users';
$lng['serversettings']['deactivateddocroot']['description'] = 'When a user is deactivated this path is used as his docroot. Leave empty for not creating a vHost at all.';

// ADDED IN 1.2.16-svn4

$lng['panel']['reset'] = 'Discard changes';
$lng['admin']['accountsettings'] = 'Account settings';
$lng['admin']['panelsettings'] = 'Panel settings';
$lng['admin']['systemsettings'] = 'System settings';
$lng['admin']['webserversettings'] = 'Webserver settings';
$lng['admin']['mailserversettings'] = 'Mailserver settings';
$lng['admin']['nameserversettings'] = 'Nameserver settings';
$lng['admin']['updatecounters'] = 'Recalculate resource usage';
$lng['question']['admin_counters_reallyupdate'] = 'Do you really want to recalculate resource usage?';
$lng['panel']['pathDescription'] = 'If the directory doesn\'t exist, it will be created automatically.';
$lng['panel']['pathDescriptionEx'] = '<br /><br />If you want a redirect to another domain than this entry has to start with http:// or https://.';
$lng['panel']['pathDescriptionSubdomain'] = $lng['panel']['pathDescription'].$lng['panel']['pathDescriptionEx']."<br /><br />If the URL ends with / it is considered a folder, if not, it is treated as file.";

// ADDED IN 1.2.16-svn6

$lng['admin']['templates']['TRAFFIC'] = 'Replaced with the traffic in mB, which was assigned to the customer.';
$lng['admin']['templates']['TRAFFICUSED'] = 'Replaced with the traffic in MB, which was exhausted by the customer.';

// ADDED IN 1.2.16-svn7

$lng['admin']['subcanemaildomain']['never'] = 'Never';
$lng['admin']['subcanemaildomain']['choosableno'] = 'Choosable, default no';
$lng['admin']['subcanemaildomain']['choosableyes'] = 'Choosable, default yes';
$lng['admin']['subcanemaildomain']['always'] = 'Always';
$lng['changepassword']['also_change_webalizer'] = ' also change password for the statistics page';

// ADDED IN 1.2.16-svn8

$lng['serversettings']['mailpwcleartext']['title'] = 'Also save passwords of mail accounts unencrypted in database';
$lng['serversettings']['mailpwcleartext']['description'] = 'If this is set to yes, all passwords will also be saved unencrypted (clear text, plain readable for everyone with database access) in the mail_users-table. Only activate this if you intend to use SASL!';
$lng['serversettings']['mailpwcleartext']['removelink'] = 'Click here to wipe all unencrypted passwords from the table.';
$lng['question']['admin_cleartextmailpws_reallywipe'] = 'Do you really want to wipe all unencrypted mail account passwords from the table mail_users? This cannot be reverted!';
$lng['admin']['configfiles']['overview'] = 'Overview';
$lng['admin']['configfiles']['wizard'] = 'Wizard';
$lng['admin']['configfiles']['distribution'] = 'Distribution';
$lng['admin']['configfiles']['service'] = 'Service';
$lng['admin']['configfiles']['daemon'] = 'Daemon';
$lng['admin']['configfiles']['http'] = 'Webserver (HTTP)';
$lng['admin']['configfiles']['dns'] = 'Nameserver (DNS)';
$lng['admin']['configfiles']['mail'] = 'Mailserver (IMAP/POP3)';
$lng['admin']['configfiles']['smtp'] = 'Mailserver (SMTP)';
$lng['admin']['configfiles']['ftp'] = 'FTP-server';
$lng['admin']['configfiles']['etc'] = 'Others (System)';
$lng['admin']['configfiles']['choosedistribution'] = '-- Choose a distribution --';
$lng['admin']['configfiles']['chooseservice'] = '-- Choose a service --';
$lng['admin']['configfiles']['choosedaemon'] = '-- Choose a daemon --';

// ADDED IN 1.2.16-svn10

$lng['serversettings']['ftpdomain']['title'] = 'FTP accounts @domain';
$lng['serversettings']['ftpdomain']['description'] = 'Customers can create FTP accounts user@customerdomain?';
$lng['panel']['back'] = 'Back';

// ADDED IN 1.2.16-svn12

$lng['serversettings']['mod_fcgid']['title'] = 'Enable FCGID';
$lng['serversettings']['mod_fcgid']['description'] = 'Use this to run PHP with the corresponding useraccount.<br /><br /><b>This needs a special webserver configuration for Apache, see <a target="blank" href="http://redmine.froxlor.org/projects/froxlor/wiki/HandbookApache2_fcgid">FCGID - handbook</a></b>';
$lng['serversettings']['sendalternativemail']['title'] = 'Use alternative email-address';
$lng['serversettings']['sendalternativemail']['description'] = 'Send the password-email to a different address during email-account-creation';
$lng['emails']['alternative_emailaddress'] = 'Alternative e-mail-address';
$lng['mails']['pop_success_alternative']['mailbody'] = 'Hello,\n\nyour Mail account {EMAIL}\nwas set up successfully.\nYour password is {PASSWORD}.\n\nThis is an automatically created\ne-mail, please do not answer!\n\nYours sincerely, your administrator';
$lng['mails']['pop_success_alternative']['subject'] = 'Mail account set up successfully';
$lng['admin']['templates']['pop_success_alternative'] = 'Welcome mail for new email accounts sent to alternative address';
$lng['admin']['templates']['EMAIL_PASSWORD'] = 'Replaced with the POP3/IMAP account password.';

// ADDED IN 1.2.16-svn13

$lng['error']['documentrootexists'] = 'The directory "%s" already exists for this customer. Please remove this before adding the customer again.';

// ADDED IN 1.2.16-svn14

$lng['serversettings']['apacheconf_vhost']['title'] = 'Webserver vHost configuration file/dirname';
$lng['serversettings']['apacheconf_vhost']['description'] = 'Where should the vHost configuration be stored? You could either specify a file (all vHosts in one file) or directory (each vHost in his own file) here.';
$lng['serversettings']['apacheconf_diroptions']['title'] = 'Webserver diroptions configuration file/dirname';
$lng['serversettings']['apacheconf_diroptions']['description'] = 'Where should the diroptions configuration be stored? You could either specify a file (all diroptions in one file) or directory (each diroption in his own file) here.';
$lng['serversettings']['apacheconf_htpasswddir']['title'] = 'Webserver htpasswd dirname';
$lng['serversettings']['apacheconf_htpasswddir']['description'] = 'Where should the htpasswd files for directory protection be stored?';

// ADDED IN 1.2.16-svn15

$lng['error']['formtokencompromised'] = 'The request seems to be compromised. For security reasons you were logged out.';
$lng['serversettings']['mysql_access_host']['title'] = 'MySQL-Access-Hosts';
$lng['serversettings']['mysql_access_host']['description'] = 'A comma separated list of hosts from which users should be allowed to connect to the MySQL-Server.';

// ADDED IN 1.2.18-svn1

$lng['admin']['ipsandports']['create_listen_statement'] = 'Create Listen statement';
$lng['admin']['ipsandports']['create_namevirtualhost_statement'] = 'Create NameVirtualHost statement';
$lng['admin']['ipsandports']['create_vhostcontainer'] = 'Create vHost-Container';
$lng['admin']['ipsandports']['create_vhostcontainer_servername_statement'] = 'Create ServerName statement in vHost-Container';

// ADDED IN 1.2.18-svn2

$lng['admin']['webalizersettings'] = 'Webalizer settings';
$lng['admin']['webalizer']['normal'] = 'Normal';
$lng['admin']['webalizer']['quiet'] = 'Quiet';
$lng['admin']['webalizer']['veryquiet'] = 'No output';
$lng['serversettings']['webalizer_quiet']['title'] = 'Webalizer output';
$lng['serversettings']['webalizer_quiet']['description'] = 'Verbosity of the webalizer-program';

// ADDED IN 1.2.18-svn3

$lng['ticket']['admin_email'] = 'root@localhost';
$lng['ticket']['noreply_email'] = 'tickets@froxlor';
$lng['admin']['ticketsystem'] = 'Support-tickets';
$lng['menue']['ticket']['ticket'] = 'Support tickets';
$lng['menue']['ticket']['categories'] = 'Support categories';
$lng['menue']['ticket']['archive'] = 'Ticket-archive';
$lng['ticket']['description'] = 'Here you can send help-requests to your responsible administrator.<br />Notifications will be sent via e-mail.';
$lng['ticket']['ticket_new'] = 'Open a new ticket';
$lng['ticket']['ticket_reply'] = 'Answer ticket';
$lng['ticket']['ticket_reopen'] = 'Reopen ticket';
$lng['ticket']['ticket_newcateory'] = 'Create new category';
$lng['ticket']['ticket_editcateory'] = 'Edit category';
$lng['ticket']['ticket_view'] = 'View ticketcourse';
$lng['ticket']['ticketcount'] = 'Tickets';
$lng['ticket']['ticket_answers'] = 'Replies';
$lng['ticket']['subject'] = 'Subject';
$lng['ticket']['status'] = 'Status';
$lng['ticket']['lastreplier'] = 'Last replier';
$lng['ticket']['priority'] = 'Priority';
$lng['ticket']['low'] = 'Low';
$lng['ticket']['normal'] = 'Normal';
$lng['ticket']['high'] = 'High';
$lng['ticket']['lastchange'] = 'Last change';
$lng['ticket']['lastchange_from'] = 'From date (dd.mm.yyyy)';
$lng['ticket']['lastchange_to'] = 'To date (dd.mm.yyyy)';
$lng['ticket']['category'] = 'Category';
$lng['ticket']['no_cat'] = 'None';
$lng['ticket']['message'] = 'Message';
$lng['ticket']['show'] = 'View';
$lng['ticket']['answer'] = 'Answer';
$lng['ticket']['close'] = 'Close';
$lng['ticket']['reopen'] = 'Re-open';
$lng['ticket']['archive'] = 'Archive';
$lng['ticket']['ticket_delete'] = 'Delete ticket';
$lng['ticket']['lastarchived'] = 'Recently archived tickets';
$lng['ticket']['archivedtime'] = 'Archived';
$lng['ticket']['open'] = 'Open';
$lng['ticket']['wait_reply'] = 'Waiting for reply';
$lng['ticket']['replied'] = 'Replied';
$lng['ticket']['closed'] = 'Closed';
$lng['ticket']['staff'] = 'Staff';
$lng['ticket']['customer'] = 'Customer';
$lng['ticket']['old_tickets'] = 'Ticket messages';
$lng['ticket']['search'] = 'Search archive';
$lng['ticket']['nocustomer'] = 'No choice';
$lng['ticket']['archivesearch'] = 'Archive searchresults';
$lng['ticket']['noresults'] = 'No tickets found';
$lng['ticket']['notmorethanxopentickets'] = 'Due to spam-protection you cannot have more than %s open tickets';
$lng['ticket']['supportstatus'] = 'Support-Status';
$lng['ticket']['supportavailable'] = '<span class="ticket_low">Our support engineers are available and ready to assist.</span>';
$lng['ticket']['supportnotavailable'] = '<span class="ticket_high">Our support engineers are currently not available</span>';
$lng['admin']['templates']['ticket'] = 'Notification-mails for support-tickets';
$lng['admin']['templates']['SUBJECT'] = 'Replaced with the support-ticket subject';
$lng['admin']['templates']['new_ticket_for_customer'] = 'Customer-information that the ticket has been sent';
$lng['admin']['templates']['new_ticket_by_customer'] = 'Admin-notification for a ticket opened by a customer';
$lng['admin']['templates']['new_reply_ticket_by_customer'] = 'Admin-notification for a ticket-reply by a customer';
$lng['admin']['templates']['new_ticket_by_staff'] = 'Customer-notification for a ticket opened by a staff';
$lng['admin']['templates']['new_reply_ticket_by_staff'] = 'Customer-notification for a ticket-reply by a staff';
$lng['mails']['new_ticket_for_customer']['mailbody'] = 'Hello {FIRSTNAME} {NAME},\n\nyour support-ticket with the subject "{SUBJECT}" has been sent.\n\nYou will be notified when your ticket has been answered.\n\nThank you,\nyour administrator';
$lng['mails']['new_ticket_for_customer']['subject'] = 'Your support ticket has been sent';
$lng['mails']['new_ticket_by_customer']['mailbody'] = 'Hello admin,\n\na new support-ticket with the subject "{SUBJECT}" has been submitted.\n\nPlease login to open the ticket.\n\nThank you,\nyour administrator';
$lng['mails']['new_ticket_by_customer']['subject'] = 'New support ticket submitted';
$lng['mails']['new_reply_ticket_by_customer']['mailbody'] = 'Hello admin,\n\nthe support-ticket "{SUBJECT}" has been answered by a customer.\n\nPlease login to open the ticket.\n\nThank you,\nyour administrator';
$lng['mails']['new_reply_ticket_by_customer']['subject'] = 'New reply to support ticket';
$lng['mails']['new_ticket_by_staff']['mailbody'] = 'Hello {FIRSTNAME} {NAME},\n\na support-ticket with the subject "{SUBJECT}" has been opened for you.\n\nPlease login to open the ticket.\n\nThank you,\nyour administrator';
$lng['mails']['new_ticket_by_staff']['subject'] = 'New support ticket submitted';
$lng['mails']['new_reply_ticket_by_staff']['mailbody'] = 'Hello {FIRSTNAME} {NAME},\n\nthe support-ticket with the subject "{SUBJECT}" has been answered by our staff.\n\nPlease login to view the ticket.\n\nThank you,\nyour administrator';
$lng['mails']['new_reply_ticket_by_staff']['subject'] = 'New reply to support ticket';
$lng['question']['ticket_reallyclose'] = 'Do you really want to close the ticket "%s"?';
$lng['question']['ticket_reallydelete'] = 'Do you really want to delete the ticket "%s"?';
$lng['question']['ticket_reallydeletecat'] = 'Do you really want to delete the category "%s"?';
$lng['question']['ticket_reallyarchive'] = 'Do you really want to move the ticket "%s" to the archive?';
$lng['error']['nomoreticketsavailable'] = 'You have used all your available tickets. Please contact your administrator.';
$lng['error']['nocustomerforticket'] = 'Cannot create tickets without customers';
$lng['error']['categoryhastickets'] = 'The category still has tickets in it.<br />Please delete the tickets to delete the category';
$lng['admin']['ticketsettings'] = 'Support-Ticket settings';
$lng['admin']['archivelastrun'] = 'Last ticket archiving';
$lng['serversettings']['ticket']['noreply_email']['title'] = 'No-reply e-mail address';
$lng['serversettings']['ticket']['noreply_email']['description'] = 'The sender-address for support-ticket, mostly something like no-reply@domain.tld';
$lng['serversettings']['ticket']['worktime_begin']['title'] = 'Begin support-time (hh:mm)';
$lng['serversettings']['ticket']['worktime_begin']['description'] = 'Start-time when support is available';
$lng['serversettings']['ticket']['worktime_end']['title'] = 'End support-time (hh:mm)';
$lng['serversettings']['ticket']['worktime_end']['description'] = 'End-time when support is available';
$lng['serversettings']['ticket']['worktime_sat'] = 'Support available on saturdays?';
$lng['serversettings']['ticket']['worktime_sun'] = 'Support available on sundays?';
$lng['serversettings']['ticket']['worktime_all']['title'] = 'No time limit for support';
$lng['serversettings']['ticket']['worktime_all']['description'] = 'If "Yes" the options for start- and endtime will be overwritten';
$lng['serversettings']['ticket']['archiving_days'] = 'After how many days should closed tickets be archived?';
$lng['customer']['tickets'] = 'Support-tickets';

// ADDED IN 1.2.18-svn4

$lng['admin']['domain_nocustomeraddingavailable'] = 'It\'s not possible to add a domain currently. You first need to add at least one customer.';
$lng['serversettings']['ticket']['enable'] = 'Enable ticketsystem';
$lng['serversettings']['ticket']['concurrentlyopen'] = 'How many tickets shall be able to be opened at one time?';
$lng['error']['norepymailiswrong'] = 'The "Noreply-address" is wrong. Only a valid email-address is allowed.';
$lng['error']['tadminmailiswrong'] = 'The "Ticketadmin-address" is wrong. Only a valid email-address is allowed.';
$lng['ticket']['awaitingticketreply'] = 'You have %s unanswered support-ticket(s)';

// ADDED IN 1.2.18-svn5

$lng['serversettings']['ticket']['noreply_name'] = 'Ticket e-mail sendername';

// ADDED IN 1.2.19-svn1

$lng['serversettings']['mod_fcgid']['configdir']['title'] = 'Configuration directory';
$lng['serversettings']['mod_fcgid']['configdir']['description'] = 'Where should all fcgid-configuration files be stored? If you don\'t use a self compiled suexec binary, which is the normal situation, this path must be under /var/www/<br /><br /><div class="red">NOTE: This folder\'s content gets deleted regulary so avoid storing data in there manually.</div>';
$lng['serversettings']['mod_fcgid']['tmpdir']['title'] = 'Temp directory';

// ADDED IN 1.2.19-svn3

$lng['serversettings']['ticket']['reset_cycle']['title'] = 'Reset used tickets cycle';
$lng['serversettings']['ticket']['reset_cycle']['description'] = 'Reset the customers used ticket counter to 0 in the chosen cycle';
$lng['admin']['tickets']['daily'] = 'Daily';
$lng['admin']['tickets']['weekly'] = 'Weekly';
$lng['admin']['tickets']['monthly'] = 'Monthly';
$lng['admin']['tickets']['yearly'] = 'Yearly';
$lng['error']['ticketresetcycleiswrong'] = 'The cycle for ticket-resets has to be "daily", "weekly", "monthly" or "yearly".';

// ADDED IN 1.2.19-svn4

$lng['menue']['traffic']['traffic'] = 'Traffic';
$lng['menue']['traffic']['current'] = 'Current Month';
$lng['traffic']['month'] = "Month";
$lng['traffic']['day'] = "Day";
$lng['traffic']['months'][1] = "January";
$lng['traffic']['months'][2] = "February";
$lng['traffic']['months'][3] = "March";
$lng['traffic']['months'][4] = "April";
$lng['traffic']['months'][5] = "May";
$lng['traffic']['months'][6] = "June";
$lng['traffic']['months'][7] = "July";
$lng['traffic']['months'][8] = "August";
$lng['traffic']['months'][9] = "September";
$lng['traffic']['months'][10] = "October";
$lng['traffic']['months'][11] = "November";
$lng['traffic']['months'][12] = "December";
$lng['traffic']['mb'] = "Traffic (MiB)";
$lng['traffic']['distribution'] = '<font color="#019522">FTP</font> | <font color="#0000FF">HTTP</font> | <font color="#800000">Mail</font>';
$lng['traffic']['sumhttp'] = 'Total HTTP-Traffic';
$lng['traffic']['sumftp'] = 'Total FTP-Traffic';
$lng['traffic']['summail'] = 'Total Mail-Traffic';

// ADDED IN 1.2.19-svn4.5

$lng['serversettings']['no_robots']['title'] = 'Allow searchengine-robots to index your Froxlor installation';

// ADDED IN 1.2.19-svn6

$lng['admin']['loggersettings'] = 'Log settings';
$lng['serversettings']['logger']['enable'] = 'Logging enabled/disabled';
$lng['serversettings']['logger']['severity'] = 'Logging level';
$lng['admin']['logger']['normal'] = 'normal';
$lng['admin']['logger']['paranoid'] = 'paranoid';
$lng['serversettings']['logger']['types']['title'] = 'Log-type(s)';
$lng['serversettings']['logger']['types']['description'] = 'Specify logtypes. To select multiple types, hold down CTRL while selecting.<br />Available logtypes are: syslog, file, mysql';
$lng['serversettings']['logger']['logfile'] = 'Logfile path including filename';
$lng['error']['logerror'] = 'Log-Error: %s';
$lng['serversettings']['logger']['logcron'] = 'Log cronjobs';
$lng['serversettings']['logger']['logcronoption']['never'] = 'Never';
$lng['serversettings']['logger']['logcronoption']['once'] = 'Once';
$lng['serversettings']['logger']['logcronoption']['always'] = 'Always';
$lng['question']['logger_reallytruncate'] = 'Do you really want to truncate the table "%s"?';
$lng['admin']['loggersystem'] = 'System log';
$lng['logger']['date'] = 'Date';
$lng['logger']['type'] = 'Type';
$lng['logger']['action'] = 'Action';
$lng['logger']['user'] = 'User';
$lng['logger']['truncate'] = 'Empty log';

// ADDED IN 1.2.19-svn7

$lng['serversettings']['ssl']['use_ssl']['title'] = 'Enable SSL usage';
$lng['serversettings']['ssl']['use_ssl']['description'] = 'Check this if you want to use SSL for your webserver';
$lng['serversettings']['ssl']['ssl_cert_file']['title'] = 'Path to the SSL certificate';
$lng['serversettings']['ssl']['ssl_cert_file']['description'] = 'Specify the path including the filename of the .crt or .pem file (main certificate)';
$lng['serversettings']['ssl']['openssl_cnf'] = 'Defaults for creating the Cert file';
$lng['panel']['reseller'] = 'reseller';
$lng['panel']['admin'] = 'admin';
$lng['panel']['customer'] = 'customer/s';
$lng['error']['nomessagetosend'] = 'You did not enter a message.';
$lng['error']['noreceipientsgiven'] = 'You did not specify any receipient';
$lng['admin']['emaildomain'] = 'Emaildomain';
$lng['admin']['email_only'] = 'Only email?';
$lng['admin']['wwwserveralias'] = 'Add a "www." ServerAlias';
$lng['admin']['ipsandports']['enable_ssl'] = 'Is this an SSL Port?';
$lng['admin']['ipsandports']['ssl_cert_file'] = 'Path to the SSL Certificate';
$lng['panel']['send'] = 'send';
$lng['admin']['subject'] = 'Subject';
$lng['admin']['receipient'] = 'Recipient';
$lng['admin']['message'] = 'Write a Message';
$lng['admin']['text'] = 'Message';
$lng['menu']['message'] = 'Messages';
$lng['error']['errorsendingmail'] = 'The message to "%s" failed';
$lng['error']['cannotreaddir'] = 'Unable to read directory "%s"';
$lng['message']['success'] = 'Successfully sent message to %s recipients';
$lng['message']['noreceipients'] = 'No e-mail has been sent because there are no recipients in the database';
$lng['admin']['sslsettings'] = 'SSL settings';
$lng['cronjobs']['notyetrun'] = 'Not yet run';
$lng['serversettings']['default_vhostconf']['title'] = 'Default vHost-settings';
$lng['admin']['specialsettings_replacements'] = "You can use the following variables:<br/><code>{DOMAIN}</code>, <code>{DOCROOT}</code>, <code>{CUSTOMER}</code>, <code>{IP}</code>, <code>{PORT}</code>, <code>{SCHEME}</code><br/>";
$lng['serversettings']['default_vhostconf']['description'] = 'The content of this field will be included into this ip/port vHost container directly. '.$lng['admin']['specialsettings_replacements'].' Attention: The code won\'t be checked for any errors. If it contains errors, webserver might not start again!';
$lng['serversettings']['apache_globaldiropt']['title'] = 'Directory options for customer-prefix';
$lng['serversettings']['apache_globaldiropt']['description'] = 'The content of this field will be included into the 05_froxlor_dirfix_nofcgid.conf apache config. If empty, the default value is used:<br><br>apache >=2.4<br><code>Require all granted<br>AllowOverride All</code><br><br>apache <=2.2<br><code>Order allow,deny<br>allow from all</code>';
$lng['serversettings']['default_vhostconf_domain']['description'] = 'The content of this field will be included into the domain vHost container directly. '.$lng['admin']['specialsettings_replacements'].' Attention: The code won\'t be checked for any errors. If it contains errors, webserver might not start again!';
$lng['error']['invalidip'] = 'Invalid IP address: %s';
$lng['serversettings']['decimal_places'] = 'Number of decimal places in traffic/webspace output';

// ADDED IN 1.2.19-svn8

$lng['admin']['dkimsettings'] = 'DomainKey settings';
$lng['dkim']['dkim_prefix']['title'] = 'Prefix';
$lng['dkim']['dkim_prefix']['description'] = 'Please specify the path to the DKIM RSA-files as well as to the configuration files for the Milter-plugin';
$lng['dkim']['dkim_domains']['title'] = 'Domains filename';
$lng['dkim']['dkim_domains']['description'] = '<em>Filename</em> of the DKIM Domains parameter specified in the dkim-milter configuration';
$lng['dkim']['dkim_dkimkeys']['title'] = 'KeyList filename';
$lng['dkim']['dkim_dkimkeys']['description'] = '<em>Filename</em> of the  DKIM KeyList parameter specified in the dkim-milter configuration';
$lng['dkim']['dkimrestart_command']['title'] = 'Milter restart command';
$lng['dkim']['dkimrestart_command']['description'] = 'Please specify the restart command for the DKIM milter service';

// ADDED IN 1.2.19-svn9

$lng['admin']['caneditphpsettings'] = 'Can change php-related domain settings?';

// ADDED IN 1.2.19-svn12

$lng['admin']['allips'] = 'All IP\'s';
$lng['panel']['nosslipsavailable'] = 'There are currently no ssl ip/port combinations for this server';
$lng['ticket']['by'] = 'by';
$lng['dkim']['use_dkim']['title'] = 'Activate DKIM support?';
$lng['dkim']['use_dkim']['description'] = 'Would you like to use the Domain Keys (DKIM) system?<br/><em class="red">Note: DKIM is only supported using dkim-filter, not opendkim (yet)</em>';
$lng['error']['invalidmysqlhost'] = 'Invalid MySQL host address: %s';
$lng['error']['cannotuseawstatsandwebalizeratonetime'] = 'You cannot enable Webalizer and AWstats at the same time, please chose one of them';
$lng['serversettings']['webalizer_enabled'] = 'Enable webalizer statistics';
$lng['serversettings']['awstats_enabled'] = 'Enable AWstats statistics';
$lng['admin']['awstatssettings'] = 'AWstats settings';

// ADDED IN 1.2.19-svn16

$lng['admin']['domain_dns_settings'] = 'Domain dns settings';
$lng['dns']['destinationip'] = 'Domain IP(s)';
$lng['dns']['standardip'] = 'Server standard IP';
$lng['dns']['a_record'] = 'A-Record (IPv6 optional)';
$lng['dns']['cname_record'] = 'CNAME-Record';
$lng['dns']['mxrecords'] = 'Define MX records';
$lng['dns']['standardmx'] = 'Server tandard MX record';
$lng['dns']['mxconfig'] = 'Custom MX records';
$lng['dns']['priority10'] = 'Priority 10';
$lng['dns']['priority20'] = 'Priority 20';
$lng['dns']['txtrecords'] = 'Define TXT records';
$lng['dns']['txtexample'] = 'Example (SPF-entry):<br />v=spf1 ip4:xxx.xxx.xx.0/23 -all';
$lng['serversettings']['selfdns']['title'] = 'Customer domain dns settings';
$lng['serversettings']['selfdnscustomer']['title'] = 'Allow customers to edit domain dns settings';
$lng['admin']['activated'] = 'Activated';
$lng['admin']['statisticsettings'] = 'Statistic settings';
$lng['admin']['or'] = 'or';

// ADDED IN 1.2.19-svn17

$lng['serversettings']['unix_names']['title'] = 'Use UNIX compatible usernames';
$lng['serversettings']['unix_names']['description'] = 'Allows you to use <strong>-</strong> and <strong>_</strong> in usernames if <strong>No</strong>';
$lng['error']['cannotwritetologfile'] = 'Cannot open logfile %s for writing';
$lng['admin']['sysload'] = 'System load';
$lng['admin']['noloadavailable'] = 'not available';
$lng['admin']['nouptimeavailable'] = 'not available';
$lng['panel']['backtooverview'] = 'Back to overview';
$lng['admin']['nosubject'] = '(No Subject)';
$lng['admin']['configfiles']['statistics'] = 'Statistics';
$lng['login']['forgotpwd'] = 'Forgot your password?';
$lng['login']['presend'] = 'Reset password';
$lng['login']['email'] = 'E-mail address';
$lng['login']['remind'] = 'Reset my password';
$lng['login']['usernotfound'] = 'User not found!';
$lng['mails']['password_reset']['subject'] = 'Password reset';
$lng['mails']['password_reset']['mailbody'] = 'Hello {SALUTATION},\n\nhere is your link for setting a new password. This link is valid for the next 24 hours.\n\n{LINK}\n\nThank you,\nyour administrator';
$lng['pwdreminder']['success'] = 'Password reset successfully requested. Please follow the instructions in the email you received.';

// ADDED IN 1.2.19-svn18

$lng['serversettings']['allow_password_reset']['title'] = 'Allow password reset by customers';
$lng['pwdreminder']['notallowed'] = 'Password reset is disabled';

// ADDED IN 1.2.19-svn21

$lng['customer']['title'] = 'Title';
$lng['customer']['country'] = 'Country';
$lng['panel']['dateformat'] = 'YYYY-MM-DD';
$lng['panel']['dateformat_function'] = 'Y-m-d';

// Y = Year, m = Month, d = Day

$lng['panel']['timeformat_function'] = 'H:i:s';

// H = Hour, i = Minute, s = Second

$lng['panel']['default'] = 'Default';
$lng['panel']['never'] = 'Never';
$lng['panel']['active'] = 'Active';
$lng['panel']['please_choose'] = 'Please choose';
$lng['panel']['allow_modifications'] = 'Allow modifications';
$lng['domains']['add_date'] = 'Added to Froxlor';
$lng['domains']['registration_date'] = 'Added at registry';
$lng['domains']['topleveldomain'] = 'Top-Level-Domain';

// ADDED IN 1.2.19-svn22

$lng['serversettings']['allow_password_reset']['description'] = 'Customers can reset their password and an activation link will be sent to their e-mail address';
$lng['serversettings']['allow_password_reset_admin']['title'] = 'Allow password reset by admins';
$lng['serversettings']['allow_password_reset_admin']['description'] = 'Admins/reseller can reset their password and an activation link will be sent to their e-mail address';

// ADDED IN 1.2.19-svn25

$lng['emails']['quota'] = 'Quota';
$lng['emails']['noquota'] = 'No quota';
$lng['emails']['updatequota'] = 'Update Quota';
$lng['serversettings']['mail_quota']['title'] = 'Mailbox-quota';
$lng['serversettings']['mail_quota']['description'] = 'The default quota for a new created mailboxes (MegaByte).';
$lng['serversettings']['mail_quota_enabled']['title'] = 'Use mailbox-quota for customers';
$lng['serversettings']['mail_quota_enabled']['description'] = 'Activate to use quotas on mailboxes. Default is <b>No</b> since this requires a special setup.';
$lng['serversettings']['mail_quota_enabled']['removelink'] = 'Click here to wipe all quotas for mail accounts.';
$lng['serversettings']['mail_quota_enabled']['enforcelink'] = 'Click here to enforce default quota to all User mail accounts.';
$lng['question']['admin_quotas_reallywipe'] = 'Do you really want to wipe all quotas on table mail_users? This cannot be reverted!';
$lng['question']['admin_quotas_reallyenforce'] = 'Do you really want to enforce the default quota to all Users? This cannot be reverted!';
$lng['error']['vmailquotawrong'] = 'The quotasize must be positive number.';
$lng['customer']['email_quota'] = 'E-mail quota (MiB)';
$lng['customer']['email_imap'] = 'E-mail IMAP';
$lng['customer']['email_pop3'] = 'E-mail POP3';
$lng['customer']['mail_quota'] = 'Mailquota';
$lng['panel']['megabyte'] = 'MegaByte';
$lng['panel']['not_supported'] = 'Not supported in: ';
$lng['emails']['quota_edit'] = 'Change E-Mail Quota';
$lng['error']['allocatetoomuchquota'] = 'You tried to allocate %s MB Quota, but you do not have enough left.';

$lng['error']['missingfields'] = 'Not all required fields were filled out.';
$lng['error']['accountnotexisting'] = 'The given email account doesn\'t exist.';
$lng['admin']['security_settings'] = 'Security Options';
$lng['admin']['know_what_youre_doing'] = 'Change only, if you know what you\'re doing!';
$lng['admin']['show_version_login']['title'] = 'Show Froxlor version on login';
$lng['admin']['show_version_login']['description'] = 'Show the Froxlor version in the footer on the login page';
$lng['admin']['show_version_footer']['title'] = 'Show Froxlor version in footer';
$lng['admin']['show_version_footer']['description'] = 'Show the Froxlor version in the footer on the rest of the pages';
$lng['admin']['froxlor_graphic']['title'] = 'Header graphic for Froxlor';
$lng['admin']['froxlor_graphic']['description'] = 'What graphic should be shown in the header';

//improved froxlor

$lng['menue']['phpsettings']['maintitle'] = 'PHP Configurations';
$lng['admin']['phpsettings']['title'] = 'PHP Configuration';
$lng['admin']['phpsettings']['description'] = 'Short description';
$lng['admin']['phpsettings']['actions'] = 'Actions';
$lng['admin']['phpsettings']['activedomains'] = 'In use for domain(s)';
$lng['admin']['phpsettings']['notused'] = 'Configuration not in use';
$lng['admin']['misc'] = 'Miscellaneous';
$lng['admin']['phpsettings']['editsettings'] = 'Change PHP settings';
$lng['admin']['phpsettings']['addsettings'] = 'Create new PHP settings';
$lng['admin']['phpsettings']['viewsettings'] = 'View PHP settings';
$lng['admin']['phpsettings']['phpinisettings'] = 'php.ini settings';
$lng['error']['nopermissionsorinvalidid'] = 'You don\'t have enough permissions to change these settings or an invalid id was given.';
$lng['panel']['view'] = 'view';
$lng['question']['phpsetting_reallydelete'] = 'Do you really want to delete these settings? All domains which use these settings currently will be changed to the default config.';
$lng['admin']['phpsettings']['addnew'] = 'Create new settings';
$lng['error']['phpsettingidwrong'] = 'A PHP Configuration with this id doesn\'t exist';
$lng['error']['descriptioninvalid'] = 'The description is too short, too long or contains illegal characters.';
$lng['error']['info'] = 'Info';
$lng['admin']['phpconfig']['template_replace_vars'] = 'Variables that will be replaced in the configs';
$lng['admin']['phpconfig']['pear_dir'] = 'Will be replaced with the global setting for the pear directory.';
$lng['admin']['phpconfig']['open_basedir_c'] = 'Will insert a ; (semicolon) to comment-out/disable open_basedir when set';
$lng['admin']['phpconfig']['open_basedir'] = 'Will be replaced with the open_basedir setting of the domain.';
$lng['admin']['phpconfig']['tmp_dir'] = 'Will be replaced with the temporary directory of the domain.';
$lng['admin']['phpconfig']['open_basedir_global'] = 'Will be replaced with the global value of the path which will be attached to the open_basedir.';
$lng['admin']['phpconfig']['customer_email'] = 'Will be replaced with the e-mail address of the customer who owns this domain.';
$lng['admin']['phpconfig']['admin_email'] = 'Will be replaced with e-mail address of the admin who owns this domain.';
$lng['admin']['phpconfig']['domain'] = 'Will be replaced with the domain.';
$lng['admin']['phpconfig']['customer'] = 'Will be replaced with the loginname of the customer who owns this domain.';
$lng['admin']['phpconfig']['admin'] = 'Will be replaced with the loginname of the admin who owns this domain.';
$lng['admin']['phpconfig']['docroot'] = 'Will be replaces with the customer\'s document-root.';
$lng['login']['backtologin'] = 'Back to login';
$lng['serversettings']['mod_fcgid']['starter']['title'] = 'Processes per domain';
$lng['serversettings']['mod_fcgid']['starter']['description'] = 'How many processes should be started/allowed per domain? The value 0 is recommended cause PHP will then manage the amount of processes itself very efficiently.';
$lng['serversettings']['mod_fcgid']['wrapper']['title'] = 'Wrapper in Vhosts';
$lng['serversettings']['mod_fcgid']['wrapper']['description'] = 'How should the wrapper be included in the Vhosts';
$lng['serversettings']['mod_fcgid']['tmpdir']['description'] = 'Where should the temp directories be stored';
$lng['serversettings']['mod_fcgid']['peardir']['title'] = 'Global PEAR directories';
$lng['serversettings']['mod_fcgid']['peardir']['description'] = 'Which global PEAR directories should be replaced in every php.ini config? Different directories must be separated by a colon.';

//improved Froxlor  2

$lng['admin']['templates']['index_html'] = 'index file for newly created customer directories';
$lng['admin']['templates']['SERVERNAME'] = 'Replaced with the servername.';
$lng['admin']['templates']['CUSTOMER'] = 'Replaced with the loginname of the customer.';
$lng['admin']['templates']['ADMIN'] = 'Replaced with the loginname of the admin.';
$lng['admin']['templates']['CUSTOMER_EMAIL'] = 'Replaced with the e-mail address of the customer.';
$lng['admin']['templates']['ADMIN_EMAIL'] = 'Replaced with the e-mail address of the admin.';
$lng['admin']['templates']['filetemplates'] = 'File templates';
$lng['admin']['templates']['filecontent'] = 'File content';
$lng['error']['filecontentnotset'] = 'The file cannot be empty!';
$lng['serversettings']['index_file_extension']['description'] = 'Which file extension should be used for the index file in newly created customer directories? This file extension will be used, if you or one of your admins has created its own index file template.';
$lng['serversettings']['index_file_extension']['title'] = 'File extension for index file in newly created customer directories';
$lng['error']['index_file_extension'] = 'The file extension for the index file must be between 1 and 6 characters long. The extension can only contain characters like a-z, A-Z and 0-9';
$lng['admin']['expert_settings'] = 'Expert settings!';
$lng['admin']['mod_fcgid_starter']['title'] = 'PHP Processes for this domain (empty for default value)';

$lng['error']['customerdoesntexist'] = 'The customer you have chosen doesn\'t exist.';
$lng['error']['admindoesntexist'] = 'The admin you have chosen doesn\'t exist.';

// ADDED IN 1.2.19-svn37

$lng['serversettings']['session_allow_multiple_login']['title'] = 'Allow multiple login';
$lng['serversettings']['session_allow_multiple_login']['description'] = 'If activated a user could login multiple times.';
$lng['serversettings']['panel_allow_domain_change_admin']['title'] = 'Allow moving domains between admins';
$lng['serversettings']['panel_allow_domain_change_admin']['description'] = 'If activated you can change the admin of a domain at domainsettings.<br /><b>Attention:</b> If a customer isn\'t assigned to the same admin as the domain, the admin can see every other domain of that customer!';
$lng['serversettings']['panel_allow_domain_change_customer']['title'] = 'Allow moving domains between customers';
$lng['serversettings']['panel_allow_domain_change_customer']['description'] = 'If activated you can change the customer of a domain at domainsettings.<br /><b>Attention:</b> Froxlor won\'t change any paths. This could render a domain unusable!';
$lng['domains']['associated_with_domain'] = 'Associated';
$lng['domains']['aliasdomains'] = 'Alias domains';
$lng['error']['ipportdoesntexist'] = 'The ip/port combination you have chosen doesn\'t exist.';

// ADDED IN 1.2.19-svn38

$lng['admin']['phpserversettings'] = 'PHP Settings';
$lng['admin']['phpsettings']['binary'] = 'PHP Binary';
$lng['admin']['phpsettings']['file_extensions'] = 'File extensions';
$lng['admin']['phpsettings']['file_extensions_note'] = '(without dot, separated by spaces)';
$lng['admin']['mod_fcgid_maxrequests']['title'] = 'Maximum php requests for this domain (empty for default value)';
$lng['serversettings']['mod_fcgid']['maxrequests']['title'] = 'Maximum Requests per domain';
$lng['serversettings']['mod_fcgid']['maxrequests']['description'] = 'How many requests should be allowed per domain?';

// ADDED IN 1.4.2.1-1

$lng['mysql']['mysql_server'] = 'MySQL-Server';

// ADDED IN 1.4.2.1-2

$lng['admin']['ipsandports']['webserverdefaultconfig'] = 'Webserver default config';
$lng['admin']['ipsandports']['webserverdomainconfig'] = 'Webserver domain config';
$lng['admin']['ipsandports']['webserverssldomainconfig'] = 'Webserver SSL config';
$lng['admin']['ipsandports']['ssl_key_file'] = 'Path to the SSL Keyfile';
$lng['admin']['ipsandports']['ssl_ca_file'] = 'Path to the SSL CA certificate';
$lng['admin']['ipsandports']['default_vhostconf_domain'] = 'Default vHost-settings for every domain container';
$lng['serversettings']['ssl']['ssl_key_file']['title'] = 'Path to the SSL Keyfile';
$lng['serversettings']['ssl']['ssl_key_file']['description'] = 'Specify the path including the filename for the private-key file (.key mostly)';
$lng['serversettings']['ssl']['ssl_ca_file']['title'] = 'Path to the SSL CA certificate (optional)';
$lng['serversettings']['ssl']['ssl_ca_file']['description'] = 'Client authentification, set this only if you know what it is.';

$lng['error']['usernamealreadyexists'] = 'The username %s already exists.';

$lng['error']['plausibilitychecknotunderstood'] = 'Answer of plausibility check not understood.';
$lng['error']['errorwhensaving'] = 'An error occurred when saving the field %s';

$lng['success']['success'] = 'Information';
$lng['success']['clickheretocontinue'] = 'Click here to continue';
$lng['success']['settingssaved'] = 'The settings have been successfully saved.';

// ADDED IN FROXLOR 0.9

$lng['admin']['spfsettings'] = 'Domain SPF settings';
$lng['spf']['use_spf'] = 'Activate SPF for domains?';
$lng['spf']['spf_entry'] = 'SPF entry for all domains';
$lng['panel']['toomanydirs'] = 'Too many subdirectories. Falling back to manual path-select.';
$lng['panel']['abort'] = 'Abort';
$lng['serversettings']['cron']['debug']['title'] = 'Cronscript debugging';
$lng['serversettings']['cron']['debug']['description'] = 'Activate to keep the lockfile after a cron-run for debugging.<br /><b>Attention:</b>Keeping the lockfile can cause the next scheduled cron not to run properly.';
$lng['panel']['not_activated'] = 'not activated';
$lng['panel']['off'] = 'off';
$lng['update']['updateinprogress_onlyadmincanlogin'] = 'A newer version of Froxlor has been installed but not yet set up.<br />Only the administrator can log in and finish the update.';
$lng['update']['update'] = 'Froxlor update';
$lng['update']['proceed'] = 'Proceed';
$lng['update']['update_information']['part_a'] = 'The Froxlor files have been updated to version <strong>%newversion</strong>. The installed version is <strong>%curversion</strong>.';
$lng['update']['update_information']['part_b'] = '<br /><br />Customers will not be able to log in until the update has been finished.<br /><strong>Proceed?</strong>';
$lng['update']['noupdatesavail'] = '<strong>You already have the latest Froxlor version.</strong>';
$lng['admin']['specialsettingsforsubdomains'] = 'Apply specialsettings to all subdomains (*.example.com)';
$lng['serversettings']['specialsettingsforsubdomains']['description'] = 'If yes these custom vHost-settings will be added to all subdomains; if no subdomain-specialsettings are being removed.';
$lng['tasks']['outstanding_tasks'] = 'Outstanding cron-tasks';
$lng['tasks']['rebuild_webserverconfig'] = 'Rebuilding webserver-configuration';
$lng['tasks']['adding_customer'] = 'Adding new customer %loginname%';
$lng['tasks']['rebuild_bindconfig'] = 'Rebuilding bind-configuration';
$lng['tasks']['creating_ftpdir'] = 'Creating directory for new ftp-user';
$lng['tasks']['deleting_customerfiles'] = 'Deleting customer-files %loginname%';
$lng['tasks']['noneoutstanding'] = 'There are currently no outstanding tasks for Froxlor';
$lng['ticket']['nonexistingcustomer'] = '(deleted customer)';
$lng['admin']['ticket_nocustomeraddingavailable'] = 'It\'s not possible to open a new support-ticket currently. You first need to add at least one customer.';

// ADDED IN FROXLOR 0.9.1

$lng['admin']['accountdata'] = 'Account Data';
$lng['admin']['contactdata'] = 'Contact Data';
$lng['admin']['servicedata'] = 'Service Data';

// ADDED IN FROXLOR 0.9.2

$lng['admin']['newerversionavailable'] = 'There is a newer version of Froxlor available';

// ADDED IN FROXLOR 0.9.3

$lng['emails']['noemaildomainaddedyet'] = 'You do not have a (email-)domain in your account yet.';
$lng['error']['hiddenfieldvaluechanged'] = 'The value for the hidden field "%s" changed while editing the settings.<br /><br />This is usually not a big problem but the settings could not be saved because of this.';

// ADDED IN FROXLOR 0.9.3-svn1

$lng['serversettings']['panel_password_min_length']['title'] = 'Minimum password length';
$lng['serversettings']['panel_password_min_length']['description'] = 'Here you can set a minimum length for passwords. \'0\' means: no minimum length required.';
$lng['error']['notrequiredpasswordlength'] = 'The given password is too short. Please enter at least %s characters.';
$lng['serversettings']['system_store_index_file_subs']['title'] = 'Store default index file also to new subfolders';
$lng['serversettings']['system_store_index_file_subs']['description'] = 'If enabled, the default index-file is being stored to every subdomain-path newly created (not if the folder already exists!)';

// ADDED IN FROXLOR 0.9.3-svn2

$lng['serversettings']['adminmail_return']['title'] = 'Reply-To address';
$lng['serversettings']['adminmail_return']['description'] = 'Define an e-mail address as reply-to-address for mails sent by the panel.';
$lng['serversettings']['adminmail_defname'] = 'Panel e-mail sender name';

// ADDED IN FROXLOR 0.9.3-svn3
$lng['dkim']['dkim_algorithm']['title'] = 'Allowed Hash Algorithms';
$lng['dkim']['dkim_algorithm']['description'] = 'Define allowed hash algorithms, chose "All" for all algorithms or one or more from the other available algorithms';
$lng['dkim']['dkim_servicetype'] = 'Service Types';
$lng['dkim']['dkim_keylength']['title'] = 'Key-length';
$lng['dkim']['dkim_keylength']['description'] = 'Attention: If you change this values, you need to delete all the private/public keys in "%s"';
$lng['dkim']['dkim_notes']['title'] = 'DKIM Notes';
$lng['dkim']['dkim_notes']['description'] = 'Notes that might be of interest to a human, e.g. a URL like http://www.dnswatch.info. No interpretation is made by any program. This tag should be used sparingly due to space limitations in DNS. This is intended for use by administrators, not end users.';
$lng['dkim']['dkim_add_adsp']['title'] = 'Add DKIM ADSP entry';
$lng['dkim']['dkim_add_adsp']['description'] = 'If you don\'t know what this is, leave it "enabled"';
$lng['dkim']['dkim_add_adsppolicy']['title'] = 'ADSP policy';
$lng['dkim']['dkim_add_adsppolicy']['description'] = 'For more information about this setting see <a target="blank" href="http://redmine.froxlor.org/projects/froxlor/wiki/En-dkim-adsp-policies">DKIM ADSP policies</a>';

$lng['admin']['cron']['cronsettings'] = 'Cronjob settings';
$lng['cron']['cronname'] = 'cronjob-name';
$lng['cron']['lastrun'] = 'last run';
$lng['cron']['interval'] = 'interval';
$lng['cron']['isactive'] = 'enabled';
$lng['cron']['description'] = 'description';
$lng['crondesc']['cron_unknown_desc'] = 'no description given';
$lng['admin']['cron']['add'] = 'Add cronjob';
$lng['crondesc']['cron_tasks'] = 'generating of configfiles';
$lng['crondesc']['cron_legacy'] = 'legacy (old) cronjob';
$lng['crondesc']['cron_traffic'] = 'traffic calculation';
$lng['crondesc']['cron_ticketsreset'] = 'resetting ticket-counters';
$lng['crondesc']['cron_ticketarchive'] = 'archiving old tickets';
$lng['cronmgmt']['minutes'] = 'minutes';
$lng['cronmgmt']['hours'] = 'hours';
$lng['cronmgmt']['days'] = 'days';
$lng['cronmgmt']['weeks'] = 'weeks';
$lng['cronmgmt']['months'] = 'months';
$lng['admin']['cronjob_edit'] = 'Edit cronjob';
$lng['cronjob']['cronjobsettings'] = 'Cronjob settings';
$lng['cronjob']['cronjobintervalv'] = 'Runtime interval value';
$lng['cronjob']['cronjobinterval'] = 'Runtime interval';
$lng['panel']['options'] = 'Options';
$lng['admin']['warning'] = 'WARNING - Please note!';
$lng['cron']['changewarning'] = 'Changing these values can have a negative cause to the behavior of Froxlor and its automated tasks.<br /><br />Please only change values here, if you are sure you know what you are doing.';

$lng['serversettings']['stdsubdomainhost']['title'] = 'Customer standard subdomain';
$lng['serversettings']['stdsubdomainhost']['description'] = 'What hostname should be used to create standard subdomains for customer. If empty, the system-hostname is used.';

// ADDED IN FROXLOR 0.9.4-svn1
$lng['ftp']['account_edit'] = 'Edit ftp account';
$lng['ftp']['editpassdescription'] = 'Set new password or leave blank for no change.';
$lng['customer']['sendinfomail'] = 'Send data via email to me';
$lng['mails']['new_database_by_customer']['subject'] = '[Froxlor] New database created';
$lng['mails']['new_database_by_customer']['mailbody'] = "Hello {CUST_NAME},\n\nyou have just added a new database. Here is the entered information:\n\nDatabasename: {DB_NAME}\nPassword: {DB_PASS}\nDescription: {DB_DESC}\nDB-Hostname: {DB_SRV}\nphpMyAdmin: {PMA_URI}\nYours sincerely, your administrator";
$lng['serversettings']['awstats_path'] = 'Path to AWStats \'awstats_buildstaticpages.pl\'';
$lng['serversettings']['awstats_conf'] = 'AWStats configuration path';
$lng['error']['overviewsettingoptionisnotavalidfield'] = 'Woops, a field that should be displayed as an option in the settings-overview is not an excepted type. You can blame the developers for this. This should not happen!';
$lng['admin']['configfiles']['compactoverview'] = 'Compact-overview';
$lng['admin']['lastlogin_succ'] = 'Last login';
$lng['panel']['neverloggedin'] = 'No login yet';

// ADDED IN FROXLOR 0.9.6-svn1
$lng['serversettings']['defaultttl'] = 'Domain TTL for bind in seconds (default \'604800\' = 1 week)';
$lng['ticket']['logicalorder'] = 'Logical order';
$lng['ticket']['orderdesc'] = 'Here you can define your own logical order for the ticket-category. Use 1 - 999, lower numbers are displayed first.';

// ADDED IN FROXLOR 0.9.6-svn3
$lng['serversettings']['defaultwebsrverrhandler_enabled'] = 'Enable default errordocuments for all customers';
$lng['serversettings']['defaultwebsrverrhandler_err401']['title'] = 'File/URL for error 401';
$lng['serversettings']['defaultwebsrverrhandler_err401']['description'] = '<div class="red">Not supported in: lighttpd</div>';
$lng['serversettings']['defaultwebsrverrhandler_err403']['title'] = 'File/URL for error 403';
$lng['serversettings']['defaultwebsrverrhandler_err403']['description'] = '<div class="red">Not supported in: lighttpd</div>';
$lng['serversettings']['defaultwebsrverrhandler_err404'] = 'File/URL for error 404';
$lng['serversettings']['defaultwebsrverrhandler_err500']['title'] = 'File/URL for error 500';
$lng['serversettings']['defaultwebsrverrhandler_err500']['description'] = '<div class="red">Not supported in: lighttpd</div>';

// ADDED IN FROXLOR 0.9.6-svn4
$lng['serversettings']['ticket']['default_priority'] = 'Default support-ticket priority';

// ADDED IN FROXLOR 0.9.6-svn5
$lng['serversettings']['mod_fcgid']['defaultini'] = 'Default PHP configuration for new domains';

// ADDED IN FROXLOR 0.9.6-svn6
$lng['admin']['ftpserver'] = 'FTP Server';
$lng['admin']['ftpserversettings'] = 'FTP Server settings';
$lng['serversettings']['ftpserver']['desc'] = 'If pureftpd is selected the .ftpquota files for user quotas are created and updated daily';

// ADDED IN FROXLOR 0.9.7-svn1
$lng['mails']['new_ftpaccount_by_customer']['subject'] = 'New ftp-user created';
$lng['mails']['new_ftpaccount_by_customer']['mailbody'] = "Hello {CUST_NAME},\n\nyou have just added a new ftp-user. Here is the entered information:\n\nUsername: {USR_NAME}\nPassword: {USR_PASS}\nPath: {USR_PATH}\n\nYours sincerely, your administrator";
$lng['domains']['redirectifpathisurl'] = 'Redirect code (default: empty)';
$lng['domains']['redirectifpathisurlinfo'] = 'You only need to select one of these if you entered an URL as path<br/><strong class="red">NOTE:</strong>Changes are only applied if the given path is an URL.';
$lng['serversettings']['customredirect_enabled']['title'] = 'Allow customer redirects';
$lng['serversettings']['customredirect_enabled']['description'] = 'Allow customers to choose the http-status code for redirects which will be used';
$lng['serversettings']['customredirect_default']['title'] = 'Default redirect';
$lng['serversettings']['customredirect_default']['description'] = 'Set the default redirect-code which should be used if the customer does not set it himself';

// ADDED IN FROXLOR 0.9.7-svn2
$lng['error']['pathmaynotcontaincolon'] = 'The path you have entered should not contain a colon (":"). Please enter a correct path value.';

// ADDED IN FROXLOR 0.9.7-svn3

// these stay only in english.lng.php - they are the same
// for all other languages and are used if not found there
$lng['redirect_desc']['rc_default'] = 'default';
$lng['redirect_desc']['rc_movedperm'] = 'moved permanently';
$lng['redirect_desc']['rc_found'] = 'found';
$lng['redirect_desc']['rc_seeother'] = 'see other';
$lng['redirect_desc']['rc_tempred'] = 'temporary redirect';

// ADDED IN FROXLOR 0.9.8
$lng['error']['exception'] = '%s';

// ADDED IN FROXLOR 0.9.9-svn1
$lng['serversettings']['mail_also_with_mxservers'] = 'Create mail-, imap-, pop3- and smtp-"A record" also with MX-Servers set';

// ADDED IN FROXLOR 0.9.10-svn1
$lng['admin']['webserver_user'] = 'Webserver user-name';
$lng['admin']['webserver_group'] = 'Webserver group-name';

// ADDED IN FROXLOR 0.9.10
$lng['serversettings']['froxlordirectlyviahostname'] = 'Access Froxlor directly via the hostname';

// ADDED IN FROXLOR 0.9.11-svn1
$lng['serversettings']['panel_password_regex']['title'] = 'Regular expression for passwords';
$lng['serversettings']['panel_password_regex']['description'] = 'Here you can set a regular expression for passwords-complexity.<br />Empty = no specific requirement';
$lng['error']['notrequiredpasswordcomplexity'] = 'The specified password-complexity was not satisfied.<br />Please contact your administrator if you have any questions about the complexity-specification';

// ADDED IN FROXLOR 0.9.11-svn2
$lng['extras']['execute_perl'] = 'Execute perl/CGI';
$lng['admin']['perlenabled'] = 'Perl enabled';

// ADDED IN FROXLOR 0.9.11-svn3
$lng['serversettings']['perl_path']['title'] = 'Path to perl';
$lng['serversettings']['perl_path']['description'] = 'Default is /usr/bin/perl';

// ADDED IN FROXLOR 0.9.12-svn1
$lng['admin']['fcgid_settings'] = 'FCGID';
$lng['serversettings']['mod_fcgid_ownvhost']['title'] = 'Enable FCGID for the Froxlor vHost';
$lng['serversettings']['mod_fcgid_ownvhost']['description'] = 'If enabled, Froxlor will also be running under a local user';
$lng['admin']['mod_fcgid_user'] = 'Local user to use for FCGID (Froxlor vHost)';
$lng['admin']['mod_fcgid_group'] = 'Local group to use for FCGID (Froxlor vHost)';

// ADDED IN FROXLOR 0.9.12-svn2
$lng['admin']['perl_settings'] = 'Perl/CGI';
$lng['serversettings']['perl']['suexecworkaround']['title'] = 'Enable SuExec workaround';
$lng['serversettings']['perl']['suexecworkaround']['description'] = 'Enable only if customer docroots are not within the apache suexec path.<br />If enabled, Froxlor will generate a symlink from the customers perl-enabled directory + /cgi-bin/ to the given path.<br />Note that perl will then only work in the folders subdirectory /cgi-bin/ and not in the folder itself (as it does without this fix!)';
$lng['serversettings']['perl']['suexeccgipath']['title'] = 'Path for customer perl-enabled directory symlinks';
$lng['serversettings']['perl']['suexeccgipath']['description'] = 'You only need to set this if the SuExec-workaround is enabled.<br />ATTENTION: Be sure this path is within the suexec path or else this workaround is uselsess';
$lng['panel']['descriptionerrordocument'] = 'Can be an URL, path to a file or just a string wrapped around " "<br />Leave empty to use server default value.';
$lng['error']['stringerrordocumentnotvalidforlighty'] = 'A string as ErrorDocument does not work in lighttpd, please specify a path to a file';
$lng['error']['urlerrordocumentnotvalidforlighty'] = 'An URL as ErrorDocument does not work in lighttpd, please specify a path to a file';

// ADDED IN FROXLOR 0.9.12-svn3
$lng['question']['remove_subbutmain_domains'] = 'Also remove domains which are added as full domains but which are subdomains of this domain?';
$lng['domains']['issubof'] = 'This domain is a subdomain of another domain';
$lng['domains']['issubofinfo'] = 'You have to set this to the correct domain if you want to add a subdomain as full-domain (e.g. you want to add "www.domain.tld", you have to select "domain.tld" here)';
$lng['domains']['nosubtomaindomain'] = 'No subdomain of a full domain';
$lng['admin']['templates']['new_database_by_customer'] = 'Customer-notification when a database has been created';
$lng['admin']['templates']['new_ftpaccount_by_customer'] = 'Customer-notification when a ftp-user has been created';
$lng['admin']['templates']['newdatabase'] = 'Notification-mails for new databases';
$lng['admin']['templates']['newftpuser'] = 'Notification-mails for new ftp-user';
$lng['admin']['templates']['CUST_NAME'] = 'Customer name';
$lng['admin']['templates']['DB_NAME'] = 'Database name';
$lng['admin']['templates']['DB_PASS'] = 'Database password';
$lng['admin']['templates']['DB_DESC'] = 'Database description';
$lng['admin']['templates']['DB_SRV'] = 'Database server';
$lng['admin']['templates']['PMA_URI'] = 'URL to phpMyAdmin (if given)';
$lng['admin']['notgiven'] = '[not given]';
$lng['admin']['templates']['USR_NAME'] = 'FTP username';
$lng['admin']['templates']['USR_PASS'] = 'FTP password';
$lng['admin']['templates']['USR_PATH'] = 'FTP homedir (relative to customer-docroot)';

// ADDED IN FROXLOR 0.9.12-svn4
$lng['serversettings']['awstats_awstatspath'] = 'Path to AWStats \'awstats.pl\'';

// ADDED IN FROXLOR 0.9.12-svn6
$lng['extras']['htpasswdauthname'] = 'Authentication reason (AuthName)';
$lng['extras']['directoryprotection_edit'] = 'edit directory protection';
$lng['admin']['templates']['forgotpwd'] = 'Notification-mails for password-reset';
$lng['admin']['templates']['password_reset'] = 'Customer-notification for passwort-reset';
$lng['admin']['store_defaultindex'] = 'Store default index-file to customers docroot';

// ADDED IN FROXLOR 0.9.14
$lng['serversettings']['mod_fcgid']['defaultini_ownvhost'] = 'Default PHP configuration for Froxlor-vHost';
$lng['serversettings']['awstats_icons']['title'] = 'Path to AWstats icons folder';
$lng['serversettings']['awstats_icons']['description'] = 'e.g. /usr/share/awstats/htdocs/icon/';
$lng['admin']['ipsandports']['ssl_cert_chainfile']['title'] = 'Path to the SSL CertificateChainFile';
$lng['admin']['ipsandports']['ssl_cert_chainfile']['description'] = 'Mostly CA_Bundle, or similar, you probably want to set this if you bought a SSL certificate.';
$lng['admin']['ipsandports']['docroot']['title'] = 'Custom docroot (empty = point to Froxlor)';
$lng['admin']['ipsandports']['docroot']['description'] = 'You can define a custom document-root (the destination for a request) for this ip/port combination here.<br /><strong>ATTENTION:</strong> Please be careful with what you enter here!';
$lng['serversettings']['login_domain_login'] = 'Allow login with domains';
$lng['panel']['unlock'] = 'Unlock';
$lng['question']['customer_reallyunlock'] = 'Do you really want to unlock customer %s?';

// ADDED IN FROXLOR 0.9.15
$lng['serversettings']['perl_server']['title'] = 'Perl server location';
$lng['serversettings']['perl_server']['description'] = 'Default is set for using the guide found at: <a target="blank" href="http://wiki.nginx.org/SimpleCGI">http://wiki.nginx.org/SimpleCGI</a>';
$lng['serversettings']['nginx_php_backend']['title'] = 'Nginx PHP backend';
$lng['serversettings']['nginx_php_backend']['description'] = 'this is where the PHP process is listening for requests from nginx, can be a unix socket of ip:port combination<br />*NOT used with php-fpm';
$lng['serversettings']['phpreload_command']['title'] = 'PHP reload command';
$lng['serversettings']['phpreload_command']['description'] = 'this is used to reload the PHP backend if any is used<br />Default: blank<br />*NOT used with php-fpm';

// ADDED IN FROXLOR 0.9.16
$lng['error']['intvaluetoolow'] = 'The given number is too low (field %s)';
$lng['error']['intvaluetoohigh'] = 'The given number is too high (field %s)';
$lng['admin']['phpfpm_settings'] = 'PHP-FPM';
$lng['serversettings']['phpfpm']['title'] = 'Enable php-fpm';
$lng['serversettings']['phpfpm']['description'] = '<b>This needs a special webserver configuration see FPM-handbook for <a target="blank" href="http://redmine.froxlor.org/projects/froxlor/wiki/HandbookApache2_phpfpm">Apache2</a> or <a target="blank" href="http://redmine.froxlor.org/projects/froxlor/wiki/HandbookNginx_phpfpm">nginx</a></b>';
$lng['serversettings']['phpfpm_settings']['configdir'] = 'Configuration directory of php-fpm';
$lng['serversettings']['phpfpm_settings']['aliasconfigdir'] = 'Configuration Alias-directory of php-fpm';
$lng['serversettings']['phpfpm_settings']['reload'] = 'php-fpm restart command';
$lng['serversettings']['phpfpm_settings']['pm'] = 'Process manager control (pm)';
$lng['serversettings']['phpfpm_settings']['max_children']['title'] = 'The number of child processes';
$lng['serversettings']['phpfpm_settings']['max_children']['description'] = 'The number of child processes to be created when pm is set to \'static\' and the maximum number of child processes to be created when pm is set to \'dynamic/ondemand\'<br />Equivalent to the PHP_FCGI_CHILDREN';
$lng['serversettings']['phpfpm_settings']['start_servers']['title'] = 'The number of child processes created on startup';
$lng['serversettings']['phpfpm_settings']['start_servers']['description'] = 'Note: Used only when pm is set to \'dynamic\'';
$lng['serversettings']['phpfpm_settings']['min_spare_servers']['title'] = 'The desired minimum number of idle server processes';
$lng['serversettings']['phpfpm_settings']['min_spare_servers']['description'] = 'Note: Used only when pm is set to \'dynamic\'<br />Note: Mandatory when pm is set to \'dynamic\'';
$lng['serversettings']['phpfpm_settings']['max_spare_servers']['title'] = 'The desired maximum number of idle server processes';
$lng['serversettings']['phpfpm_settings']['max_spare_servers']['description'] = 'Note: Used only when pm is set to \'dynamic\'<br />Note: Mandatory when pm is set to \'dynamic\'';
$lng['serversettings']['phpfpm_settings']['max_requests']['title'] = 'Requests per child before respawning';
$lng['serversettings']['phpfpm_settings']['max_requests']['description'] = 'For endless request processing specify \'0\'. Equivalent to PHP_FCGI_MAX_REQUESTS.';
$lng['error']['phpfpmstillenabled'] = 'PHP-FPM is currently active. Please deactivate it before activating FCGID';
$lng['error']['fcgidstillenabled'] = 'FCGID is currently active. Please deactivate it before activating PHP-FPM';
$lng['phpfpm']['vhost_httpuser'] = 'Local user to use for PHP-FPM (Froxlor vHost)';
$lng['phpfpm']['vhost_httpgroup'] = 'Local group to use for PHP-FPM (Froxlor vHost)';
$lng['phpfpm']['ownvhost']['title'] = 'Enable PHP-FPM for the Froxlor vHost';
$lng['phpfpm']['ownvhost']['description'] = 'If enabled, Froxlor will also be running under a local user';

// ADDED IN FROXLOR 0.9.17
$lng['crondesc']['cron_usage_report'] = 'Web- and traffic-reports';
$lng['serversettings']['report']['report'] = 'Enable sending of reports about web- and traffic-usage';
$lng['serversettings']['report']['webmax']['title'] = 'Warning-level in percent for webspace';
$lng['serversettings']['report']['webmax']['description'] = 'Valid values are 0 up to 150. Setting this value to 0 disables this report.';
$lng['serversettings']['report']['trafficmax']['title'] = 'Warning-level in percent for traffic';
$lng['serversettings']['report']['trafficmax']['description'] = 'Valid values are 0 up to 150. Setting this value to 0 disables this report.';
$lng['mails']['trafficmaxpercent']['mailbody'] = 'Dear {NAME},\n\nyou used {TRAFFICUSED} MB of your available {TRAFFIC} MB of traffic.\nThis is more than {MAX_PERCENT}%.\n\nYours sincerely, your administrator';
$lng['mails']['trafficmaxpercent']['subject'] = 'Reaching your traffic limit';
$lng['admin']['templates']['trafficmaxpercent'] = 'Notification mail for customers when given maximum of percent of traffic is exhausted';
$lng['admin']['templates']['MAX_PERCENT'] = 'Replaced with the diskusage/traffic limit for sending reports in percent.';
$lng['admin']['templates']['USAGE_PERCENT'] = 'Replaced with the diskusage/traffic, which was exhausted by the customer in percent.';
$lng['admin']['templates']['diskmaxpercent'] = 'Notification mail for customers when given maximum of percent of diskspace is exhausted';
$lng['admin']['templates']['DISKAVAILABLE'] = 'Replaced with the diskusage in MB, which was assigned to the customer.';
$lng['admin']['templates']['DISKUSED'] = 'Replaced with the diskusage in MB, which was exhausted by the customer.';
$lng['serversettings']['dropdown'] = 'Dropdown';
$lng['serversettings']['manual'] = 'Manual';
$lng['mails']['diskmaxpercent']['mailbody'] = 'Dear {NAME},\n\nyou used {DISKUSED} MB of your available {DISKAVAILABLE} MB of diskspace.\nThis is more than {MAX_PERCENT}%.\n\nYours sincerely, your administrator';
$lng['mails']['diskmaxpercent']['subject'] = 'Reaching your diskspace limit';
$lng['mysql']['database_edit'] = 'Edit database';

// ADDED IN FROXLOR 0.9.18
$lng['error']['domains_cantdeletedomainwithaliases'] = 'You cannot delete a domain which is used for alias-domains. You have to delete the aliases first.';
$lng['serversettings']['default_theme'] = 'Default theme';
$lng['menue']['main']['changetheme'] = 'Change theme';
$lng['panel']['theme'] = 'Theme';
$lng['success']['rebuildingconfigs'] = 'Successfully inserted tasks for rebuild configfiles';
$lng['panel']['variable'] = 'Variable';
$lng['panel']['description'] = 'Description';
$lng['emails']['back_to_overview'] = 'Back to overview';

// ADDED IN FROXLOR 0.9.20
$lng['error']['user_banned'] = 'Your account has been locked. Please contact your administrator for further information.';
$lng['serversettings']['validate_domain'] = 'Validate domain names';
$lng['login']['combination_not_found'] = 'Combination of user and email address not found.';
$lng['customer']['generated_pwd'] = 'Password suggestion';
$lng['customer']['usedmax'] = 'Used / Max';
$lng['admin']['traffic'] = 'Traffic';
$lng['admin']['domaintraffic'] = 'Domains';
$lng['admin']['customertraffic'] = 'Customers';
$lng['traffic']['customer'] = 'Customer';
$lng['traffic']['domain'] = 'Domain';
$lng['traffic']['trafficoverview'] = 'Traffic summary by';
$lng['traffic']['months']['jan'] = 'Jan';
$lng['traffic']['months']['feb'] = 'Feb';
$lng['traffic']['months']['mar'] = 'Mar';
$lng['traffic']['months']['apr'] = 'Apr';
$lng['traffic']['months']['may'] = 'May';
$lng['traffic']['months']['jun'] = 'Jun';
$lng['traffic']['months']['jul'] = 'Jul';
$lng['traffic']['months']['aug'] = 'Aug';
$lng['traffic']['months']['sep'] = 'Sep';
$lng['traffic']['months']['oct'] = 'Oct';
$lng['traffic']['months']['nov'] = 'Nov';
$lng['traffic']['months']['dec'] = 'Dec';
$lng['traffic']['months']['total'] = 'Total';
$lng['traffic']['details'] = 'Details';
$lng['menue']['traffic']['table'] = 'Traffic';

// ADDED IN FROXLOR 0.9.21
$lng['gender']['title'] = 'Title';
$lng['gender']['male'] = 'Mr.';
$lng['gender']['female'] = 'Mrs.';
$lng['gender']['undef'] = '';

// Country code (ISO-3166-2)
$lng['country']['AF'] = "Afghanistan";
$lng['country']['AX'] = "Aland Islands";
$lng['country']['AL'] = "Albania";
$lng['country']['DZ'] = "Algeria";
$lng['country']['AS'] = "American Samoa";
$lng['country']['AD'] = "Andorra";
$lng['country']['AO'] = "Angola";
$lng['country']['AI'] = "Anguilla";
$lng['country']['AQ'] = "Antarctica";
$lng['country']['AG'] = "Antigua and Barbuda";
$lng['country']['AR'] = "Argentina";
$lng['country']['AM'] = "Armenia";
$lng['country']['AW'] = "Aruba";
$lng['country']['AU'] = "Australia";
$lng['country']['AT'] = "Austria";
$lng['country']['AZ'] = "Azerbaijan";
$lng['country']['BS'] = "Bahamas";
$lng['country']['BH'] = "Bahrain";
$lng['country']['BD'] = "Bangladesh";
$lng['country']['BB'] = "Barbados";
$lng['country']['BY'] = "Belarus";
$lng['country']['BE'] = "Belgium";
$lng['country']['BZ'] = "Belize";
$lng['country']['BJ'] = "Benin";
$lng['country']['BM'] = "Bermuda";
$lng['country']['BT'] = "Bhutan";
$lng['country']['BO'] = "Bolivia, Plurinational State of";
$lng['country']['BQ'] = "Bonaire, Saint Eustatius and Saba";
$lng['country']['BA'] = "Bosnia and Herzegovina";
$lng['country']['BW'] = "Botswana";
$lng['country']['BV'] = "Bouvet Island";
$lng['country']['BR'] = "Brazil";
$lng['country']['IO'] = "British Indian Ocean Territory";
$lng['country']['BN'] = "Brunei Darussalam";
$lng['country']['BG'] = "Bulgaria";
$lng['country']['BF'] = "Burkina Faso";
$lng['country']['BI'] = "Burundi";
$lng['country']['KH'] = "Cambodia";
$lng['country']['CM'] = "Cameroon";
$lng['country']['CA'] = "Canada";
$lng['country']['CV'] = "Cape Verde";
$lng['country']['KY'] = "Cayman Islands";
$lng['country']['CF'] = "Central African Republic";
$lng['country']['TD'] = "Chad";
$lng['country']['CL'] = "Chile";
$lng['country']['CN'] = "China";
$lng['country']['CX'] = "Christmas Island";
$lng['country']['CC'] = "Cocos (Keeling) Islands";
$lng['country']['CO'] = "Colombia";
$lng['country']['KM'] = "Comoros";
$lng['country']['CG'] = "Congo";
$lng['country']['CD'] = "Congo, The Democratic Republic of the";
$lng['country']['CK'] = "Cook Islands";
$lng['country']['CR'] = "Costa Rica";
$lng['country']['CI'] = "Cote D'ivoire";
$lng['country']['HR'] = "Croatia";
$lng['country']['CU'] = "Cuba";
$lng['country']['CW'] = "Curacao";
$lng['country']['CY'] = "Cyprus";
$lng['country']['CZ'] = "Czech Republic";
$lng['country']['DK'] = "Denmark";
$lng['country']['DJ'] = "Djibouti";
$lng['country']['DM'] = "Dominica";
$lng['country']['DO'] = "Dominican Republic";
$lng['country']['EC'] = "Ecuador";
$lng['country']['EG'] = "Egypt";
$lng['country']['SV'] = "El Salvador";
$lng['country']['GQ'] = "Equatorial Guinea";
$lng['country']['ER'] = "Eritrea";
$lng['country']['EE'] = "Estonia";
$lng['country']['ET'] = "Ethiopia";
$lng['country']['FK'] = "Falkland Islands (Malvinas)";
$lng['country']['FO'] = "Faroe Islands";
$lng['country']['FJ'] = "Fiji";
$lng['country']['FI'] = "Finland";
$lng['country']['FR'] = "France";
$lng['country']['GF'] = "French Guiana";
$lng['country']['PF'] = "French Polynesia";
$lng['country']['TF'] = "French Southern Territories";
$lng['country']['GA'] = "Gabon";
$lng['country']['GM'] = "Gambia";
$lng['country']['GE'] = "Georgia";
$lng['country']['DE'] = "Germany";
$lng['country']['GH'] = "Ghana";
$lng['country']['GI'] = "Gibraltar";
$lng['country']['GR'] = "Greece";
$lng['country']['GL'] = "Greenland";
$lng['country']['GD'] = "Grenada";
$lng['country']['GP'] = "Guadeloupe";
$lng['country']['GU'] = "Guam";
$lng['country']['GT'] = "Guatemala";
$lng['country']['GG'] = "Guernsey";
$lng['country']['GN'] = "Guinea";
$lng['country']['GW'] = "Guinea-Bissau";
$lng['country']['GY'] = "Guyana";
$lng['country']['HT'] = "Haiti";
$lng['country']['HM'] = "Heard Island and McDonald Islands";
$lng['country']['VA'] = "Holy See (Vatican City State)";
$lng['country']['HN'] = "Honduras";
$lng['country']['HK'] = "Hong Kong";
$lng['country']['HU'] = "Hungary";
$lng['country']['IS'] = "Iceland";
$lng['country']['IN'] = "India";
$lng['country']['ID'] = "Indonesia";
$lng['country']['IR'] = "Iran, Islamic Republic of";
$lng['country']['IQ'] = "Iraq";
$lng['country']['IE'] = "Ireland";
$lng['country']['IM'] = "Isle of Man";
$lng['country']['IL'] = "Israel";
$lng['country']['IT'] = "Italy";
$lng['country']['JM'] = "Jamaica";
$lng['country']['JP'] = "Japan";
$lng['country']['JE'] = "Jersey";
$lng['country']['JO'] = "Jordan";
$lng['country']['KZ'] = "Kazakhstan";
$lng['country']['KE'] = "Kenya";
$lng['country']['KI'] = "Kiribati";
$lng['country']['KP'] = "Korea, Democratic People's Republic of";
$lng['country']['KR'] = "Korea, Republic of";
$lng['country']['KW'] = "Kuwait";
$lng['country']['KG'] = "Kyrgyzstan";
$lng['country']['LA'] = "Lao People's Democratic Republic";
$lng['country']['LV'] = "Latvia";
$lng['country']['LB'] = "Lebanon";
$lng['country']['LS'] = "Lesotho";
$lng['country']['LR'] = "Liberia";
$lng['country']['LY'] = "Libyan Arab Jamahiriya";
$lng['country']['LI'] = "Liechtenstein";
$lng['country']['LT'] = "Lithuania";
$lng['country']['LU'] = "Luxembourg";
$lng['country']['MO'] = "Macao";
$lng['country']['MK'] = "Macedonia, The Former Yugoslav Republic of";
$lng['country']['MG'] = "Madagascar";
$lng['country']['MW'] = "Malawi";
$lng['country']['MY'] = "Malaysia";
$lng['country']['MV'] = "Maldives";
$lng['country']['ML'] = "Mali";
$lng['country']['MT'] = "Malta";
$lng['country']['MH'] = "Marshall Islands";
$lng['country']['MQ'] = "Martinique";
$lng['country']['MR'] = "Mauritania";
$lng['country']['MU'] = "Mauritius";
$lng['country']['YT'] = "Mayotte";
$lng['country']['MX'] = "Mexico";
$lng['country']['FM'] = "Micronesia, Federated States of";
$lng['country']['MD'] = "Moldova, Republic of";
$lng['country']['MC'] = "Monaco";
$lng['country']['MN'] = "Mongolia";
$lng['country']['ME'] = "Montenegro";
$lng['country']['MS'] = "Montserrat";
$lng['country']['MA'] = "Morocco";
$lng['country']['MZ'] = "Mozambique";
$lng['country']['MM'] = "Myanmar";
$lng['country']['NA'] = "Namibia";
$lng['country']['NR'] = "Nauru";
$lng['country']['NP'] = "Nepal";
$lng['country']['NL'] = "Netherlands";
$lng['country']['NC'] = "New Caledonia";
$lng['country']['NZ'] = "New Zealand";
$lng['country']['NI'] = "Nicaragua";
$lng['country']['NE'] = "Niger";
$lng['country']['NG'] = "Nigeria";
$lng['country']['NU'] = "Niue";
$lng['country']['NF'] = "Norfolk Island";
$lng['country']['MP'] = "Northern Mariana Islands";
$lng['country']['NO'] = "Norway";
$lng['country']['OM'] = "Oman";
$lng['country']['PK'] = "Pakistan";
$lng['country']['PW'] = "Palau";
$lng['country']['PS'] = "Palestinian Territory, Occupied";
$lng['country']['PA'] = "Panama";
$lng['country']['PG'] = "Papua New Guinea";
$lng['country']['PY'] = "Paraguay";
$lng['country']['PE'] = "Peru";
$lng['country']['PH'] = "Philippines";
$lng['country']['PN'] = "Pitcairn";
$lng['country']['PL'] = "Poland";
$lng['country']['PT'] = "Portugal";
$lng['country']['PR'] = "Puerto Rico";
$lng['country']['QA'] = "Qatar";
$lng['country']['RE'] = "Reunion";
$lng['country']['RO'] = "Romania";
$lng['country']['RU'] = "Russian Federation";
$lng['country']['RW'] = "Rwanda";
$lng['country']['BL'] = "Saint Barthelemy";
$lng['country']['SH'] = "Saint Helena, Ascension and Tristan Da Cunha";
$lng['country']['KN'] = "Saint Kitts and Nevis";
$lng['country']['LC'] = "Saint Lucia";
$lng['country']['MF'] = "Saint Martin (French Part)";
$lng['country']['PM'] = "Saint Pierre and Miquelon";
$lng['country']['VC'] = "Saint Vincent and the Grenadines";
$lng['country']['WS'] = "Samoa";
$lng['country']['SM'] = "San Marino";
$lng['country']['ST'] = "Sao Tome and Principe";
$lng['country']['SA'] = "Saudi Arabia";
$lng['country']['SN'] = "Senegal";
$lng['country']['RS'] = "Serbia";
$lng['country']['SC'] = "Seychelles";
$lng['country']['SL'] = "Sierra Leone";
$lng['country']['SG'] = "Singapore";
$lng['country']['SX'] = "Sint Maarten (Dutch Part)";
$lng['country']['SK'] = "Slovakia";
$lng['country']['SI'] = "Slovenia";
$lng['country']['SB'] = "Solomon Islands";
$lng['country']['SO'] = "Somalia";
$lng['country']['ZA'] = "South Africa";
$lng['country']['GS'] = "South Georgia and the South Sandwich Islands";
$lng['country']['ES'] = "Spain";
$lng['country']['LK'] = "Sri Lanka";
$lng['country']['SD'] = "Sudan";
$lng['country']['SR'] = "Suriname";
$lng['country']['SJ'] = "Svalbard and Jan Mayen";
$lng['country']['SZ'] = "Swaziland";
$lng['country']['SE'] = "Sweden";
$lng['country']['CH'] = "Switzerland";
$lng['country']['SY'] = "Syrian Arab Republic";
$lng['country']['TW'] = "Taiwan, Province of China";
$lng['country']['TJ'] = "Tajikistan";
$lng['country']['TZ'] = "Tanzania, United Republic of";
$lng['country']['TH'] = "Thailand";
$lng['country']['TL'] = "Timor-Leste";
$lng['country']['TG'] = "Togo";
$lng['country']['TK'] = "Tokelau";
$lng['country']['TO'] = "Tonga";
$lng['country']['TT'] = "Trinidad and Tobago";
$lng['country']['TN'] = "Tunisia";
$lng['country']['TR'] = "Turkey";
$lng['country']['TM'] = "Turkmenistan";
$lng['country']['TC'] = "Turks and Caicos Islands";
$lng['country']['TV'] = "Tuvalu";
$lng['country']['UG'] = "Uganda";
$lng['country']['UA'] = "Ukraine";
$lng['country']['AE'] = "United Arab Emirates";
$lng['country']['GB'] = "United Kingdom";
$lng['country']['US'] = "United States";
$lng['country']['UM'] = "United States Minor Outlying Islands";
$lng['country']['UY'] = "Uruguay";
$lng['country']['UZ'] = "Uzbekistan";
$lng['country']['VU'] = "Vanuatu";
$lng['country']['VE'] = "Venezuela, Bolivarian Republic of";
$lng['country']['VN'] = "Viet Nam";
$lng['country']['VG'] = "Virgin Islands, British";
$lng['country']['VI'] = "Virgin Islands, U.S.";
$lng['country']['WF'] = "Wallis and Futuna";
$lng['country']['EH'] = "Western Sahara";
$lng['country']['YE'] = "Yemen";
$lng['country']['ZM'] = "Zambia";
$lng['country']['ZW'] = "Zimbabwe";

// ADDED IN FROXLOR 0.9.22-svn1
$lng['diskquota'] = 'Quota';
$lng['serversettings']['diskquota_enabled'] = 'Quota activated?';
$lng['serversettings']['diskquota_repquota_path']['description'] = 'Path to repquota';
$lng['serversettings']['diskquota_quotatool_path']['description'] = 'Path to quotatool';
$lng['serversettings']['diskquota_customer_partition']['description'] = 'Partition, on which the customer files are stored';
$lng['tasks']['diskspace_set_quota'] = 'Set quota on filesystem';
$lng['error']['session_timeout'] = 'Value too low';
$lng['error']['session_timeout_desc'] = 'You should not set the session timeout lower than 1 minute.';

// ADDED IN FROXLOR 0.9.24-svn1
$lng['admin']['assignedmax'] = 'Assigned / Max';
$lng['admin']['usedmax'] = 'Used / Max';
$lng['admin']['used'] = 'Used';
$lng['mysql']['size'] = 'Size';

$lng['error']['invalidhostname'] = 'Hostname can\'t be empty nor can it consist only of whitespaces';

$lng['traffic']['http'] = 'HTTP (MiB)';
$lng['traffic']['ftp'] = 'FTP (MiB)';
$lng['traffic']['mail'] = 'Mail (MiB)';

// ADDED IN 0.9.27-svn1
$lng['serversettings']['mod_fcgid']['idle_timeout']['title'] = 'Idle Timeout';
$lng['serversettings']['mod_fcgid']['idle_timeout']['description'] = 'Timeout setting for Mod FastCGI.';
$lng['serversettings']['phpfpm_settings']['idle_timeout']['title'] = 'Idle Timeout';
$lng['serversettings']['phpfpm_settings']['idle_timeout']['description'] = 'Timeout setting for PHP5 FPM FastCGI.';

// ADDED IN 0.9.27-svn2
$lng['panel']['cancel'] = 'Cancel';
$lng['admin']['delete_statistics'] = 'Delete Statistics';
$lng['admin']['speciallogwarning'] = 'WARNING: By changing this setting you will lose all your old statistics for this domain. If you are sure you wish to change this type "%s" in the field below and click the "delete" button.<br /><br />';

// ADDED IN 0.9.28-svn2
$lng['serversettings']['vmail_maildirname']['title'] = 'Maildir name';
$lng['serversettings']['vmail_maildirname']['description'] = 'Maildir directory into user\'s account. Normally \'Maildir\', in some implementations \'.maildir\', and directly into user\'s directory if left blank.';
$lng['tasks']['remove_emailacc_files'] = 'Delete customer e-mail data.';

// ADDED IN 0.9.28-svn5
$lng['error']['operationnotpermitted'] = 'Operation not permitted!';
$lng['error']['featureisdisabled'] = 'Feature %s is disabled. Please contact your service provider.';
$lng['serversettings']['catchall_enabled']['title']  = 'Use Catchall';
$lng['serversettings']['catchall_enabled']['description']  = 'Do you want to provide your customers the catchall-feature?';

// ADDED IN 0.9.28.svn6
$lng['serversettings']['apache_24']['title'] = 'Use modifications for Apache 2.4';
$lng['serversettings']['apache_24']['description'] = '<strong class="red">ATTENTION:</strong> use only if you acutally have apache version 2.4 or higher installed<br />otherwise your webserver will not be able to start';
$lng['admin']['tickets_see_all'] = 'Can see all ticket-categories?';
$lng['serversettings']['nginx_fastcgiparams']['title'] = 'Path to fastcgi_params file';
$lng['serversettings']['nginx_fastcgiparams']['description'] = 'Specify the path to nginx\'s fastcgi_params file including filename';

// Added in Froxlor 0.9.28-rc2
$lng['serversettings']['documentroot_use_default_value']['title'] = 'Use domain name as default value for DocumentRoot path';
$lng['serversettings']['documentroot_use_default_value']['description'] = 'If enabled and DocumentRoot path is empty, default value will be the (sub)domain name.<br /><br />Examples: <br />/var/customers/customer_name/example.com/<br />/var/customers/customer_name/subdomain.example.com/';

$lng['error']['usercurrentlydeactivated'] = 'The user %s is currently deactivated';
$lng['admin']['speciallogfile']['title'] = 'Separate logfile';
$lng['admin']['speciallogfile']['description'] = 'Enable this to get a separate access-log file for this domain';
$lng['error']['setlessthanalreadyused'] = 'You cannot set less resources of \'%s\' than this user already used<br />';
$lng['error']['stringmustntbeempty'] = 'The value for the field %s must not be empty';
$lng['admin']['domain_editable']['title'] = 'Allow editing of domain';
$lng['admin']['domain_editable']['desc'] = 'If set to yes, the customer is allowed to change several domain-settings.<br />If set to no, nothing can be changed by the customer.';

// Added in Froxlor 0.9.29-dev
$lng['serversettings']['panel_phpconfigs_hidestdsubdomain']['title'] = 'Hide standard-subdomains in PHP-configuration overview';
$lng['serversettings']['panel_phpconfigs_hidestdsubdomain']['description'] = 'If activated the standard-subdomains for customers will not be displayed in the php-configurations overview<br /><br />Note: This is only visible if you have enabled FCGID or PHP-FPM';
$lng['serversettings']['passwordcryptfunc']['title'] = 'Chose which password-crypt method is to be used';
$lng['serversettings']['systemdefault'] = 'System default';
$lng['serversettings']['panel_allow_theme_change_admin'] = 'Allow admins to change the theme';
$lng['serversettings']['panel_allow_theme_change_customer'] = 'Allow customers to change the theme';
$lng['serversettings']['axfrservers']['title'] = 'AXFR servers';
$lng['serversettings']['axfrservers']['description'] = 'A comma separated list of IP addresses allowed to transfer (AXFR) dns zones.';
$lng['panel']['ssleditor'] = 'SSL settings for this domain';
$lng['admin']['ipsandports']['ssl_paste_description'] = 'Paste your complete certificate content in the textbox';
$lng['admin']['ipsandports']['ssl_cert_file_content'] = 'Content of the ssl certificate';
$lng['admin']['ipsandports']['ssl_key_file_content'] = 'Content of the ssl (private-) key file';
$lng['admin']['ipsandports']['ssl_ca_file_content'] = 'Content of the ssl CA file (optional)';
$lng['admin']['ipsandports']['ssl_ca_file_content_desc'] = '<br /><br />Client authentification, set this only if you know what it is.';
$lng['admin']['ipsandports']['ssl_cert_chainfile_content'] = 'Content of the certificate chainfile (optional)';
$lng['admin']['ipsandports']['ssl_cert_chainfile_content_desc'] = '<br /><br />Mostly CA_Bundle, or similar, you probably want to set this if you bought a SSL certificate.';
$lng['error']['sslcertificateismissingprivatekey'] = 'You need to specify a private key for your certificate';
$lng['error']['sslcertificatewrongdomain'] = 'The given certificate does not belong to this domain';
$lng['error']['sslcertificateinvalidcert'] = 'The given certificate-content does not seem to be a valid certificate';
$lng['error']['sslcertificateinvalidcertkeypair'] = 'The given private-key does not belong to the given certificate';
$lng['error']['sslcertificateinvalidca'] = 'The given CA certificate data does not seem to be a valid certificate';
$lng['error']['sslcertificateinvalidchain'] = 'The given certificate chain data does not seem to be a valid certificate';
$lng['serversettings']['customerssl_directory']['title'] = 'Webserver customer-ssl certificates-directory';
$lng['serversettings']['customerssl_directory']['description'] = 'Where should customer-specified ssl-certificates be created?<br /><br /><div class="red">NOTE: This folder\'s content gets deleted regulary so avoid storing data in there manually.</div>';
$lng['admin']['phpfpm.ininote'] = 'Not all values you may want to define can be used in the php-fpm pool configuration';

// Added in Froxlor 0.9.30
$lng['crondesc']['cron_mailboxsize'] = 'Calculating of mailbox-sizes';
$lng['domains']['ipandport_multi']['title'] = 'IP address(es)';
$lng['domains']['ipandport_multi']['description'] = 'Specify one or more IP address for the domain.<br /><br /><div class="red">NOTE: IP addresses cannot be changed when the domain is configured as <strong>alias-domain</strong> of another domain.</div>';
$lng['domains']['ipandport_ssl_multi']['title'] = 'SSL IP address(es)';
$lng['domains']['ssl_redirect']['title'] = 'SSL redirect';
$lng['domains']['ssl_redirect']['description'] = 'This option creates redirects for non-ssl vhosts so that all requests are redirected to the SSL-vhost.<br /><br />e.g. a request to <strong>http</strong>://domain.tld/ will redirect you to <strong>https</strong>://domain.tld/';
$lng['admin']['phpinfo'] = 'PHPinfo()';
$lng['admin']['selectserveralias'] = 'ServerAlias value for the domain';
$lng['admin']['selectserveralias_desc'] = 'Chose whether froxlor should create a wildcard-entry (*.domain.tld), a WWW-alias (www.domain.tld) or no alias at all';
$lng['domains']['serveraliasoption_wildcard'] = 'Wildcard (*.domain.tld)';
$lng['domains']['serveraliasoption_www'] = 'WWW (www.domain.tld)';
$lng['domains']['serveraliasoption_none'] = 'No alias';
$lng['error']['givendirnotallowed'] = 'The given directory in field %s is not allowed.';
$lng['serversettings']['ssl']['ssl_cipher_list']['title'] = 'Configure the allowed SSL ciphers';
$lng['serversettings']['ssl']['ssl_cipher_list']['description'] = 'This is a list of ciphers that you want (or don\'t want) to use when talking SSL. For a list of ciphers and how to include/exclude them, see sections "CIPHER LIST FORMAT" and "CIPHER STRINGS" on <a href="http://openssl.org/docs/apps/ciphers.html">the man-page for ciphers</a>.<br /><br /><b>Default value is:</b><pre>ECDH+AESGCM:ECDH+AES256:!aNULL:!MD5:!DSS:!DH:!AES128</pre>';

// Added in Froxlor 0.9.31
$lng['panel']['dashboard'] = 'Dashboard';
$lng['panel']['assigned'] = 'Assigned';
$lng['panel']['available'] = 'Available';
$lng['customer']['services'] = 'Services';
$lng['serversettings']['phpfpm_settings']['ipcdir']['title'] = 'FastCGI IPC directory';
$lng['serversettings']['phpfpm_settings']['ipcdir']['description'] = 'The directory where the php-fpm sockets will be stored by the webserver.<br />This directory has to be readable for the webserver';
$lng['panel']['news'] = 'News';
$lng['error']['sslredirectonlypossiblewithsslipport'] = 'Using the SSL redirect is only possible when the domain has at least one ssl-enabled IP/port combination assigned.';
$lng['error']['fcgidstillenableddeadlock'] = 'FCGID is currently active.<br />Please deactivate it before switching to another webserver than Apache2 or lighttpd';
$lng['error']['send_report_title'] = 'Send error report';
$lng['error']['send_report_desc'] = 'Thank you for reporting this error and helping us to froxlor improve froxlor.<br />This is the email which will be sent to the froxlor developer team:';
$lng['error']['send_report'] = 'Send report';
$lng['error']['send_report_error'] = 'Error when sending report: <br />%s';
$lng['error']['notallowedtouseaccounts'] = 'Your account does not allow using IMAP/POP3. You cannot add email accounts.';
$lng['pwdreminder']['changed'] = 'Your password has been updated successfully. You can now login with your new password.';
$lng['pwdreminder']['wrongcode'] = 'Sorry, your activation-code does not exist or has already expired.';
$lng['admin']['templates']['LINK'] = 'Replaced with the customers password reset link.';
$lng['pwdreminder']['choosenew'] = 'Set new password';
$lng['serversettings']['allow_error_report_admin']['title'] = 'Allow administrators/resellers to report database-errors to Froxlor';
$lng['serversettings']['allow_error_report_admin']['description'] = 'Please note: Never send any personal (customer-)data to us!';
$lng['serversettings']['allow_error_report_customer']['title'] = 'Allow customers to report database-errors to Froxlor';
$lng['serversettings']['allow_error_report_customer']['description'] = 'Please note: Never send any personal (customer-)data to us!';
$lng['admin']['phpsettings']['enable_slowlog'] = 'Enable slowlog (per domain)';
$lng['admin']['phpsettings']['request_terminate_timeout'] = 'Request terminate-timeout';
$lng['admin']['phpsettings']['request_slowlog_timeout'] = 'Request slowlog-timeout';
$lng['admin']['templates']['SERVER_HOSTNAME'] = 'Replaces the system-hostname (URL to froxlor)';
$lng['admin']['templates']['SERVER_IP'] = 'Replaces the default server ip-address';
$lng['admin']['templates']['SERVER_PORT'] = 'Replaces the default server port';
$lng['admin']['templates']['DOMAINNAME'] = 'Replaces the customers standard-subdomain (can be empty if none is generated)';
$lng['admin']['show_news_feed']['title'] = 'Show news-feed on admin-dashboard';
$lng['admin']['show_news_feed']['description'] = 'Enable this to show the official froxlor newsfeed (https://inside.froxlor.org/news/) on your dashboard and never miss important information or release-announcements.';
$lng['panel']['newsfeed_disabled'] = 'The newsfeed is disabled. Click the edit icon to go to the settings.';

// Added in Froxlor 0.9.32
$lng['logger']['reseller'] = "Reseller";
$lng['logger']['admin'] = "Administrator";
$lng['logger']['cron'] = "Cronjob";
$lng['logger']['login'] = "Login";
$lng['logger']['intern'] = "Internal";
$lng['logger']['unknown'] = "Unknown";
$lng['serversettings']['mailtraffic_enabled']['title'] = "Analyse mail traffic";
$lng['serversettings']['mailtraffic_enabled']['description'] = "Enable analysing of mailserver logs to calculate the traffic";
$lng['serversettings']['mdaserver']['title'] = "MDA type";
$lng['serversettings']['mdaserver']['description'] = "Type of the Mail Delivery Server";
$lng['serversettings']['mdalog']['title'] = "MDA log";
$lng['serversettings']['mdalog']['description'] = "Logfile of the Mail Delivery Server";
$lng['serversettings']['mtaserver']['title'] = "MTA type";
$lng['serversettings']['mtaserver']['description'] = "Type of the Mail Transfer Agent";
$lng['serversettings']['mtalog']['title'] = "MTA log";
$lng['serversettings']['mtalog']['description'] = "Logfile of the Mail Transfer Agent";
$lng['panel']['ftpdesc'] = 'FTP description';
$lng['admin']['cronsettings'] = 'Cronjob settings';
$lng['serversettings']['system_cronconfig']['title'] = 'Cron configuration file';
$lng['serversettings']['system_cronconfig']['description'] = 'Path to the cron-service configuration-file. This file will be updated regularly and automatically by froxlor.<br />Note: Please <b>be sure</b> to use the same filename as for the main froxlor cronjob (default: /etc/cron.d/froxlor)!<br><br>If you are using <b>FreeBSD</b>, please specify <i>/etc/crontab</i> here!';
$lng['tasks']['remove_ftpacc_files'] = 'Delete customer ftp-account data.';
$lng['tasks']['regenerating_crond'] = 'Rebuilding the cron.d-file';
$lng['serversettings']['system_crondreload']['title'] = 'Cron-daemon reload command';
$lng['serversettings']['system_crondreload']['description'] = 'Specify the command to execute in order to reload your systems cron-daemon';
$lng['admin']['integritycheck'] = 'Database validation';
$lng['admin']['integrityid'] = '#';
$lng['admin']['integrityname'] = 'Name';
$lng['admin']['integrityresult'] = 'Result';
$lng['admin']['integrityfix'] = 'Fix problems automatically';
$lng['question']['admin_integritycheck_reallyfix'] = 'Do you really want to try fixing all database integrity problems automatically?';
$lng['serversettings']['system_croncmdline']['title'] = 'Cron execution command (php-binary)';
$lng['serversettings']['system_croncmdline']['description'] = 'Command to execute our cronjobs. Change this only if you know what you are doing (default: "/usr/bin/nice -n 5 /usr/bin/php5 -q")!';
$lng['error']['cannotdeletehostnamephpconfig'] = 'This PHP-configuration is used by the Froxlor-vhost and cannot be deleted.';
$lng['error']['cannotdeletedefaultphpconfig'] = 'This PHP-configuration is set as default and cannot be deleted.';
$lng['serversettings']['system_cron_allowautoupdate']['title'] = 'Allow automatic database updates';
$lng['serversettings']['system_cron_allowautoupdate']['description'] = '<div class="red"><b>ATTENTION:</b></div> This settings allows the cronjob to bypass the version-check of froxlors files and database and runs the database-updates in case a version-mismatch occurs.<br><br><div class="red">Auto-update will always set default values for new settings or changes. This might not always suite your system. Please think twice before activating this option</div>';
$lng['error']['passwordshouldnotbeusername'] = 'The password should not be the same as the username.';

// Added in Froxlor 0.9.33
$lng['admin']['customer_show_news_feed'] = "Show newsfeed on customer-dashboard";
$lng['admin']['customer_news_feed_url']['title'] = "Use custom RSS-feed";
$lng['admin']['customer_news_feed_url']['description'] = "Specify a custom RSS-feed that will be shown to your customers on their dashboard.<br /><small>Leave this empty to use the official froxlor newsfeed (https://inside.froxlor.org/news/).</small>";
$lng['serversettings']['dns_createhostnameentry'] = "Create bind-zone/config for system hostname";
$lng['serversettings']['panel_password_alpha_lower']['title'] = 'Lowercase character';
$lng['serversettings']['panel_password_alpha_lower']['description'] = 'Password must contain at least one lowercase letter (a-z).';
$lng['serversettings']['panel_password_alpha_upper']['title'] = 'Uppercase character';
$lng['serversettings']['panel_password_alpha_upper']['description'] = 'Password must contain at least one  uppercase letter (A-Z).';
$lng['serversettings']['panel_password_numeric']['title'] = 'Numbers';
$lng['serversettings']['panel_password_numeric']['description'] = 'Password must contain at least one number (0-9).';
$lng['serversettings']['panel_password_special_char_required']['title'] = 'Special character';
$lng['serversettings']['panel_password_special_char_required']['description'] = 'Password must contain at least one of the characters defined below.';
$lng['serversettings']['panel_password_special_char']['title'] = 'Special characters list';
$lng['serversettings']['panel_password_special_char']['description'] = 'One of these characters is required if the above option is set.';
$lng['phpfpm']['use_mod_proxy']['title'] = 'Use mod_proxy / mod_proxy_fcgi';
$lng['phpfpm']['use_mod_proxy']['description'] = 'Activate to use php-fpm via mod_proxy_fcgi. Requires at least apache-2.4.9';
$lng['error']['no_phpinfo'] = 'Sorry, unable to read phpinfo()';

$lng['admin']['movetoadmin'] = 'Move customer';
$lng['admin']['movecustomertoadmin'] = 'Move customer to the selected admin/reseller<br /><small>Leave this empty for no change.<br />If the desired admin does not show up in the list, his customer-limit has been reached.</small>';
$lng['error']['moveofcustomerfailed'] = 'Moving the customer to the selected admin/reseller failed. Keep in mind that all other changes to the customer were applied successfully at this stage.<br><br>Error-message: %s';

$lng['domains']['domain_import'] = 'Import Domains';
$lng['domains']['import_separator'] = 'Separator';
$lng['domains']['import_offset'] = 'Offset';
$lng['domains']['import_file'] = 'CSV-File';
$lng['success']['domain_import_successfully'] = 'Successfully imported %s domains.';
$lng['error']['domain_import_error'] = 'Following error occurred while importing domains: %s';
$lng['admin']['note'] = 'Note';
$lng['domains']['import_description'] = 'Detailed information about the structure of the import-file and how to import successfully, please visit <a href="http://redmine.froxlor.org/projects/froxlor/wiki/DomainBulkActionDoc" target="_blank">http://redmine.froxlor.org/projects/froxlor/wiki/DomainBulkActionDoc</a>';
$lng['usersettings']['custom_notes']['title'] = 'Custom notes';
$lng['usersettings']['custom_notes']['description'] = 'Feel free to put any notes you want/need in here. They will show up in the admin/customer overview for the corresponding user.';
$lng['usersettings']['custom_notes']['show'] = 'Show your notes on the dashboard of the user';
$lng['error']['fcgidandphpfpmnogoodtogether'] = 'FCGID and PHP-FPM cannot be activated at the same time';

// Added in Froxlor 0.9.34
$lng['admin']['configfiles']['legend'] = 'You are about to configure a service/daemon. The following legend explains the nomenclature.';
$lng['admin']['configfiles']['commands'] = '<span class="red">Commands:</span> These commands are to be executed line by line as root-user in a shell. It is safe to copy the whole block and paste it into the shell.';
$lng['admin']['configfiles']['files'] = '<span class="red">Configfiles:</span> This is an example of the contents of a configuration file. The commands before these textfields should open an editor with the target file. Just copy and paste the contents into the editor and save the file.<br><br><span class="red">Please note:</span> The MySQL-password has not been replaced for security reasons. Please replace "MYSQL_PASSWORD" on your own. If you forgot your MySQL-password you\'ll find it in "lib/userdata.inc.php"';
$lng['serversettings']['apache_itksupport']['title'] = 'Use modifications for Apache ITK-MPM';
$lng['serversettings']['apache_itksupport']['description'] = '<strong class="red">ATTENTION:</strong> use only if you acutally have apache itk-mpm enabled<br />otherwise your webserver will not be able to start';
$lng['integrity_check']['DatabaseCharset'] = 'Characterset of database (should be UTF-8)';
$lng['integrity_check']['DomainIpTable'] = 'IP &lt;&dash;&gt; domain references';
$lng['integrity_check']['SubdomainSslRedirect'] = 'False SSL-redirect flag for non-ssl domains';
$lng['integrity_check']['FroxlorLocalGroupMemberForFcgidPhpFpm'] = 'froxlor-user in the customer groups (for FCGID/php-fpm)';
$lng['integrity_check']['WebserverGroupMemberForFcgidPhpFpm'] = 'Webserver-user in the customer groups (for FCGID/php-fpm)';
$lng['integrity_check']['SubdomainLetsencrypt'] = 'Main domains with no SSL-Port assigned don\'t have any subdomains with active SSL redirect';
$lng['admin']['mod_fcgid_umask']['title'] = 'Umask (default: 022)';

// Added for apcuinfo
$lng['admin']['apcuinfo'] = 'APCu info';
$lng['error']['no_apcuinfo'] = 'No cache info available. APCu does not appear to be running.';
$lng['apcuinfo']['clearcache'] = 'Clear APCu cache';
$lng['apcuinfo']['generaltitle'] = 'General Cache Information';
$lng['apcuinfo']['version'] = 'APCu Version';
$lng['apcuinfo']['phpversion'] = 'PHP Version';
$lng['apcuinfo']['host'] = 'APCu Host';
$lng['apcuinfo']['sharedmem'] = 'Shared Memory';
$lng['apcuinfo']['sharedmemval'] = '%d Segment(s) with %s (%s memory)';
$lng['apcuinfo']['start'] = 'Start Time';
$lng['apcuinfo']['uptime'] = 'Uptime';
$lng['apcuinfo']['upload'] = 'File Upload Support';
$lng['apcuinfo']['cachetitle'] = 'Cache Information';
$lng['apcuinfo']['cvar'] = 'Cached Variables';
$lng['apcuinfo']['hit'] = 'Hits';
$lng['apcuinfo']['miss'] = 'Misses';
$lng['apcuinfo']['reqrate'] = 'Request Rate (hits, misses)';
$lng['apcuinfo']['creqsec'] = 'cache requests/second';
$lng['apcuinfo']['hitrate'] = 'Hit Rate';
$lng['apcuinfo']['missrate'] = 'Miss Rate';
$lng['apcuinfo']['insrate'] = 'Insert Rate';
$lng['apcuinfo']['cachefull'] = 'Cache full count';
$lng['apcuinfo']['runtime'] = 'Runtime Settings';
$lng['apcuinfo']['memnote'] = 'Memory Usage <font size=-2>(multiple slices indicate fragments)</font>';
$lng['apcuinfo']['free'] = 'Free';
$lng['apcuinfo']['used'] = 'Used';
$lng['apcuinfo']['hitmiss'] = 'Hits & Misses';
$lng['apcuinfo']['detailmem'] = 'Detailed Memory Usage and Fragmentation';
$lng['apcuinfo']['fragment'] = 'Fragmentation';

// Added for opcache info
$lng['admin']['opcacheinfo'] = 'OPcache Info';
$lng['error']['no_opcacheinfo'] = 'No cache info available. OPCache does not appear to be running.';
$lng['opcacheinfo']['generaltitle'] = 'General Information';
$lng['opcacheinfo']['resetcache'] = 'Reset OPcache';
$lng['opcacheinfo']['version'] = 'OPCache version';
$lng['opcacheinfo']['phpversion'] = 'PHP version';
$lng['opcacheinfo']['runtimeconf'] = 'Runtime Configuration';
$lng['opcacheinfo']['start'] = 'Start time';
$lng['opcacheinfo']['lastreset'] = 'Last restart';
$lng['opcacheinfo']['oomrestarts'] = 'OOM restart count';
$lng['opcacheinfo']['hashrestarts'] = 'Hash restart count';
$lng['opcacheinfo']['manualrestarts'] = 'Manual restart count';
$lng['opcacheinfo']['hitsc'] = 'Hits count';
$lng['opcacheinfo']['missc'] = 'Miss count';
$lng['opcacheinfo']['blmissc'] = 'Blacklist miss count';
$lng['opcacheinfo']['status'] = 'Status';
$lng['opcacheinfo']['never'] = 'never';
$lng['opcacheinfo']['enabled'] = 'OPcache Enabled';
$lng['opcacheinfo']['cachefull'] = 'Cache full';
$lng['opcacheinfo']['restartpending'] = 'Pending restart';
$lng['opcacheinfo']['restartinprogress'] = 'Restart in progress';
$lng['opcacheinfo']['cachedscripts'] = 'Cached scripts count';
$lng['opcacheinfo']['memusage'] = 'Memory usage';
$lng['opcacheinfo']['totalmem'] = 'Total memory';
$lng['opcacheinfo']['usedmem'] = 'Used memory';
$lng['opcacheinfo']['freemem'] = 'Free memory';
$lng['opcacheinfo']['wastedmem'] = 'Wasted memory';
$lng['opcacheinfo']['maxkey'] = 'Maximum keys';
$lng['opcacheinfo']['usedkey'] = 'Used keys';
$lng['opcacheinfo']['wastedkey'] = 'Wasted keys';
$lng['opcacheinfo']['strinterning'] = 'String interning';
$lng['opcacheinfo']['strcount'] = 'String count';
$lng['opcacheinfo']['keystat'] = 'Cached keys statistic';
$lng['opcacheinfo']['used'] = 'Used';
$lng['opcacheinfo']['free'] = 'Free';
$lng['opcacheinfo']['blacklist'] = 'Blacklist';
$lng['opcacheinfo']['novalue'] = '<i>no value</i>';
$lng['opcacheinfo']['true'] = '<i>true</i>';
$lng['opcacheinfo']['false'] = '<i>false</i>';

// Added for let's encrypt
$lng['admin']['letsencrypt']['title'] = 'Use Let\'s Encrypt';
$lng['admin']['letsencrypt']['description'] = 'Get a free certificate from <a href="https://letsencrypt.org">Let\'s Encrypt</a>. The certificate will be created and renewed automatically.<br><strong class="red">ATTENTION:</strong> If wildcards are enabled, this option will automatically be disabled. This feature is still in beta.';
$lng['customer']['letsencrypt']['title'] = 'Use Let\'s Encrypt';
$lng['customer']['letsencrypt']['description'] = 'Get a free certificate from <a href="https://letsencrypt.org">Let\'s Encrypt</a>. The certificate will be created and renewed automatically.<br><strong class="red">ATTENTION:</strong> This feature is still in beta.';
$lng['error']['sslredirectonlypossiblewithsslipport'] = 'Using Let\'s Encrypt is only possible when the domain has at least one ssl-enabled IP/port combination assigned.';
$lng['error']['nowildcardwithletsencrypt'] = 'Let\'s Encrypt cannot (yet) handle wildcard-domains. Please set the ServerAlias to WWW or disable it completely';
$lng['panel']['letsencrypt'] = 'Using Let\'s encrypt';
$lng['crondesc']['cron_letsencrypt'] = 'updating Let\'s Encrypt certificates';
$lng['serversettings']['letsencryptca']['title'] = "Let's Encrypt environment";
$lng['serversettings']['letsencryptca']['description'] = "Environment to be used for Let's Encrypt certificates.<br><strong class=\"red\">ATTENTION:</strong> Let's Encrypt is still in beta</strong>";
$lng['serversettings']['letsencryptcountrycode']['title'] = "Let's Encrypt country code";
$lng['serversettings']['letsencryptcountrycode']['description'] = "2 letter country code used to generate Let's Encrypt certificates.<br><strong class=\"red\">ATTENTION:</strong> Let's Encrypt is still in beta</strong>";
$lng['serversettings']['letsencryptstate']['title'] = "Let's Encrypt state";
$lng['serversettings']['letsencryptstate']['description'] = "State used to generate Let's Encrypt certificates.<br><strong class=\"red\">ATTENTION:</strong> Let's Encrypt is still in beta</strong>";
$lng['serversettings']['letsencryptchallengepath']['title'] = "Path for Let's Encrypt challenges";
$lng['serversettings']['letsencryptchallengepath']['description'] = "Directory where the Let's Encrypt challenges should be offered from via a global alias.<br><strong class=\"red\">ATTENTION:</strong> Let's Encrypt is still in beta</strong>";
$lng['serversettings']['letsencryptkeysize']['title'] = "Key size for new Let's Encrypt certificates";
$lng['serversettings']['letsencryptkeysize']['description'] = "Size of the key in Bits for new Let's Encrypt certificates.<br><strong class=\"red\">ATTENTION:</strong> Let's Encrypt is still in beta</strong>";
$lng['serversettings']['letsencryptreuseold']['title'] = "Re-use Let's Encrypt key";
$lng['serversettings']['letsencryptreuseold']['description'] = "If activated, the same key will be used for every renew, otherwise a new key will be generated every time.<br><strong class=\"red\">ATTENTION:</strong> Let's Encrypt is still in beta</strong>";
$lng['serversettings']['leenabled']['title'] = "Enable Let's Encrypt";
$lng['serversettings']['leenabled']['description'] = "If activated, customers are able to let froxlor automatically generate and renew Let's Encrypt ssl-certificates for domains with a ssl IP/port.<br /><br />Please remember that you need to go through the webserver-configuration when eabled because this feature needs a special configuration.";
$lng['domains']['ssl_redirect_temporarilydisabled'] = "<br>The SSL redirect is temporarily deactivated while a new Let's Encrypt certificate is generated. It will be activated again after the certificate was generated.";

// Autoupdate
$lng['admin']['autoupdate'] = 'Auto-Update';
$lng['error']['customized_version'] = 'It looks like your Froxlor installation has been customized, no support sorry.';
$lng['error']['autoupdate_0'] = 'Unknown error';
$lng['error']['autoupdate_1'] = 'PHP setting allow_url_fopen is disabled. Autoupdate needs this setting to be enabled in php.ini';
$lng['error']['autoupdate_2'] = 'PHP zip extension not found, please ensure it is installed and activated';
$lng['error']['autoupdate_4'] = 'The froxlor archive could not be stored to the disk :(';
$lng['error']['autoupdate_5'] = 'version.froxlor.org returned inacceptable values :(';
$lng['error']['autoupdate_6'] = 'Woops, there was no (valid) version given to download :(';
$lng['error']['autoupdate_7'] = 'The downloaded archive could not be found :(';
$lng['error']['autoupdate_8'] = 'The archive could not be extracted :(';
$lng['error']['autoupdate_9'] = 'The downloaded file did not pass the integrity check. Please try to update again.';

$lng['admin']['server_php'] = 'PHP';
$lng['domains']['termination_date'] = 'Date of termination';
$lng['domains']['termination_date_overview'] = 'canceled until ';
$lng['panel']['set'] = 'Apply';
$lng['customer']['selectserveralias_addinfo'] = 'This option can be set when editing the domain. Its initial value is inherited from the parent-domain.';
$lng['error']['mailaccistobedeleted'] = "Another account with the same name (%s) is currently being deleted and can therefore not be added at this moment.";

$lng['menue']['extras']['backup'] = 'Backup';
$lng['extras']['backup'] = 'Create backup';
$lng['extras']['backup_web'] = 'Backup web-data';
$lng['extras']['backup_mail'] = 'Backup mail-data';
$lng['extras']['backup_dbs'] = 'Backup databases';
$lng['error']['customerhasongoingbackupjob'] = 'There is already a backup job waiting to be processed, please be patient.';
$lng['success']['backupscheduled'] = 'Your backup job has been scheduled. Please wait for it to be processed';
$lng['success']['backupaborted'] = 'Your scheduled backup has been cancelled';
$lng['crondesc']['cron_backup'] = 'Process backup jobs';
$lng['error']['backupfunctionnotenabled'] = 'The backup function is not enabled';
$lng['serversettings']['backupenabled']['title'] = "Enable backup for customers";
$lng['serversettings']['backupenabled']['description'] = "If activated, the customer will be able to schedule backup jobs (cron-backup) which generates an archive within his docroot (subdirectory chosable by customer)";
$lng['extras']['path_protection_label'] = '<strong class="red">Important</strong>';
$lng['extras']['path_protection_info'] = '<strong class="red">We strongly recommend protecting the given path, see "Extras" -> "Directory protection"</strong>';
$lng['tasks']['backup_customerfiles'] = 'Backup job for customer %loginname%';

$lng['error']['dns_domain_nodns'] = 'DNS is not enabled for this domain';
$lng['error']['dns_content_empty'] = 'No content given';
$lng['error']['dns_arec_noipv4'] = 'No valid IP address for A-record given';
$lng['error']['dns_aaaarec_noipv6'] = 'No valid IP address for AAAA-record given';
$lng['error']['dns_mx_prioempty'] = 'Invalid MX priority given';
$lng['error']['dns_mx_needdom'] = 'The MX content value must be a valid domain-name';
$lng['error']['dns_mx_noalias'] = 'The MX-content value cannot be an CNAME entry.';
$lng['error']['dns_cname_invaliddom'] = 'Invalid domain-name for CNAME record';
$lng['error']['dns_cname_nomorerr'] = 'There already exists a resource-record with the same record-name. It cannot be used as CNAME.';
$lng['error']['dns_ns_invaliddom'] = 'Invalid domain-name for NS record';
$lng['error']['dns_srv_prioempty'] = 'Invalid SRV priority given';
$lng['error']['dns_srv_invalidcontent'] = 'Invalid SRV content, must contain of fields weight, port and target, e.g.: 5 5060 sipserver.example.com.';
$lng['error']['dns_srv_needdom'] = 'The SRV target value must be a valid domain-name';
$lng['error']['dns_srv_noalias'] = 'The SRV-target value cannot be an CNAME entry.';
$lng['error']['dns_duplicate_entry'] = 'Record already exists';
$lng['success']['dns_record_added'] = 'Record added successfully';
$lng['success']['dns_record_deleted'] = 'Record deleted successfully';
$lng['dnseditor']['edit'] = 'edit DNS';
$lng['dnseditor']['records'] = 'records';
$lng['error']['dns_notfoundorallowed'] = 'Domain not found or no permission';
$lng['serversettings']['dnseditorenable']['title'] = 'Enable DNS editor';
$lng['serversettings']['dnseditorenable']['description'] = 'Allows admins and customer to manage domain dns entries';
$lng['dns']['howitworks'] = 'Here you can manage DNS entries for your domain. Note that froxlor will automatically generate NS/MX/A/AAAA records for you. The custom entries are prefered, only missing entries will be automatically generated.';
$lng['serversettings']['dns_server']['title'] = 'DNS server daemon';
$lng['serversettings']['dns_server']['description'] = 'Remember that daemons have to be configured using froxlors configuration templates';

$lng['error']['domain_nopunycode'] = 'You must not specify punycode (IDNA). The domain will automatically be converted';
$lng['admin']['dnsenabled'] = 'Enable DNS editor';
$lng['error']['dns_record_toolong'] = 'Records/labels can only be up to 63 characters';

// Added in froxlor 0.9.37-rc1
$lng['serversettings']['panel_customer_hide_options']['title'] = 'Hide menu items and traffic charts in customer panel';
$lng['serversettings']['panel_customer_hide_options']['description'] = 'Select items to hide in customer panel. To select multiple options, hold down CTRL while selecting.';

// Added in froxlor 0.9.38-rc1
$lng['serversettings']['allow_allow_customer_shell']['title'] = 'Allow customers to enable shell access for ftp-users';
$lng['serversettings']['allow_allow_customer_shell']['description'] = '<strong class="red">Please note: Shell access allows the user to execute various binaries on your system. Use with extrem caution. Please only activate this if you REALLY know what you are doing!!!</strong>';
$lng['serversettings']['available_shells']['title'] = 'List of available shells';
$lng['serversettings']['available_shells']['description'] = 'Comma seperated list of shells that are available for the customer to chose from for their ftp-users.<br><br>Note that the default shell <strong>/bin/false</strong> will always be a choice (if enabled), even if this setting is empty. It is the default value for ftp-users in any case';
$lng['panel']['shell'] = 'Shell';
$lng['serversettings']['le_froxlor_enabled']['title'] = "Enable Let's Encrypt for the froxlor vhost";
$lng['serversettings']['le_froxlor_enabled']['description'] = "If activated, the froxlor vhost will automatically be secured using a Let's Encrypt certificate.";
$lng['serversettings']['le_froxlor_redirect']['title'] = "Enable SSL-redirect for the froxlor vhost";
$lng['serversettings']['le_froxlor_redirect']['description'] = "If activated, all http requests to your froxlor will be redirected to the corresponding SSL site.";
$lng['admin']['froxlorvhost'] = 'Froxlor VirtualHost settings';
$lng['serversettings']['option_unavailable_websrv'] = '<br><em class="red">Availble only for: %s</em>';
$lng['serversettings']['option_unavailable'] = '<br><em class="red">Option not availble due to other settings.</em>';
$lng['serversettings']['letsencryptacmeconf']['title'] = "Path to the acme.conf snippet";
$lng['serversettings']['letsencryptacmeconf']['description'] = "File name of the config snippet which allows the web server to serve the acme challenge.";
$lng['admin']['hostname'] = 'Hostname';
$lng['admin']['memory'] = 'Memory usage';
$lng['serversettings']['mail_use_smtp'] = 'Set mailer to use SMTP';
$lng['serversettings']['mail_smtp_host'] = 'Specify SMTP server';
$lng['serversettings']['mail_smtp_usetls'] = 'Enable TLS encryption';
$lng['serversettings']['mail_smtp_auth'] = 'Enable SMTP authentication';
$lng['serversettings']['mail_smtp_port'] = 'TCP port to connect to';
$lng['serversettings']['mail_smtp_user'] = 'SMTP username';
$lng['serversettings']['mail_smtp_passwd'] = 'SMTP password';
$lng['domains']['ssl_certificates'] = 'SSL certificates';
$lng['domains']['ssl_certificate_removed'] = 'The certificate with the id #%s has been removed successfully';
$lng['domains']['ssl_certificate_error'] = "Error reading certificate for domain: %s";
$lng['domains']['no_ssl_certificates'] = "There are no domains with SSL certificate";
$lng['admin']['webserversettings_ssl'] = 'Webserver SSL settings';
$lng['admin']['domain_hsts_maxage']['title'] = 'HTTP Strict Transport Security (HSTS)';
$lng['admin']['domain_hsts_maxage']['description'] = 'Specify the max-age value for the Strict-Transport-Security header<br>The value <i>0</i> will disable HSTS for the domain. Most user set a value of <i>31536000</i> (one year).';
$lng['admin']['domain_hsts_incsub']['title'] = 'Include HSTS for any subdomain';
$lng['admin']['domain_hsts_incsub']['description'] = 'The optional "includeSubDomains" directive, if present, signals the UA that the HSTS Policy applies to this HSTS Host as well as any subdomains of the host\'s domain name.';
$lng['admin']['domain_hsts_preload']['title'] = 'Include domain in <a href="https://hstspreload.appspot.com/" target="_blank">HSTS preload list</a>';
$lng['admin']['domain_hsts_preload']['description'] = 'If you would like this domain to be included in the HSTS preload list maintained by Chrome (and used by Firefox and Safari), then use activate this.<br>Sending the preload directive from your site can have PERMANENT CONSEQUENCES and prevent users from accessing your site and any of its subdomains.<br>Please read the details at <a href="https://hstspreload.appspot.com/#removal" target="_blank">hstspreload.appspot.com/#removal</a> before sending the header with "preload".';

$lng['serversettings']['nginx_http2_support']['title'] = 'Nginx HTTP2 Support';
$lng['serversettings']['nginx_http2_support']['description'] = 'enable http2 support for ssl. ENABLE ONLY IF YOUR Nginx SUPPORT THIS FEATURE. (version 1.9.5+)';

$lng['error']['noipportgiven'] = 'No IP/port given';
