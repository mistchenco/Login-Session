<?php
include_once '../estructura/cabecera.php';
$datos=data_submitted();
$session= new session();

print_r($datos);
$session->iniciar($datos['usNombre'], $datos['usPass']);


if($session->validar()){
    header('Location: ../ejercicios/paginaSegura.php');

}else{
    header('Location: ../ejercicios/login.php');
    
}
include_once '../estructura/footer.php';