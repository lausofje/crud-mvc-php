<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['rol']) !== "Vendedor") {
    session_destroy();
    session_unset();
    header("location: inicio_sesion.php");
    exit();
}

$nombres = $_SESSION['nombres'];
$roles = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido <?= $nombres ?>, su rol es <?= $roles ?></h2>
    <form action="../crudproductos/controladorp.php" method="post">
        <nav><input type="submit" value="Ver Productos" name="verproductos"></nav><br>
    </form>
    <form action="/crudventas/controlador.php" method="post">
    <nav><input type="submit" value="Ver Ventas"></nav>
    </form>
</body>
</html>