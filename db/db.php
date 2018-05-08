<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();


$servername = "localhost";
$username = "roo";
$password = "​";
$database = "test";

// Create connection
//$db = new mysqli($servername, $username, $password,$database);

 $db_host="uprios.org.in";
        $db_user="admin_user";
        $db_pass="Root@123";
        $db_name="admin_uprios";
        $db_table="tblname";

        mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
        mysql_select_db($db_name) or die(mysql_error());
    
    
     


?>