<?php
include_once '../estructura/cabecera.php';
$datos = data_submitted();
$abmUsuario = new abmUsuario();
$usuario=['idUsuario' => $datos['idUsuario']];
$listaUsuario = $abmUsuario->buscar($usuario);
$objUsuario = $listaUsuario[0];
$datos['usDesabilitado'] = $objUsuario->getUsDesabilitado();

if($abmUsuario->modificacion($datos)){
    $mensaje="El usuario se modifico con exito";
    header("Location: ../ejercicios/listarUsuarios.php?Message=" . urlencode($mensaje));
}else{
    echo "<h1>ERROR de modificacion,Debe cambiar al menos un valor y no debe tener campos vacios</h1>";
}

include_once '../estructura/footer.php';

