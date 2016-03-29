<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "root";
$dbdatabase = "blogtastic";

//防止手动更改域名
$db = mysql_connect($dbhost,$dbuser,$dbpassword);

$flag = @mysql_select_db($dbdatabase,$db);

if($flag)
{
    header("Location:../");
}

if(isset($_POST['db_host'])==false) {?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>blogC-install</title>
	<link rel="stylesheet" type="text/css" href="../css/c1.css">
	<link rel="stylesheet" type="text/css" href="../css/Normalize.css">

	<script src="../js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src ="../js/install.js"></script>
</head>
<body>
	<div class = "view-comments">
<h2 class="subject">INSTALL</h2>
<div class="hr"></div>
    <ul class = "install-list">
    <form id = "install">
    	数据库地址：<input type="text" id ="db_host">
    	<br \><br \><br \>
    	用&nbsp户&nbsp名：<input type="text" id ="db_user">
    	<br \><br \><br \>
    	&nbsp密&nbsp码&nbsp：<input type="text" id = "db_pwd">  
    	<span><input type="button" value="check" id ="check_button"></span>
  <span><input type="button" value="install" id ="install_button"></span>
    </form>
    </ul>

</div>
</body>
</html>
<?php }

if (isset($_POST['ceshi'])) {
    $con = @mysql_connect($_POST['db_host'], $_POST['db_user'], $_POST['db_pwd']); //分别是数据库主机,数据库名,数据库密码
    if (!$con) {
        die('test:error');
    } else {
        die('test:success');
    }
}

?>