<?php
define('IN_TG',true);
session_start();
header('Content-Type:text/html;charset=utf-8');
if(($_POST['submit']!='提交')&&!defined('IN_TG')){
        header('refresh:3;url=./login.html');
        exit('非法访问此页面,'."<br/>".'将在3秒，跳转回登录页');   
}
require './includes/mysql.func.php';
$nickname = $_SESSION['username'];//用户名出现为空现象
$content = $_POST['content'];
$createtime = time();
$sql='INSERT INTO '.TABLEb.'(nickname, content, createtime) values('."'{$nickname}','{$content}','{$createtime}')";
DB::contect();
$res = mysql_query($sql);
if($res){
    header("location:home.php");
    echo 'd';
}else{
    header("refresh:3;url=./home.php");
    exit('数据插入失败'.  mysql_error());
}
