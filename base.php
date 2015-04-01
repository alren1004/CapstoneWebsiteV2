<?php

session_start();

$db_host = "localhost";
$db_name = "capstone";
$db_user = "root";
$db_pass = "sesame";

mysql_connect($db_host, $db_user, $db_pass) or die("MySQL Error: " . mysql_error());
mysql_select_db($db_name) or die("MySQL Error: " . mysql_error());

?>