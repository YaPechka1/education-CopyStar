let loginMessage = document.querySelector('.login');
let passwordMessage = document.querySelector('.password');
let totalMessage = document.querySelector('.total');
let submitButton = document.getElementsByName('submit');
function checkForm(){
    console.log(document.enter.login.validity.valid);
    if (!document.enter.login.validity.valid){
        loginMessage.innerHTML = "Логин введен некоректно";
        submitButton.disabled = true;
    }
    else {loginMessage.innerHTML='';submitButton.disabled = false;}
    
    
}
function checkForm1(){
    if (!document.enter.password.validity.valid){
        passwordMessage.innerHTML = "Пароль введен некоректно";
        submitButton.disabled = true;
    }
    else {passwordMessage.innerHTML='';submitButton.disabled = false;}
}
function checkFormTotal(){
    if (!document.enter.login.validity.valid || !document.enter.password.validity.valid) {totalMessage.innerHTML='Заполните форму корректно';submitButton.disabled=true;}
    else {totalMessage.innerHTML='';submitButton.disabled=false;
    submitEnter();
    }

}
function submitEnter(){
    var formData = new FormData();
    formData.append('login',document.enter.login.value);
    formData.append('password',document.enter.password.value);

    fetch('./../function/enter.php',{ method: 'POST', body: formData }).then(res=>res.json())
        .then((data)=> {
            if (data=='OK'){
                document.location.href = "/basket.php";
            }
            else{
                totalMessage.innerHTML=data;
            }
            })
        .catch((error)=>{
            console.log(error);
            });
}