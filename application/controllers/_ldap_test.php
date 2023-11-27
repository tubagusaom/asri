<html>
    <body>
        <h1>login ad asri</h1>
        <form action="ldap.php" method="POST">
        <input type="text" name="username"/><br>
        <input type="text" name="password"/><br>
        <input type="submit" value="login"/>
        </form>
    </body>
</html>

<?php
    //asri.local
    //asri\hardi.wasisto
    //Asri@123

    $user = strip_tags($_POST["username"]);
    $pass = stripslashes($_POST["password"]);
    $srvr   = "10.10.32.2";

   $conn=ldap_connect($srvr);

   if (!$conn) {
        $err = 'Gagal';
   }else{

        $err = 'Succes';

        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($conn, $user, $pass);

        if ($bind){

            $err_bind = 'succes bind';
            
            // Active Directory DN

            // $ldap_dn = 'DC=domain,DC=tld,DC=tld';
            $ldap_dn = 'DC=asri,DC=local';
            // $ldap_dn = "OU=Users,OU=citrix,DC=testdc,DC=com";
            // $ldap_dn = "cn=read-only-admin,dc=example,dc=com";

            // $filter = "(CN=AD-PIK)";
            // $filter = "(|(objectClass=organizationalUnit)(objectClass=group)(ou=users))";
            // $filter = "(CN=asri)";


            $fnames = "(name=ASGO)(name=CBA)(name=District8)(name=Fatmawati City Center)(name=Flix)(name=GGP-Mall)(name=HUBlife)(name=Menara Jakarta)(name=MOI)(name=PIK-Mall)(name=TARES)";
            // $filter = "(|$fnames (CN=Organizational-Unit))";

            $filter = "(|(name=ASGO)(objectClass=person)(objectClass=user))";

            $result = ldap_search($conn,$ldap_dn,$filter) or exit("Unable to search");
            $entries = ldap_get_entries($conn, $result);

            // $entries = '';
            // foreach ($entrie as $key => $value) {
            //     if (isset($value[$key]['cn'])) {
            //         $entries .= $value['cn'];
            //     }else {
            //         $entries .= 'null';
            //     }
            // }

        }else {
            $err_bind = 'error bind';
        }

   }

   // $datajson = (implode($entries[0]['member']));

   print_R(($entries[788]['cn']));
   print_R('<br><br>');

   print_R(count(($entries)));
   print_R('<br><br>');

   // var_dump(implode(',' , $entries)); die();
   var_dump(($entries[789])); die();

?>