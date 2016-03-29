<?php
if($_POST['submit']==1)
{
	require '../mysql.php';	

$sql ="SELECT entries.id FROM entries where subject LIKE '%".$_POST['keyword']."%' LIMIT 1;";

$res = mysql_query($sql);

$row = mysql_fetch_assoc($res);

$AR = array('id' => $row['id'] );

$js = json_encode($AR);

echo $js;
}
