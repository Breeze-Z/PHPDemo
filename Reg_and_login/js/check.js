console.log('前台防止恶意注册');
/*function checkUser(str){
    var re = /^[\w\x80-\xff]{3,15}$/;
    if(!re.test(str)){
        alert('用户名不规范，请重新输入');
        return false;
    }else{
        return true;
    }
}

function check_password(str){
    var re=str.length;
    if(re<6){
        alert('密码长度要大于6位数');
        return false;
    }else{
        return true;
    }
}

function check_repass(pass,repass){
    if(pass!=repass){
        alert('密码不一致，请重新输入');
        return false;
    }else{
        return true;
    }
}

function check_email(str){
    var re=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if(!re.test(str)){
        alert('邮箱格式不规范，请重新输入');
        return false;
    }else{
        return true;
    }
}
*/
window.onload = function(){
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit=function(){
	var username = fm.username.value;
            if(username.length <2 || username.length > 20){
                    alert("用户名不得小于2位或不能大于20位");
                    fm.username.value = "";
                    fm.username.focus();
                    return false;
		}
	}
}


