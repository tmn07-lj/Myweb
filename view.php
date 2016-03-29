<?php
if (!session_id()) session_start();
require("php/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset= "UTF-8">
    <title>Myblog</title>

    <link rel="stylesheet" type="text/css" href="css/Normalize.css">
    <link rel="stylesheet" type="text/css" href="css/c1.css">
<script charset="utf-8" src="kindeditor-4.1.10/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor-4.1.10/lang/zh_CN.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.scrollify.min.js"></script>
    <script src="js/simpler-sidebar.min.js"></script>
    <script type="text/javascript" src="js/my.js"></script>

</head>
<body>
<div class="main-wrapper">
    <header>
        <nav class = "panel">
            <div class="logo">
                    <a class="toggle-sidebar">荔枝</a>
                </div>
            <ul>
<?php
    require("php/mysql.php");
    require('php/login.php');
?>

            </ul>
        </nav>



<div class="sidebar" id="dowebok">
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li><a >关于作者</a></li>
            <li><a >源代码</a></li>
            <li><a >特别感谢</a></li>

        </ul>
    </div>
</div>

        <div id = "banner" class= "panel">

            <div class="inner">
                <h1><?php echo $Blog_name; ?></h1>
                <p class="sub-heading"><?php echo $Blog_introduce;?></p>
                <button  class="toggle-sidebar">About me</button>
            </div>
<div class = "log" style="display:none">

    <div class="logmenu">
    <span><img class = "logicon" src="img/delete.png"></span>
        <form class ="logform" method="post">
        <p class = "logsub">登陆</p>
            <tr><p>
账号：
<input type="text" name = "name">
</p>
            </tr>
            <tr><p>
密码：
<input type="password" name = "password"></p>
            </tr>
            <tr>
                <p><input class ="logbtn" type="submit" name = "login" value="login"></p>
            </tr>
        </form>
    </div>
</div>

<div class = "log" style="display:none">

    <div class="logmenu">
    <span><img class = "logicon" src="img/delete.png"></span>
        <form class ="logform" method="post">
        <p>注册的个说</p>
            <tr><p>
账&nbsp号&nbsp：
<input type="text" name = "name">
</p>
            </tr>
            <tr><p>
密&nbsp码&nbsp：
<input type="password" name = "password"></p>
            </tr>
            <p>
确认密码：
<input type="password" name = "password2"></p>
            <tr>
                <p>&nbsp&nbsp&nbsp&nbsp<input type="submit" name = "register" value="register"  onclick="check()"></p>
            </tr>
        </form>
    </div>
</div>

<!--            <div class="next">
                <span><a href="#page1">更多</a></span>
            </div>
        </div>
        -->

    </header><!--页头-->

<?php
    require("php/realview.php");//加载。。。。。
    ?>

<div class ="panel main-view">

    <span id = "view_img"><a href=<?php echo $Homepage  ?>><img class="classimg" src="img/left.png"></a></span>
    <h2 class="subject"><?php echo $row['subject']; ?></h2>
    <div class="hr"></div>
    <p class="sub-heading"><?php echo $post; ?></p>
    <div class = "body"><?php echo $row['body']; ?>
</div>
</div>
                    
<div class = "panel view-comments">
<h2 class="subject">COMMENTS</h2>
<div class="hr"></div>
    <ul class = "comments-list">
    <?php
    while($comrow = mysql_fetch_assoc($comres))
    {
        echo "<p class = 'title'>Comment by ".$comrow['name']." on ".$comrow['dateposted']."</p><br \>";
        echo $comrow['comment']."<br \>";
    }
    ?>
    </ul>

</div>

</div>
</body>
</html>