
var by = document.body;
//页面加载完毕时，定位光标位置
//（待改进，用户在页面为加载完毕就输入，当加载完毕，光标重新定位时，用户又要重新输入）
function cursor(TagName,num){
    document.getElementsByTagName(TagName)[num].select();   
}
by.onload=cursor('input',0);

//跳转函数(需要改进，低耦合)
var res = document.getElementsByTagName('input')[2];
function back(url){
//    function method(){
//        window.location.replace(url);
//        } 
alert()
}
res.onclick=back('./includes/logout.php');
