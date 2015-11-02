<?php
   header("Content-Type:text/html;charset=utf-8");
   @mysql_connect('localhost','root','') or die('数据库连接错误'.mysql_error());
   mysql_select_db('letter');
   mysql_query("set NAMES'utf8'");
   $listnum = 5;
   $page = $_GET['p'] ? $_GET['p'] : 1;
   $limit = ($page-1)*$listnum;
   $sql='SELECT * FROM guestbook ORDER BY id DESC LIMIT '.$limit.','.$listnum;
   $result=mysql_query($sql);
   if($result){
      while($content=mysql_fetch_array($result)){
        echo "<a href='#'>{$content['nickname']}</a><br/>\n";
        echo '时间：'.date('Y-m-d H:i',$content['createtime'])."<br/>\n";
        echo "内容是{$content['content']}<br/>\n<hr/>";             
      }
      }else{
    exit('数据查询错误'.mysql_error());
   }
   $sqlSum='SELECT COUNT(*) AS count FROM guestbook';
   $results=mysql_query($sqlSum);
   $lists=mysql_fetch_array($results);
   $sumpage=ceil($lists['count']/$listnum);
   if($sumpage>1){
    for($i=1;$i<=$sumpage;$i++){
      if($i==$page){
        echo "[$i]";
      }else{
        echo ' <a href="PHPpagename.php?p=',$i,'">',$i,'</a>';
      }
    }
   }
