<?php

require '../mysql.php';

$sql = "SELECT entries.id From entries ORDER BY rand() LIMIT 1;";

$res = mysql_query($sql);

$row = mysql_fetch_assoc($res);

$AR = array('id' => $row['id'] );

$js = json_encode($AR);

echo $js;
?>