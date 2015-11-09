<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
define('IN_TG',true);
if(($_POST['submit']!='登录')){
    exit("非法访问，请返回<a href='ad_login.html'>返回</a>");
}
require './includes/mysql.func.php';
$username = $_POST['username'];
$password =  md5($_POST['password']);
$sql = "SELECT uid FROM user where username='$username' AND password='$password'";
echo $sql;
DB::contect();
$res = mysql_query($sql);
if(mysql_fetch_array($res)){
    $_SESSION['username'] = $username;
    header("location:admin.php");
}else{
    exit('密码或账户错误，请重试');
}
DB::close();
