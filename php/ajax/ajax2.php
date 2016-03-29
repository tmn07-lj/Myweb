<?php

require_once '../mysql.php';

if(isset($_POST['id'])==TRUE)
{
	$sql = "SELECT * FROM entries where cat_id =".$_POST['id'].";";
	$res =mysql_query($sql);
	$num = mysql_num_rows($res);
	$AR = array('num'=>$num);
	$i=1;
	while($row = mysql_fetch_assoc($res))
	{
		$AR[$i]=$row['subject'];
		$i++;
	}

	$js= json_encode($AR);
	echo $js;
}
else{

}
?>