<?php
ini_set( 'default_charset' , "UTF-8" );
//ini_set( 'default_charset' , "iso-8859-1" );
setlocale (LC_TIME, 'fr_FR.utf8','fra');
error_reporting(E_ALL ^ E_NOTICE);


$db_server = "localhost";
$db_user = "root";
$db_password = "l33t43v3r";
$db_name = "life_achievements";
$db_dsn = 'mysql:dbname='.$db_name.';host='.$db_server;



try {
    $dbh = new PDO($db_dsn, $db_user, $db_password);
} catch(PDOException $e) {
    print $e->getMessage();
}  

require('class.php');

require('functions_generic.php');
require('functions_db.php');

$_Debug = array();
?>