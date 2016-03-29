<?php
if (!session_id()) session_start();
if($_POST['submit']==1)
{
	require '../mysql.php';
	$mm = $_SESSION['USERID'];
	$sql = "UPDATE logins SET password = '".$_POST['new'].
			"' where id = ".$mm.";";
	mysql_query($sql);
	echo mysql_error();
}

?>