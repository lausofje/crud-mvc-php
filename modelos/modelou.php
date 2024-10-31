<?php

$conexion;
function abrirconexion()
{
    global $conexion;
    $db_host = "localhost";
    $db_name = "tiendas";
    $db_user = "root";
    $db_pass = "";
    try {
        $conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
    } catch (\Throwable $th) {
        throw $th->getMessage();
    }
}


function cerrarconexion()
{
    global $conexion;
    $conexion->close();
}

function crearUsuario($nombres,$apellidos,$celular,$correo,$contrasena,$rol)
{
    abrirconexion();
    global $conexion;
    $query = "INSERT INTO usuarios (nombres,apellidos,celular,correo,contrasena,rol)
    VALUES('$nombres','$apellidos','$celular','$correo','$contrasena','$rol')";
    if ($conexion->query($query) === true) {
        cerrarconexion();
        return true;
    } else {
        cerrarconexion();
        return "Hubo un error en la insercion:" .
            $conexion->error;
    }
}
function obtenerUsuarios()
{
    abrirconexion();
    global $conexion;
    $query = "SELECT * FROM usuarios";
    $resultado = $conexion->query($query);
    $usuarios = [];
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
    }
    cerrarconexion();
    return $usuarios;
}
function obtenerUsuario($idusuario)
{ 
    abrirconexion();
    global $conexion;
    if (empty($idusuario)) {
        return;
} else {
    $query = "SELECT * FROM usuarios WHERE id = $idusuario";
    $resultado = $conexion->query($query);
    cerrarconexion();
    return $resultado->fetch_assoc();
    
}
}
function actualizarUsuario($idusuario,$nombres,$apellidos,$celular,$correo,$contrasena)
{
    abrirconexion();
    global $conexion;
    $query = "UPDATE usuarios SET nombres ='$nombres',apellidos='$apellidos',celular='$celular'correo='$correo',contrasena='$contrasena' WHERE id =$idusuario";
    if ($conexion->query($query) === TRUE) {
        cerrarconexion();
        return TRUE;
    } else {
        cerrarconexion();
        return "Hubo un error al actualizar:" .
            $conexion->error;
    }
}

function eliminarUsuario($idusuario)
{
    abrirconexion();
    global $connection;

    $query = "DELETE FROM usuarios WHERE id = $idusuario";

    if ($connection->query($query) === true) {
        cerrarconexion();
        return true;
    } else {
        echo "<script>alert('The user exists in sales table: ')</script>" . $connection->error;
    }
}