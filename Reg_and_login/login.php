<?php
session_start();//记得检测是否退出消除session
header("Content-Type:text/html;charset=utf-8");
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
}
define('IN_TG',true);
require './includes/check.func.php';
require './includes/mysql.func.php';
if($_POST['submit']!=='登录'){
    exit('无权访问此页面！');
}
$username = check_username($_POST['username']);
$password = md5(check_password($_POST['password']));
DB::contect();
$sql="select uid from user where username='$username' and password='$password' limit 1";
$result=mysql_query($sql);
if( $res = mysql_fetch_array($result)){
    $_SESSION['username']=$username;
    $_SESSION['UID']=$res['uid'];
        echo $username,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
	echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
	exit;
}else{
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
DB::close();


