 <?php   
if(isset($_POST['register'])==TRUE)
{
	$checksql = "SELECT username FROM logins WHERE username = '".
	$_POST['name']."';";
	$res = mysql_query($checksql);
	$row = mysql_num_rows($res);
	#echo $row;
	echo mysql_error();
	if($row !=0 )
	{
		$_SESSION['error2']=1;
    	header("Location:".$Homepage);
	}	
	elseif($_POST['password']!=$_POST['password2']){
		$_SESSION['error3']=1;
    	header("Location:".$Homepage);
	}
	elseif($_POST['name']==""||$_POST['password']=="")
	{
		$_SESSION['error4']=1;
    	header("Location:".$Homepage);
	}
	else{
	$sql = "INSERT INTO logins  VALUES (NULL,'".
		$_POST['name']."','".$_POST['password']."',2);";
mysql_query($sql);
	$idsql = "SELECT * FROM logins WHERE username = '".$_POST['name']."';";
	$res = mysql_query($idsql);
	$row = mysql_fetch_assoc($res);
	echo mysql_error();
	$_SESSION['USERNAME'] = $_POST['name'];
	$_SESSION['USERID'] = $row['id'];
	$_SESSION['priority'] = $row['priority'];
	#header("Location:".$config_basedir);
	}
}

else{
	if(isset($_SESSION['error2'])==TRUE&&$_SESSION['error2']==1)
	{
		?>
		<li id = "tip2">该账号名已被注册</li>

		<?php
		unset($_SESSION['error2']);
	}
		if(isset($_SESSION['error3'])==TRUE&&$_SESSION['error3']==1)
	{
		?>
		<li id = "tip3">两次密码不一致</li>

		<?php
		unset($_SESSION['error3']);
	}

		if(isset($_SESSION['error4'])==TRUE&&$_SESSION['error4']==1)
	{
		?>
		<li id = "tip3">不能为空！</li>

		<?php
		unset($_SESSION['error4']);
	}
}



 if(isset($_POST['login'])==TRUE)
    {
      $sql = "select * from logins where username = '".$_POST['name']."'and password='".
			$_POST['password']."';";
	$result = mysql_query($sql);
	$numrow = mysql_num_rows($result);
	if($numrow==1){
		$row = mysql_fetch_assoc($result);
		$_SESSION['USERNAME'] = $row['username'];
		$_SESSION['USERID'] = $row['id'];//会话变量
		$_SESSION['priority'] = $row['priority'];
    }
    else{
    	$_SESSION['error1']=1;
    	header("Location:".$Homepage);
    }
}
else{
	if(isset($_SESSION['error1'])==TRUE&&$_SESSION['error1']==1)
	{
		?>
		<li id = "tip1">信息有误，请重新登陆</li>

		<?php
		unset($_SESSION['error1']);
	}
}


if(isset($_SESSION['USERNAME'])==TRUE)
    {
        echo     '<li><a href="#" class = "logname selfopener">'.$_SESSION['USERNAME'].'</a></li>
        <li><a href="php/logout.php">注销</a></li>'.
        '<input type ="hidden" id = "pri" value="'.$_SESSION['priority'].'"/>';
}
else{
   echo   '<li id ="login"><a href="#">登陆</a></li>
   <li id = "register"><a href="#">注册</a></li>';
}
    ?>
