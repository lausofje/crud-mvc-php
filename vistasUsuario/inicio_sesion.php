<?php
if (isset($_POST['iniciarSesion'])) {
    header('location: ./vistasUsuario/registrou.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Iniciar sesion</h2>
    <form action="./controladores/controladoru.php" method="POST">
        <label for="">Correo:</label><br>
        <input required name="correo" type="email"><br>
        <label for="">Contraseña :<br>
        <input required name="contrasena" type="text"><br><br>
        <input type="submit" name="iniciarSesion" value="Iniciar Sesion">
        </form>
</body>
</html>