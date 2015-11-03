<?php
header("Content-Type:text/html;charset=utf-8");
define('IN_TG', true);
//if(!isset($_POST['submit'])){
//    exit('无权限访问此页面');
//}
require '/includes/mysql.func.php';
require '/includes/check.func.php';
/*字符正则表达式匹配
    1. GBK (GB2312/GB18030)
    \x00-\xff  GBK双字节编码范围
    \x20-\x7f  ASCII
    \xa1-\xff  中文
    \x80-\xff  中文

    2. UTF-8 (Unicode)
    \u4e00-\u9fa5 (中文)
    \x3130-\x318F (韩文
    \xAC00-\xD7A3 (韩文)
    \u0800-\u4e00 (日文)
    ps: 韩文是大于[\u9fa5]的字符
 *  */
$username = check_username($_POST['username']);
$password = check_password($_POST['password']);
$regpass = check_regpass($_POST['password'],$_POST['regpass']);
$email = check_email($_POST['email']);
//$username = check_username('张伟森');
//$password = check_password(123456);
//$regpass = check_regpass(123456,123456);
//$email = check_email('123@qq.com');

//匹配用户名是否重复
DB::contect();
$sql="SELECT uid FROM `user` WHERE username='$username' ";
$result=mysql_query($sql);
if(mysql_fetch_array($result)){
    exit("您输入的用户名已被占用，请重新输入<a href='javascript:history.back(-1)'>返回</a>");
}
$password=md5($password);
$createdate=  time();
$sql="INSERT INTO user(username,password,email,createdate)VALUES('$username','$password','$email',$createdate)";
$result1=mysql_query($sql);
if($result1){
    exit("注册成功，请登录<a href='login.html'>登录</a>");
}else{
    exit('数据插入失败'.  mysql_error()."请重新输入<a href='javascript:hostory.back(-1)'>返回</a>");
}
DB::close();


