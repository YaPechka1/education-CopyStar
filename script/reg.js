let nameMessage = document.querySelector('.name');
let surnameMessage = document.querySelector('.surname');
let patrionicMessage = document.querySelector('.patrionic');
let emailMessage = document.querySelector('.email');
let loginMessage = document.querySelector('.login');
let passwordMessage = document.querySelector('.password');
let passwordRepeatMessage = document.querySelector('.passwordRepeat');
let rulesMessage = document.querySelector('.rules');
let totalMessage = document.querySelector('.total');
let submitButton = document.getElementsByName('submit');
let check = document.getElementById('check');
function checkForm(){
    console.log(document.enter.name.validity.valid);
    if (!document.enter.name.validity.valid){
        nameMessage.innerHTML = "Имя введен некоректно";
        submitButton.disabled = true;
    }
    else {nameMessage.innerHTML='';submitButton.disabled = false;}   
}
function checkForm1(){
    if (!document.enter.surname.validity.valid){
        surnameMessage.innerHTML = "Пароль введен некоректно";
        submitButton.disabled = true;
    }
    else {surnameMessage.innerHTML='';submitButton.disabled = false;}
}
function checkForm2(){
    console.log(document.enter.patrionic.validity.valid);
    if (!document.enter.patrionic.validity.valid){
        patrionicMessage.innerHTML = "Отчество введено некоректно";
        submitButton.disabled = true;
    }
    else {patrionicMessage.innerHTML='';submitButton.disabled = false;}   
}
function checkForm3(){
    console.log(document.enter.email.validity.valid);
    if (!document.enter.email.validity.valid){
        emailMessage.innerHTML = "Email введен некоректно";
        submitButton.disabled = true;
    }
    else {emailMessage.innerHTML='';submitButton.disabled = false;}   
}
function checkForm4(){
    console.log(document.enter.login.validity.valid);
    if (!document.enter.login.validity.valid){
        loginMessage.innerHTML = "Логин введен некоректно";
        submitButton.disabled = true;
    }
    else {loginMessage.innerHTML='';submitButton.disabled = false;}   
}
function checkForm5(){
    console.log(document.enter.password.validity.valid);
    if (!document.enter.password.validity.valid){
        passwordMessage.innerHTML = "Пароль введен некоректно";
        submitButton.disabled = true;
    }
    else {passwordMessage.innerHTML='';submitButton.disabled = false;}   
}
function checkForm6(){
    console.log(document.enter.passwordRepeat.validity.valid);
    if (!document.enter.passwordRepeat.validity.valid ){
        passwordRepeatMessage.innerHTML = "Пароль введен некоректно";
        submitButton.disabled = true;
    }
    else 
    if (document.enter.passwordRepeat.value!=document.enter.password.value){
        {
            passwordRepeatMessage.innerHTML = "Похоже пароли не совпадают";
            submitButton.disabled = true;
        }
    }
    else {passwordRepeatMessage.innerHTML='';submitButton.disabled = false;}   
}

function checkFormTotal(){
    console.log(rulesMessage);
    if (!check.checked) rulesMessage.innerHTML="Поставьте флажок"; else rulesMessage.innerHTML=""
    if (!document.enter.name.validity.valid ||
        !document.enter.surname.validity.valid ||
        !document.enter.patrionic.validity.valid ||
        !document.enter.email.validity.valid ||
        !document.enter.login.validity.valid ||
        !document.enter.password.validity.valid ||
        document.enter.passwordRepeat.value!=document.enter.password.value ||
        !check.checked) {totalMessage.innerHTML='Заполните форму корректно';submitButton.disabled=true;}
    else {totalMessage.innerHTML='';submitButton.disabled=false; submitRegForm();}
}
function submitRegForm(){
    var formData = new FormData();
    formData.append('name', document.enter.name.value);
    formData.append('surname', document.enter.surname.value);
    if (document.enter.patrionic.value !='') formData.append('patronymic', document.enter.patrionic.value);
    else formData.append('patronymic', null);
    formData.append('email', document.enter.email.value);
    formData.append('login', document.enter.login.value);
    formData.append('password', document.enter.password.value);
    console.log(document.enter.patrionic.value);
    fetch('./../function/reg.php',{ method: 'POST', body: formData }).then(res=>res.json())
            .then((data)=> {
                if (data=='OK'){
                    document.location.href = "/enter.php";
                }
                else{
                    totalMessage.innerHTML=data;
                }
                // location.reload();
                })
            .catch(error=>{
                console.log(error);
            })
}