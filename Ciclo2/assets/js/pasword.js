var password = document.getElementById("Contraseña")
  , confirm_password = document.getElementById("Confirmar-Contraseña");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Contraseñas no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;