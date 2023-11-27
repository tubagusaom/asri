<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['ldap_uri'] = array('ldaps://dc1.mycompany.com/', 'ldaps://dc2.mycompany.com/');
$config['use_tls'] = false;  // Using SSL above, don't use TLS with it
$config['search_base'] = 'DC=mycompany,DC=com';
$config['user_search_base'] = 'CN=Users,DC=mycompany,DC=com';
$config['group_search_base'] = 'CN=Users,DC=mycompany,DC=com';
$config['user_object_class'] = 'user';
$config['group_object_class'] = 'group';
$config['user_search_filter'] = '';
$config['group_search_filter'] = '';
$config['login_attribute'] = 'sAMAccountName';
$config['schema_type'] = 'ad'; // Could also use rfc2307bis
$config['proxy_user'] = '';  // Or CN=ProxyUser,CN=Users,DC=mycompany,DC=com
$config['proxy_pass'] = '';
$config['roles'] = array(1 => 'User', 
                    3 => 'Power User',
                    5 => 'Administrator');
$config['auditlog'] = 'application/logs/audit.log';


/* End of file adldap.php */
/* Location: ./system/application/config/adldap.php */