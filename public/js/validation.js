window.onload = function(){
    /*各画面オブジェクト*/
    const btnSubmit = document.getElementById('btnSubmit');
    const inputName = document.getElementById('inputName');
    const inpuinputTeltAge = document.getElementById('inputTel');
    const inputMail = document.getElementById('inputMail');
    const inputContact = document.getElementById('inputContact');
    const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;

    // console.log(inputName);
    // console.log(inputContact);    
    
    btnSubmit.addEventListener('click', function(event) {
        let message = [];
        /*入力値チェック*/
        if(inputName.value ==""){
            message.push("氏名が未入力です。");
        }
        if(inputTel.value==""){
            message.push("電話番号が未入力です。");
        }
        if(inputContact.value==""){
            message.push("お問い合わせ内容が未入力です。");
        }
        if(inputMail.value==""){
            message.push("メールアドレスが未入力です。");
        }else if(!reg.test(inputMail.value)){
            message.push("メールアドレスの形式が不正です。");
        }
        
        if(message.length > 0){
            alert(message);
            return;
        }else{
            alert('入力チェックOK');
            location.href="/user/contact-views";      
        }
    });
};