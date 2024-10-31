<?php
session_start();
include('../modelos/modelou.php');

if (isset($_POST['crearUsuario'])){
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $celular=$_POST['celular'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
    $rol=$_POST['rol'];
    $resultado=crearUsuario($nombres,$apellidos,$celular,$correo,$contrasena,$rol);
    if ($resultado===TRUE) {
        header('location: ../vistasUsuario/registro.php');
    }else {
        echo $resultado;
    }

    if ($rol==1) {
        header('location:../vistasUsuario/admin.php');
    }else{
        header('location:../vistasUsuario/vende.php');
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
        $_SESSION['resultado']=$resultado;
        header(header:'location: ./perfil.php');
    }else {
        echo "<script>alert('No se ingreso un id para filtrar');
        window.location.href = './perfil.php';</script>";
    }
}
if (isset($_POST['eliminarUsuario'])){
    $id=$_POST['id'];

    $resultado=eliminarUsuario($id);
    if ($resultado===TRUE) {
        header('location: ./perfil.php');
    }else {
        echo $resultado;
    }
}
?>
