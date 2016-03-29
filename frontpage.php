<!DOCTYPE html>
<html>
<head>
    <meta charset= "UTF-8">
    <title>Myblog</title>

    <link rel="stylesheet" type="text/css" href="css/Normalize.css">
    <link rel="stylesheet" type="text/css" href="css/c1.css">
</head>
<body>
<div class="main-wrapper">
    <header>
        <nav class = "panel">
            <div class="logo">
                    <a class="toggle-sidebar">芹菜</a>
                </div>
            <ul>
<?php
    require('php/login.php');
?>

            </ul>
        </nav>



<div class="sidebar" id="dowebok">
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li><a >关于作者</a></li>
            <li><a target="_blank" href="https://github.com/qq519043202/Myweb">源代码</a></li>
            <li><a >特别感谢</a></li>

        </ul>
    </div>
</div>

<div class="sidebar" id="ce5">
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li><a >个人信息</a></li>
            <li><a id = 'xiugai_pass'>忘记密码</a></li>
            <?php
            if($_SESSION['priority']==2)
                echo "<li><a id = 'rz'>实名认证</a></li>";
            else
                echo "<li>已通过实名认证</li>"
            ?>

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


    <div class = "content">

    <div class="sidebar" id="ce2">
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav" id = "catnav">

            <li><a class ='ce4opener' ></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
            <li><a class ='ce4opener'></a></li>
        <?php
            if(isset($_SESSION['priority'])==TRUE&&$_SESSION['priority']==1)
                echo "<li id = 'cat_xiugai'><a>增/删</a></li>";
            ?>
        </ul>
    </div>
    </div>

    <div class="sidebar" id="ce3">
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class = "view"><a>详情</a></li>
        <?php
        if(isset($_SESSION['priority']))
        {
            echo '<li id = "xiugai"><a>修改</a></li>
            <li id = "add"><a>添加</a></li>
            <li id ="del"><a>删除</a></li>';
        }
            
        ?>
            <li id = "search"><a>查找</a></li>
            <li id = "random"><a>随机</a></li>
            <li class = 'ce4opener' id ="gui"><a>归档</a></li>
        </ul>
    </div>
</div>

<div class="sidebar" id="ce4"><!--分类下的文章-->
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav" id = "entnav">
        <li><a></a></li>
        </ul>
    </div>
</div>


        <section class="green-section panel">
            <div class="wrapper">
                <span id ="ce2opener"><img class="classimg" title="分类" src="img/stars.png"></span>
    <?php
        if(isset($_SESSION['USERNAME'])==TRUE){
            echo '<span id ="ce3opener"><img class="classimg" src="img/tag.png" title="功能"></span>';
        } 
                ?>
                <div>
                <form id = "xiugaiform">
                    
                
                <h2><?php echo '<a class="main-subject view" id ="'.$mainrow['id'].'">'.$mainrow['subject'].'</a>'?></h2>
                
                <div class="hr"></div>
                <p class="sub-heading post-sub"><?php echo $post;?></p>
                <div class="main-entry">
                <?php echo $mainrow['body'];?>
                </div>
                </form>
                </div>

                <div class="icon-group">
                    <span class = "icon"><?php echo "点赞：".$good; ?></span>
                    <span class = "icon"><?php echo "评论：".$comrownum?></span>
                    <span class = "icon">差评</span>
                </div>
            </div>
        </section>


        <section class="gray-section panel">

        <div class="article-preview">
            <div class = "img-section">
                <img src="img/linai03.png" alt="linai">
            </div>
