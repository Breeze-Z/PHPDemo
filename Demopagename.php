<?php
//数据库连接
header("Content-Type:text/html; charset=utf-8");
@mysql_connect("localhost","root","") or die("连接数据库失败：".mysql_error());
mysql_select_db("letter");
mysql_query("set names'utf8'");

//每页显示的留言数
$pagesize = 4;

//确定页数 p 参数
$p = $_GET['p']?$_GET['p']:1;

//数据指针
$offset = ($p-1)*$pagesize;

//查询本页显示的数据
$query_sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT  $offset , $pagesize";
//echo $query_sql;
$result = mysql_query($query_sql);
//循环输出
while($gblist = mysql_fetch_array($result)){
    echo '<a href="',$gblist['nickname'],'">',$gblist['nickname'],'</a>';
    echo '发表于：',date("Y-m-d H:i", $gblist[createtime]),'<br />';
    echo '内容：',$gblist['content'],'<br /><hr />';
}

//分页代码
//计算留言总数
$count_result = mysql_query("SELECT count(*) as count FROM guestbook");
$count_array = mysql_fetch_array($count_result);

//计算总的页数
$pagenum=ceil($count_array['count']/$pagesize);
echo '共 ',$count_array['count'],' 条留言';

//循环输出各页数目及连接
if ($pagenum > 1) {
    for($i=1;$i<=$pagenum;$i++) {
        if($i==$p) {
            echo ' [',$i,']';
        } else {
            echo ' <a href="Demopagename.php?p=',$i,'">',$i,'</a>';
        }
    }
}
?>

