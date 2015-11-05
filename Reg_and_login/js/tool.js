
var by = document.body;
//页面加载完毕时，定位光标位置
//（待改进，用户在页面为加载完毕就输入，当加载完毕，光标重新定位时，用户又要重新输入）

function cursor(TagName){
    document.getElementsByTagName(TagName)[0].select();   
}
by.onload=cursor('input');
