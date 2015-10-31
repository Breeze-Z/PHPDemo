<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'confing.php';
/**
 * Description of mysql_class
 *
 * @author weisen.zhang
 */
class DB {
    //put your code here
    static $_connect = null;
    static function connect(){
        if(self::$_connect){
            $conn=  mysql_connect(HOST,SQL_USER,SQL_PWD);
            if($conn){
                mysql_select_db(DB_NAME);
                mysql_query("set names'utf8'");
                self::$_connect=$conn;
            }else{
                exit('数据库连接错误');
            }
        }return self::$_connect;
    }
    static function close(){
        if(self::$_connect){
        mysql_close(self::$_connect);    
        }
}
}


