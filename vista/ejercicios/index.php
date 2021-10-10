<?php
include_once '../estructura/cabecera.php';
$sesion = new session();
$datos = data_submitted();
if ($sesion->activa()) {
    // header('Location: paginaSegura.php');
    echo "<h4>Usted Esta Logueado como {$_SESSION['usNombre']}</h4>";
}
?>

<div class="container-fluid">
<div class="container">
<h2>Trabajo Practico N° 5 </h2>
<h3>Antes de poder ver y editar la lista de personas, se deben Loguear</h3>
<p>La autenticación de un usuario, consiste en verificar su identidad. En las aplicaciones web
comúnmente se utiliza un login con algún dato que identifique a la persona como: nombre de usuario/
dni/dirección de mail... y una clave.</p>
<h4>Ilustración 1:(ER) Entidad Relación - Autenticación</h4>
<p>1. Crear la capa de los datos, implementando el ORM (Modelo de datos) correspondiente al ER de la
ilustración 1. Recordar que se debe generar al menos, una clase php por cada tabla. Cada clase
debe contener las variables de instancia y sus métodos get y set; ademas de los métodos que nos
permitan seleccionar, ingresar, modificar y eliminar los datos de cada tabla.</p>
<p>2. Crear la capa de control, que nos permitan acceder al ORM (Modelo de datos) y entregarle la
información a las paginas de la interface.</p>
<p>3. Implementar dentro de la capa de Control la clase Session con los siguientes métodos:
<p>• _ _construct(). Constructor que. Inicia la sesión.</p>
<p>• iniciar($nombreUsuario,$psw). Actualiza las variables de sesión con los valores ingresados.</p>
<p>• validar(). Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.</p>
<p>• activa(). Devuelve true o false si la sesión está activa o no.</p>
<p>• getUsuario().Devuelve el usuario logeado.</p>
<p>• getRol(). Devuelve el rol del usuario logeado.</p>
<p>• cerrar(). Cierra la sesión actual.</p>
<p>4. Implementar en la capa de la vista:</p>
<p>1. un script Vista/listarUsuario.php que liste los usuario registrados y permita actualizar sus datos o
realizar un borrado lógico. Las acciones que se van a poder invocar son:
accion/actualizarLogin.php y accion/eliminarLogin.php</p>
<p>2. un script Vista/login.php que invoque al script accion/verificarLogin.php el cual redirecciona al
script Vista/paginaSegura.php si los datos ingresados se corresponden con un usuario/pass
registrados. Caso contrario se redirecciona nuevamente al script Vista/login.php</p>

</div>
</div>
<?php
include_once '../estructura/footer.php';
?>