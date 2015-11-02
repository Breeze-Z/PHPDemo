<?php
    header("Content-Type:text/html;charset=utf-8");
    @mysql_connect('localhost','root','') or die('数据库连接错误'.mysql_error());
    mysql_select_db('letter');
    mysql_query("set names 'utf8'");
    $limenum = 5;
    $nowPage = $_GET['p'] ? $_GET['p'] : 1;
    $limen = ($nowPage-1) * $limenum;
    $sql='SELECT * FROM guestbook ORDER BY id DESC LIMIT '.$limen.','.$limenum;
    $result = mysql_query($sql);
    if($result){
      while($content=mysql_fetch_array($result)){
        echo "作者：{$content['nickname']}</a><br/>\n";
        echo "时间：".date('Y-m-d H:i',$content['createtime'])."<br/>\n";
        echo "内容：$content[content]<br/>\n<hr/>";
      }
    }else{
      exit('数据查询失败');
    }

    $SQLnums = 'SELECT COUNT(*) AS count FROM guestbook';
     $results= mysql_query($SQLnums);
     $sumpage = mysql_fetch_array($results);
    $pagenums = ceil($sumpage['count']/$limenum);
    if($pagenums>1){
      for($i=1;$i<=$pagenums;$i++){
        if($i==$nowPage){
          echo "[$i]";
        }else{
          echo ' <a href="PHPpagename.php?p='.$i.'">'.$i.'</a>';
        }
      } 
    }

    
    

       