<?php
require_once '../mysql.php';
if($_POST['submit']==1){

	$sql = "SELECT entries.id FROM entries WHERE subject = '".$_POST['subject']."';";
	$res=mysql_query($sql);
	$num = mysql_fetch_assoc($res);
	$comment = mysql_real_escape_string($_POST['comment']);
	$sql = "insert into comments(blog_id,dateposted,name,comment) values(".$num['id'].",now(),'"
			.$_POST['name']."','".$comment."');";
	mysql_query($sql);
}
else{
	//nothing
}
$AR = array('name' => $_POST['name'], 'comment'=>$_POST['comment']);
$js= json_encode($AR);
echo $js;
?>