<?php
    if($comrownum >=2)
    {
?>  <div class="test-section">

                <h2>最新评论</h2>
                <div class="sub-heading">
                    by <?php  echo $comrow1['name']; ?>
                </div>
                <div class="com1">  <?php  echo $comrow1['comment']; ?>
                </div>
            </div>

        </div>

        <div class="article-preview">
            <div class="test-section">
                <h2 class="h2">第一条评论</h2>
                <div class="sub-heading">
                    by <?php echo $comrow2['name']; ?>
                </div>
                <div class="com2"><?php echo $comrow2['comment'];  ?>
                </div>
            </div>
            <div class = "img-section">
                <img src="img/linai02.jpg" alt="linai">
            </div>
        </div>

<?php } elseif ($comrownum ==1) {
    ?>
        <div class="test-section">

                <h2>最新评论</h2>
                <div class="sub-heading">
                    by <?php  echo $comrow1['name']; ?>
                </div>
                <div class="com1">  <?php  echo $comrow1['comment']; ?>
                </div>
            </div>

        </div>
                <div class="article-preview">
            <div class="test-section">
                <h2 class="h2">然后就</h2>
                <div class="sub-heading">
                    没有评论了
                </div>
                <div class="com2">么么哒
                </div>
            </div>
            <div class = "img-section">
                <img src="img/linai02.jpg" alt="linai">
            </div>
        </div>

<?php }
    else{
        ?>      <div class="test-section">

                <h2> 最新评论</h2>
                <div class="sub-heading">
                    这里空荡荡的
                </div>
                <div class="com1">  亲，写评论呗！
                </div>
            </div>

        </div>
    <div class="article-preview">
            <div class="test-section">
                <h2 class="h2"></h2>
                <div class="sub-heading">
                    
                </div>
                <div  class="com2">
                </div>
            </div>
            <div class = "img-section">
                <img src="img/linai02.jpg" alt="linai">
            </div>
        </div>

<?php   }

?>
</section>
<section class = "commit">
<div class="commit-div panel" name ="06" id="06">
    <div class = "float">
            <div class = "img-section">
                <img src="img/linai01.png" alt="linai">
            </div>
            <div class="test-section">
            <h2>Leave a comment</h2>
            <form id = "comform">
                <tr>
                    <td><p>your name:<input type="test" name = "name"></p></td>
                </tr>
                <tr><td>
                    <p>comment:<textarea class ="editor_id" name="content" style="width:700px;height:400px;"></textarea></p>
                </td></tr>
                <tr><p>&nbsp&nbsp<input class="submit" type="button" value="submit"></p></tr>
            </form>
            </div>
    </div>
    <div class="abs"><p class ="commited">还未提交评论</p></div>
    <div class = "float">

    </div>
</div>
</section>


<!--
     <section class="purple-section panel">
            <div class="heading-wrapper">
                <h2>还是标题</h2>
                <div class="hr"></div>
                <div class="sub-heading">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                </div>
            
            <div class="card-gourp clear  panel">
                <div class="card">
                    <h3>第n个标题</h3>
                <p>Lorem ipsum dolor sit amet, </p>
                </div>
                <div class="card">
                    <h3>第n+1个标题</h3>
                <p>Lorem ipsum dolor sit amet, </p>
                </div>
                <div class="card">
                    <h3>第n个标题</h3>
                <p>Lorem ipsum dolor sit amet, </p>
                </div>
                <div class="card">
                    <h3>第n+1个标题</h3>
                <p>Lorem ipsum dolor sit amet, </p>
                </div>
                <div class="card">
                    <h3>第n个标题</h3>
                <p>Lorem ipsum dolor sit amet, </p>
                </div>
                <div class="card">
                    <h3>第n+1个标题</h3>
                <p>Lorem ipsum dolor sit amet, </p>
                </div>
            </div>
            </div>
        </section>
-->
    </div><!--正文-->

    <footer>
        <ul class="share-group panel">
        <li><img src="img/github.png"></li>
            <li><img src="img/twitter.png"></li>
            <li><img src="img/google.png"></li>
            <li><img src="img/facebook.png"></li>
            <li><img src="img/tumblr.png"></li>

        </ul>
        <div class="copy">
            &copy Tmn - 2015
        </div>
    </footer><!--页脚-->
    </div>



    <script charset="utf-8" src="kindeditor-4.1.10/kindeditor.js"></script>
    <script charset="utf-8" src="kindeditor-4.1.10/lang/zh_CN.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.scrollify.min.js"></script>
    <script src="js/simpler-sidebar.min.js"></script>
    <script type="text/javascript" src="js/my.js"></script>



</body>
</html>