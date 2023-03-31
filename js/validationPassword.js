const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const buttonCreateAccount = document.getElementById('createAccount');
const massageAlert = document.getElementById('massage');

var validarPassword = function(){
    if(password.value == password2.value){
        password2.classList.add('correct2');
        password2.classList.remove('error');
        password.classList.add('correct');
        massageAlert.innerHTML = "Las contraseñas son iguales";
        massageAlert.classList.add('correct');
        buttonCreateAccount.disabled = false;

        if (password.value == 0){
            massageAlert.innerHTML = "¡Debe ingresar una contraseñas!";
            buttonCreateAccount.disabled = true;
            massageAlert.classList.remove('correct');
            password2.classList.remove('error');
            password.classList.remove('correct');
            password2.classList.remove('correct2');
        }
    }else{
        buttonCreateAccount.disabled = true;
        password2.classList.add('error');
        password2.classList.remove('correct2');
        password.classList.add('correct');
        massageAlert.innerHTML = "Las contraseñas no coiciden.";
        massageAlert.classList.remove('correct');
    }
};

buttonCreateAccount.addEventListener('click', function (){
    if(password.value != password2.value){
        buttonCreateAccount.disabled = true;
    }
});

password.addEventListener('keyup', validarPassword);
password2.addEventListener('keyup', validarPassword);