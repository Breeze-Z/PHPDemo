<?php
/**
 * 显示数据数量函数
 * @param num $lists
 * @return result $res
 */
function list_num($lists){
    @$page = $_GET['p'] ? $_GET['p'] : 1;
    $limit = ($page - 1) * $lists;
    $sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT $limit,$lists";
    $res = mysql_query($sql );
    if($res){
        //返回数组，降低耦合
        return $res ;
    }else{
        exit('数据查询错误'.mysql_error());
    }
}
/**
 * 分页函数
 * @param type $lists
 * @param type $url
 */
function paging($lists,$url){
    $sql = "SELECT COUNT(*) AS count FROM guestbook";
    @$p = $_GET['p'] ? $_GET['p'] : 1;
    $res = mysql_query($sql);
    if(!$res){
        exit('数据查询错误'.  mysql_error());
    }
    $num = mysql_fetch_array($res);
    $page = ceil($num['count']/$lists);
    echo "共有{$num['count']}条留言:";
    if($page>1){
        for($i=1;$i<=$page;$i++){
            if($i == $p){
                echo " [$i] ";
            }else{
                echo '<a href="',$url,'?p=',$i,'"> ',$i,' </a>';                
            }
        }
    }else{
            exit('数据查询失败 '.mysql_error());
        }
}


