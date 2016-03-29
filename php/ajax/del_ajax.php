<?php 
require_once '../mysql.php';

if($_POST['submit']==1)
{
	$sql = "DELETE FROM entries WHERE id = '".$_POST['blog_id']."';";
	if(mysql_query($sql))
	{
		echo "删除成功";
	}
	else{
		echo "something wrong!";
	}
}


?>