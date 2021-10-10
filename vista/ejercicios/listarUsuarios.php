<?php
include_once '../../configuracion.php';
$sesion = new session();

$datos = data_submitted();

if (!$sesion->activa()) {
  header('Location: index.php');
} else {
  include_once '../estructura/cabecera.php';
}

echo "<h4>Usted esta Logueado como: {$_SESSION['usNombre']}</h4>";

include_once "../estructura/cabecera.php";
$abmUsuario = new abmUsuario();
$listaUsuario = $abmUsuario->buscar(null);

?>

<div class="container mt-3">
  <h4>Implementar en la capa de la vista:
    un script Vista/listarUsuario.php que liste los usuario registrados y permita actualizar sus datos o
    realizar un borrado lógico. Las acciones que se van a poder invocar son:
    accion/actualizarLogin.php y accion/eliminarLogin.php</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col" class="text-center">Id Usuario</th>
        <th scope="col" class="text-center">Nombre de Usuario</th>
        <th scope="col" class="text-center"> Password</th>
        <th scope="col" class="text-center">Email</th>
        <th scope="col" class="text-center">Deshabilitado</th>
        <th scope="col" class="text-center">Editar Datos</th>
        <th scope="col" class="text-center">Deshabilitar Usuario</th>
      </tr>
    </thead>
    <?php
    if (count($listaUsuario) > 0) {

      foreach ($listaUsuario as $objUsuario) {
        $idUsuario = $objUsuario->getIdUsuario();
        echo '<tr><td class="text-center" style="width:200px;">' . $objUsuario->getIdUsuario() . '</td>';
        echo '<td class="text-center" style="width:200px;">' . $objUsuario->getUsNombre() . '</td>';
        echo '<td class="text-center" style="width:200px;">' . $objUsuario->getUsPass() . '</td>';
        echo '<td class="text-center" style="width:200px;">' . $objUsuario->getUsMail() . '</td>';

        '</tr>';

        if ($objUsuario->getUsDesabilitado()) {
          echo "<td class='text-center'><i class='far fa-check-circle'></i></td>";
        } else {
          echo "<td class='text-center'><i class='far fa-times-circle'></i></td>";
        }
        echo "<form action='editarUsuario.php' method='post'>
<td class='text-center'>
<input name='idUsuario' id='idUsuario' type='hidden' value='$idUsuario'>
<button class='btn btn-dark' type='submit'><i class='fas fa-edit'></i>
</button></td></form>
<form action='../accion/eliminarUsuario.php' method='post'>
<td class='text-center'>
<input name='idUsuario' id='idUsuario' type='hidden' value='$idUsuario'>
<button class=' btn btn-dark' type='submit'>
<i class='fas fa-user-times'></i></i></button></td></form></tr>";
      }
      if (isset($_GET['Message'])) {
        print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
      }
    } else {

      echo '<h3> No se encontraron registros </h3>';
    }

    ?>
</div>
</table>

<?php
include_once '../estructura/footer.php';
?>