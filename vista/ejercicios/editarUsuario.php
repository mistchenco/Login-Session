<?php
include_once '../estructura/cabecera.php';
$sesion = new session();
$objUsuario=$sesion->getUsuario();

$datos = data_submitted();

if ($sesion->activa()) {
   
   echo "<h4>Usted esta Logueado como: {$objUsuario->getUsNombre()}</h4>";

}else{

}

$datos = data_submitted();
$abmUsuario = new abmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

?>
<div class="container">

<div class="card card-info">
<form  class="needs-validation" novalidate id="editarUsuario" name="editarUsuario" action="../accion/accionEditarUsuario.php" method="post" >
 <?php
    echo "<input class='form-control' id='idUsuario' name='idUsuario' type='hidden' value='{$datos['idUsuario']}'>";
    ?>
 <div class="mb-3">
    <label for="usuario" class="form-label">Nombre Usuario</label>
    <input class='form-control' id='usNombre' name='usNombre' type='text' placeholder='Nuevo nombre' 
    value= "<?php echo $objUsuario->getUsNombre()?>" required >
    

  </div>

 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input  type='email' class='form-control' id='usMail' name='usMail'  placeholder='Nuevo email'   
    value='<?php echo $objUsuario->getUsMail() ?>' required >
    
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
     <input class='form-control' id='usPass' name='usPass' type='password' placeholder='Nuevo Contraseña'  
     value='<?php echo $objUsuario->getUsPass() ?>' required >
    
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <div id="validaciones"></div>
</div>
</div>
<script src="../js/bootstrap/validatorEditor.js"></script>
<?php
include_once '../estructura/footer.php';

?>