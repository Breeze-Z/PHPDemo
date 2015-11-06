//需加强Js编写函数能力 低耦合  
var by = document.body;
//页面加载完毕时，定位光标位置
//（待改进，用户在页面为加载完毕就输入，当加载完毕，光标重新定位时，用户又要重新输入）
function cursor(TagName,num){
    document.getElementsByTagName(TagName)[num].select();   
}
by.onload=cursor('input',0);

//单击button 注销登录
var res = document.getElementById('back') .onclick = function()
       {
           window.location.href="login.php?action=logout";  
       } 
