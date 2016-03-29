<?php

// require_once '../mysql.php';


// $AR = array('username' => $_POST['username']);

// echo $AR;
 // $js= json_encode($AR);
 // echo $js;

$message = $_POST['username']."\n".$_POST['tel'];

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);

// echo $message;
// Send
mail('qq519043202@sina.com', 'New guys coming', $message);//????????

echo $message;
?>