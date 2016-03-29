<?php


if($_POST['submit']==1){
	require '../mysql.php';
	$sql = "SELECT * FROM categories WHERE cat = '".$_POST['cat']."';";
	$res = mysql_query($sql);
	$num = mysql_num_rows($res);
	//echo $num;
	if($num){
		$delsql = "DELETE FROM categories WHERE cat ='".$_POST['cat']."';";
		mysql_query($delsql);
	}
	else{
		$addsql = "INSERT INTO categories(cat) value('".$_POST['cat']."');";
		mysql_query($addsql);
	}
}
?>