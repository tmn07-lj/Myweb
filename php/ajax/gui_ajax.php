<?php

require '../mysql.php';

$sql = "SELECT entries.subject, entries.dateposted
FROM entries
ORDER BY dateposted ASC ;";

	$res =mysql_query($sql);
	$num = mysql_num_rows($res);
	$AR = array('num'=>$num);
	$i=1;
	while($row = mysql_fetch_assoc($res))
	{
		$ar2 = array();
		$ar2['subject'] = $row['subject'];
		$ar2['dateposted'] = $row['dateposted'];
		$AR[$i]=$ar2;
		$i++;
	}

	$js= json_encode($AR);
	echo $js;
?>