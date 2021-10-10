<?php
include_once '../estructura/cabecera.php';
$sesion = new session();

$datos = data_submitted();

if ($sesion->activa()) {
   
    echo "<h4>Usted Esta Logueado como {$_SESSION['usNombre']}</h4>";
}else{

}

$datos = data_submitted();
$abmUsuario = new abmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

?>
<div class="container">

<div class="card card-info">
    <form class="needs-validation" novalidate" id="editarUsuario" name="editarUsuario" action="../accion/accionEditarUsuario.php" method="post" data-toggle="validator">
    <?php
    echo "<input class='form-control' id='idUsuario' name='idUsuario' type='hidden' value='{$datos['idUsuario']}'>";
    ?>
        <div class="card-header">
            <h3 class="card-title">Editar datos de Usuario</h3>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <?php
               echo "<input class='form-control' id='usNombre' name='usNombre' type='text' placeholder='Nuevo nombre'   value='{$objUsuario->getUsNombre()}' required >";
            ?>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <?php
               echo " <input class='form-control' id='usMail' name='usMail' type='text' placeholder='Nuevo email'   value='{$objUsuario->getUsMail()}' required >";
            ?>
                </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <?php
               echo " <input class='form-control' id='usPass' name='usPass' type='password' placeholder='Nuevo Contraseña'  value='{$objUsuario->getUsPass()}' required >";
                ?>

            </div>
            <div class="col-md-1">
                <div class="d-grid">
                   
                    <input class="btn btn-primary text-center fas fa-user-edit" type="submit" name="prueba" placeholder="ingrese algo aqui"  value="Editar" />
                </div>
                </div>


    </form>
</div>
</div>
<?php
include_once '../estructura/footer.php';
?>