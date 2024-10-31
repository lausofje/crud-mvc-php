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

function crearProducto($nombre,$precio,$descripcion)
{
    abrirconexion();
    global $conexion;
    $query = "INSERT INTO productos(nombre,precio,descripcion)
    VALUES('$nombre','$precio','$descripcion')";
    if ($conexion->query($query) === true) {
        cerrarconexion();
        return true;
    } else {
        cerrarconexion();
        return "Hubo un error en la insercion:" .
            $conexion->error;
    }
}
function obtenerProductos()
{
    abrirconexion();
    global $conexion;
    $query = "SELECT * FROM productos";
    $resultado = $conexion->query($query);
    $productos = [];
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
    }
    cerrarconexion();
    return $productos;
}
function obtenerProducto($id_producto)
{ 
    abrirconexion();
    global $conexion;
    $query = "SELECT * FROM usuarios WHERE id=$id_producto";
    $resultado = $conexion->query($query);
    cerrarconexion();
    return $resultado->fetch_assoc();
}
function actualizarProduto($id_producto,$nombre,$precio,$descripcion)
{
    abrirconexion();
    global $conexion;
    $query = "UPDATE productos SET nombre ='$nombre',precio='$precio',descripcion='$descripcion' WHERE id =$id_producto";
    if ($conexion->query($query) === TRUE) {
        cerrarconexion();
        return TRUE;
    } else {
        cerrarconexion();
        return "Hubo un error al actualizar:" .
            $conexion->error;
    }
}

function eliminarUsuario($id_producto)
{
    abrirconexion();
    global $connection;

    $query = "DELETE FROM producto WHERE id_producto = $id_producto";

    if ($connection->query($query) === true) {
        cerrarconexion();
        return true;
    } else {
        echo "<script>alert('The user exists in sales table: ')</script>" . $connection->error;
    }
}