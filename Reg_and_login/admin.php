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
            require './includes/common.func.php';
            DB::contect();
            $lists = 5;
            if($res = list_num($lists)){
                while($content = mysql_fetch_array($res)){
                    echo "内容：{$content['content']}<br/>";
                    echo '时间：'.date('Y-m-d H:i',$content['createtime'])."<br/>";
                    echo "作者：{$content['nickname']}<br/>";  
                    echo "<input type='button' id='reply' name='reply' value='回复'/>";
                    echo "<input type='button' id='delete' name='delete' value='删除'/><br/>";
                 }
           }
           paging($lists, 'admin.php');
           DB::close();
           ?>
    </body>
</html>
