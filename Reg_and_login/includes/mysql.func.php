<?php
//防止恶意调用
if( !defined('IN_TG')){
     exit('非授权无法调用此页面!');
 }
 require './confing.php';
class DB{
    static $_connect = null;
    static function contect(){
        if(!self::$_connect){
            @$conn=  mysql_connect(HOST,SQLUER,SQLPW) or die('数据库连接错误'.mysql_error()); 
            mysql_select_db(SQLDB);
            mysql_query("set character set'utf8'");
            mysql_query("set names 'utf8'");	
            self::$_connect=$conn;
            
        }return self::$_connect;
    }
    static function close(){
        if(self::$_connect){
            mysql_close(self::$_connect);
        }
    }
}

