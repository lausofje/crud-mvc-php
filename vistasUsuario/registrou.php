<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Registrar Usuario</h2>
    <form action="./controladores/controladoru.php" method="POST">
        <label for="">Nombres :</label><br>
        <input required name="nombres" type="text" ><br>
        <label for="">Apellidos :</label><br>
        <input required name="apellidos" type="text"><br>
        <label for="">Celular :</label><br>
        <input required name="celular" type="number"><br>
        <label for="">Correo:</label><br>
        <input required name="correo" type="email"><br>
        <label for="">Contraseña :<br>
        <input required name="contrasena" type="text"><br><br>
        <label for="">Elige un rol:</label>
        <select name="rol" id="rol">
            <option value="1">Administrador</option>
            <option value="2">Vendedor</option>
        </select><br><br>
        <input type="submit" name="crearUsuario" value="Crear Usuario">
    </form>


</body>
</html>