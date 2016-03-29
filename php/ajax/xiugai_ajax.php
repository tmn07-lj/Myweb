<?php
require_once '../mysql.php';

if(isset($_POST['submit'])==TRUE&&$_POST['submit']==1){
		$body = mysql_real_escape_string($_POST['body']);
	$sql = "UPDATE entries SET cat_id = ".$_POST['cat_id'].",subject = '".$_POST['subject'].
			"',body='".$body."' where id = '".$_POST['yuan']."';";
	echo $sql;			
	mysql_query($sql);

	echo mysql_error();
}

?>