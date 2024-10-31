<?php
session_start();
include('./modelos/modelou.php');

//login
if (isset($_POST['iniciarSesion'])) {
    abrirconexion();

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT idusuario, nombres, descripcion, contrasena FROM usuarios INNER JOIN roles ON usuarios.rol = roles.idrol WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $query);
    $fila = mysqli_fetch_assoc($resultado);

    if ($fila && $fila['contrasena'] === $contrasena) {
        $_SESSION['id'] = $fila['idusuario'];
        $_SESSION['nombres'] = $fila['nombres'];
        $_SESSION['rol'] = $fila['descripcion'];
        if ($_SESSION['rol'] == 1) {
            header('location:./vistasUsuario/admin.php');
        }else{
            header('location:./vistasUsuario/vende.php');
        }
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}

?>