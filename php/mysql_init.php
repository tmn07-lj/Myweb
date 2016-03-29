<?php
//导入.sql
if($_POST['submit']==1)
{
	mysql_connect($_POST['db_host'], $_POST['db_user'], $_POST['db_pwd']);
	//$db_name=$_POST['db_name'];
	//$dbsql = "CREATE DATABASE IF NOT EXISTS `".$db_name."` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;";
	//echo $dbsql;
//mysql_query($dbsql);
//echo mysql_error();
//mysql_query("USE `".$db_name."`;");
//echo mysql_error();
	$sql = file_get_contents("blogtastic.sql");
	$a = explode(";", $sql);
	foreach ($a as $b) {
		$c=$b.";";
		mysql_query($c);
		echo mysql_error();
	}
}

?>