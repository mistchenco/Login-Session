const d=document, 
inputNombre=d.getElementById("usNombre"),
inputMail=d.getElementById("usMail"),
inputPass=d.getElementById("usPass"),
form=d.getElementById("editarUsuario"),
mensaje = d.getElementById ("validaciones")


form.addEventListener("submit",e=> { 

e.preventDefault()
banderaForm1=false
banderaForm2=false
banderaForm3=false
banderaForm4=false
mensajeGeneral = ""

if(!validarLongitud(inputNombre)) {
  mensajeGeneral+= "la longitud del usuario debe ser mayor a 5"
}else{
  banderaForm1= true
}
if(!validarPass(inputPass)) {
  mensajeGeneral+= "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. "
}else{
  banderaForm2 = true
}
if(!validarUsuarioPass(inputNombre,inputPass)){
    mensajeGeneral+= "Usuario y contraseña no deben ser iguales"
 }else{
   banderaForm3=true
 }
 if(!validarMail(inputMail)){
  mensajeGeneral+= "El mail no es correcto, por favor ingrese un mail valido"
}else{
 banderaForm4=true
}

 if(banderaForm1 && banderaForm2 && banderaForm3 && banderaForm4) {
   form.submit()
 }else{
    alert(mensajeGeneral)
   location.reload()
 }


})

function validarUsuarioPass(nombre,pass){
  valorNombre=nombre.value
  valorPass=pass.value
  bandera = false
  if (valorNombre == valorPass){
    bandera = false
  }else{
    bandera = true
  }
  return bandera
}

function validarLongitud (cadena){
  valorCadena = cadena.value
  bandera = false
  if (valorCadena.length <= 5){
    bandera = false
  }else{
    bandera = true
  }
  return bandera
}

function validarPass (pass){
  valorPass = pass.value
  bandera = false
  regexp= /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,16}$/
  if (!regexp.test(valorPass)){
    bandera = false
  }else{
    bandera = true
  }
  return bandera
}

function validarMail (mail){
  valorMail = mail.value
  bandera = false
  
  emailRegexp = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
  if (!emailRegexp.test(valorMail)){
    bandera = false
  }else{
    bandera = true
  }
  return bandera
}