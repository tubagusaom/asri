<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// $config['ldap_uri'] = 'http://localhost/asri_connect';
// $config['use_tls'] = false;  // Using SSL above, don't use TLS with it

// $config['search_base'] = 'DC=asri,DC=local';

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





$config['account_suffix']   = 'DC=asri,DC=local';
$config['search_base']      = 'DC=asri,DC=local';
$config['object_class']     = '(objectClass=person)(objectClass=user)';

// $config['search_filter'] = '(name=ASGO)(name=CBA)(name=District8)(name=Fatmawati City Center)(name=Flix)(name=GGP-Mall)(name=HUBlife)(name=Menara Jakarta)(name=MOI)(name=PIK-Mall)(name=TARES)';

$config['search_filter']    = '(name=ASGO)';

/* End of file config_ad.php */
/* Location: ./system/application/config/config_ad.php */