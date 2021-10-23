<?php
include_once '../estructura/cabecera.php';
include_once '../../utiles/PHPMailer/enviaMail.php';
$datos = data_submitted();
$abmUsuario = new abmUsuario();
$enviarMail=new enviarMail();
$usuario=['idUsuario' => $datos['idUsuario']];
$listaUsuario = $abmUsuario->buscar($usuario);
$objUsuario = $listaUsuario[0];
$datos['usDesabilitado'] = $objUsuario->getUsDesabilitado();
$datos['usPass']= md5($datos['usPass']);


if($abmUsuario->modificacion($datos)){
    $mail=$enviarMail->newEmail("","",$datos['usMail'],$datos['usNombre'],"MODIFICACION USUARIO","Sus Datos Fueron modificados correctamente");
    $mensaje="El usuario se modifico con exito, Revise su casilla".$mail;
    header("Location: ../ejercicios/listarUsuarios.php?Message=" . urlencode($mensaje));
}else{
    echo "<h1>ERROR de modificacion,Debe cambiar al menos un valor y no debe tener campos vacios</h1>";
}

include_once '../estructura/footer.php';

