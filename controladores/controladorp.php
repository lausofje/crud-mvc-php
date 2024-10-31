<?php
include('./modelop.php');
if (isset($_POST['verproductos'])) {
    header('location: ./indexp.php');
}
if (isset($_POST['crearProducto'])){
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $resultado=crearProducto($nombre,$precio,$descripcion);
    if ($resultado===TRUE) {
        header('location: ./indexp.php');
    }else {
        echo $resultado;
        echo"hola";
    }
}
if (isset($_POST['actualizarUsuario'])){
    $id=$_POST['id_usuario'];
    $nombres=$_POST['nombres'];
    $apellido=$_POST['apellidos'];
    $celular=$_POST['celular'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
    $resultado=actualizarUsuario($id,$nombres,$apellidos,$celular,$correo,$contrasena);
    if ($resultado===TRUE) {
        header('location: ./actualizarusuario.php');
    }else {
        echo $resultado;
    }
}

if (isset($_POST['filtrar'])) {
    $idfiltrado=$_POST["id"];
    $resultado=obtenerUsuario($idfiltrado);
    if ($resultado) {
        session_start();
        $_SESSION['resultado']=$resultado;
        header(header:'location: ./indexu.php');
    }else {
        echo "No existe ese registro";
    }
}
if (isset($_POST['Eliminar'])) {
    $id = $_POST['id'];

    if ($_SESSION['id'] === $id) {
        session_destroy();
        echo "<script>
        alert('We cannot delete this user, because the user is linked to the sales table or is the currently logged-in user.');
        window.location.href = './../../views/users/showAllUsers.view.php';
        </script>";
        cerrarconexion();
        return false;
    } else {

        $result =eliminarUsuario($id);

        if ($result === true) {
            $_SESSION['result'] = eliminarUsuario($id_usuario);
            header("location:./perfil.php");
        } else {
            echo $result;
        }
    }
}
?>