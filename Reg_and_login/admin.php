<html>
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            define('IN_TG',true);
            if(!isset($_SESSION['username'])){
            exit("未发现登录，请<a href='ad_login.html'>返回</a>");
            }
            require './includes/mysql.func.php';
            
        ?>
    </body>
</html>
