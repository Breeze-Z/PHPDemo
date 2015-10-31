<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('DEBUG',true);
define('HOST','localhost');
define('DB_NAME','letter');
define('SQL_USER','root');
define('SQL_PWD','');
define('DB_TABLE_A','guestBook');
define('DB_TABLE_B','user');
define('PAGE',5);

if(DEBUG){
    ini_set('display_errors',1);
    error_reporting(E_ALL);
}

