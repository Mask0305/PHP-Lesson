  function chk(){

    var mail=document.send.email.value;
    var e_pattern = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var password = document.send.Pwd.value;
    var p_pattern = /^[\w]{4,15}/;
    

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

return true;
};

