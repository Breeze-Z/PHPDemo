<?php
if(!defined('IN_TG')){
    exit('非授权无法调用此页面!');
}
//判断录入信息是否符合规范
function check_username($username){
    if(!preg_match('/^[\w\x80-\xff]{3,15}$/',$username)){
        exit("输入的用户名格式不符合规范，请重新输入<a href='javascript:history.back(-1)'>返回</a>");
    }
    return $username;
}
function check_password($password){
    if(strlen($password)<6){
        exit("您输入的密码小于六位数，请重新输入<a href='javascript:history.back(-1)'>返回</a>");
    }
    return $password;
}
function check_regpass($password,$regpass){
    if(!($password==$regpass)){
        exit("您输入的密码不一致，请重新输入<a href='javascript:history.back(-1)'>返回</a>");
    }
}
function check_email($email){
    if(!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',$email)){
        exit("您输入的邮箱不符合规范，请重新输入<a href='javascript:history.back(-1)'>返回</a>");
    }
    return $email;
}
