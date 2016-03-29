<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "root";
$dbdatabase = "blogtastic";


$db = mysql_connect($dbhost,$dbuser,$dbpassword);

$flag = @mysql_select_db($dbdatabase,$db);

if(!$flag)
{
	header("Location:php/install.php");
}

echo  mysql_error();

?>

