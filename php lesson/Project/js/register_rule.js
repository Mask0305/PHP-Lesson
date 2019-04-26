  function chk(){

    var mail=document.send.email.value;
    var e_pattern = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var password = document.send.Pwd.value;
    var p_pattern = /^[\w]{4,15}/;
    var repassword = document.send.Repwd.value;
    var pwdHint = document.send.pwdHint.value;
    var pwdAns = document.send.pwdAns.value;

    if(e_pattern.test(mail)==false || mail==""){
    alert("E-mail格式錯誤");
    document.send.email.focus();
    return false;
    }

    if(p_pattern.test(password)==false || password==""){
    alert("密碼字符過少");
    document.send.Pwd.focus();
    return false;
    }

    if(password!=repassword){
    alert('密碼與確認密碼不相符');
    document.send.Repwd.focus();
    return false;
    }

    if(pwdHint==pwdAns){
    alert('密碼提示與答案不可相同');
    return false;
    }


return true;
};

