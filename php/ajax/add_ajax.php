<?php

if (!session_id()) session_start();

require_once '../mysql.php';
if($_POST['submit']==1)
{
	$subject= $_POST['subject'];
	$cat_id= $_POST['cat_id'];
	//$body=$_POST['body'];
	$body = mysql_real_escape_string($_POST['body']);
	$sql = "insert into  entries(cat_id,wri_id,dateposted,subject,body) value(".
			 $cat_id.",".$_SESSION['USERID'].",NOW(),'".$subject."','".$body."');";
	// echo $sql;
	$res = mysql_query($sql);
	echo  mysql_error();
}


?>