<!DOCTYPE html>
<html>
<head>
	<title>评论页</title>
</head>
<body>
<?php
    //内容显示，分页模块
    session_start();
    header("Content-Type:text/html;charset=utf-8");
    if(!isset($_SESSION['username'])){
        header("refresh:3;url=./login.html");
        echo '未登录!<br>三秒后自动跳到登录页面......';  
    }
    define('IN_TG',true);
    $username = $_SESSION['username'];
    require './includes/mysql.func.php';
    DB::contect();
    $lists = 5;
    $page = $_POST['p'] ? $_POST['p'] : 1;
    $limit = ($page-1) * $lists;
    $sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT $limit,$lists";
    $result = mysql_query($sql);
    if($result){
        while($content = mysql_fetch_array($result)){
            echo "用户名：{$content['nickname']}<br/>";
            echo "内容：{$content['content']}<br/>";
            echo "时间：".date('Y-m-d H:i',$content['createtime']);
            echo "<hr/>";
        }
    }else{
        exit('数据查询失败 '.mysql_error());
    }
    $sqlsum="SELECT COUNT(*) as count FROM guestbook";
    $res = mysql_query($sqlsum);
    if($res){
    $sum = mysql_fetch_array($res);
    $pages = ceil($sum['count']/$lists);
    echo "共有{$sum['count']}条留言　　";
    for($i=1;$i<=$pages;$i++){
        if($i==$page){
            echo "[$i]";
        }else{
            echo "<a href='Demopagename.php?p=$i'>$i</a>";
        }
    }
    }else{
        exit('数据查询失败 '.mysql_error());
    }
    

?>
    <!--内同提交模块-->
    <form action="">
        <ul>
            <li>内容：<input type="text" name="content" value=""/></li>
            <li>　　<input type="submit" name="submit" value="提交"/></li> 
            <li>——当前用户：<?php echo $username?></li> 
        </ul>
    </form>
</body>
</html>