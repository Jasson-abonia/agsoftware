const contrasenia1 = document.getElementById('#contrasenia1');
const contrasenia2 = document.getElementById('#contrasenia2');
const inputs =document.querySelectorAll('#formulario input');

var valor1 = contrasenia1.value;
var valor2 = contrasenia2.value;

const validarContrasenia = function(){
    if(contrasenia1.value == contrasenia2.value){
        console.log("las contraseñas son iguales ");
    }else{
        console.log("las contraseñas son diferentes ");
    }
};

inputs.forEach((input)=>{
    console.log(input);
    input.addEventListener('keyup', validarContrasenia);
    input.addEventListener('blur', validarContrasenia);
});
