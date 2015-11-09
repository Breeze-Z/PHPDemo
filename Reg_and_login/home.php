<!DOCTYPE html>
<html>
<head>
	<title>评论页</title>
</head>
<body>
<?php
    define('IN_TG',true);
    session_start();
    header("Content-Type:text/html;charset=utf-8");
    require './includes/mysql.func.php';
    require './includes/common.func.php';
    //判断session 是否退出
    if(@$_GET['action']=='logout'){
        unset($_SESSION['username']);
        unset($_SESSION['UID']);
        exit('注销登录成功！点击此处 <a href="login.html">登录</a>');
    }
    //判断session是否登录
    if(!isset($_SESSION['username'])){
        header("refresh:3;url=./login.html");
        exit('未登录!<br>三秒后自动跳到登录页面......') ;  
    } 
    $username = $_SESSION['username'];
    DB::contect();
    $lists = 5;
    if($resu = list_num($lists)){
        while($content = mysql_fetch_array($resu)){
            echo "用户名：{$content['nickname']}<br/>";
            echo "内容：{$content['content']}<br/>";
            echo "时间：".date('Y-m-d H:i',$content['createtime']);
            echo "<hr/>";
       }
    }
    paging($lists, 'home.php');
    DB::close();
?>
    <!--内同提交模块-->
    <form action="push.php" method="post">
        <ul>
            <li>内容：
                <input type="text" name="content" value=""/>
            </li>
            <li>　　
                <input type="submit" name="submit" value="提交" />
                <input type="button" id="back" name="back" value="退出" />
            </li> 
            <li>——当前用户：<?php echo $_SESSION['username']?></li> 
        </ul>
    </form>
    <script type="text/javascript" src="./js/tool.js"></script>
</body>
</html>