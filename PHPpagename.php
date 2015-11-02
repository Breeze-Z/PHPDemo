<?php
    header("Content-Type:text/html; charset=utf-8");
    @mysql_connect('localhost','root','')or dir(mysql_error());
    mysql_select_db('letter');
    mysql_query("set names 'utf8'");
    $pagelise = 5;
    $pagenum = $_GET['p'] ? $_GET['p'] : 1;
    $limen = ($pagenum-1) * $pagelise;
    $sql='SELECT * FROM guestbook ORDER BY id DESC LIMIT '. $limen.','. $pagelise ;
    $restult = mysql_query($sql);
    if($restult){
        while($listname = mysql_fetch_array($restult)){           
            echo "<a href='#'>{$listname['nickname']}</a><br/>\n";
            echo '时间：'.date('Y-m-d H:i',$listname['createtime'])."<br/>\n";
            echo "内容是{$listname['content']}<br/>\n<hr/>";                      
        }
    }else{
        echo '查询错误';
    }
    $sqlnums = "SELECT COUNT(*) AS count FROM guestbook";
    $results =  mysql_query($sqlnums);
    $pagenums = mysql_fetch_array($results);  
    $page = ceil($pagenums['count']/$pagelise);
    if($page>1){
      for($i=1;$i<=$page;$i++){
          if($i==$pagenum){
              echo "[$i]";
          }else{
               echo ' <a href="PHPpagename.php?p=',$i,'">',$i,'</a>';
                  
              }
          }
      }
        
    
    

