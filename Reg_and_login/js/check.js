console.log('前台防止恶意注册');
window.onload = function(){
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit = function(){
            var username = fm.username.value;          
                if(!/^[\w\x80-\xff]{3,15}$/.test(username)){
                     alert('用户名不规范，请重新输入');
                     return false;
                }
            var password = fm.password.value;
                var re=password.length;
                if(re<6){
                    alert('密码长度要大于6位数');
                    return false;
                }
            var repass = fm.regpass.value;
                if(password!=repass){
                    alert('密码不一致，请重新输入');
                    return false;
                 }           
            var email = fm.email.value;
                if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email)){
                    alert('邮箱格式不规范，请重新输入');
                    return false;
                }
                
	}
}


