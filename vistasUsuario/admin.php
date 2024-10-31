<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido Administrador</h2>

    <hr>
    <h2>Ver usuario</h2>
    <form action="../controladores/controladoru.php" method="post">
        <input type="text" name="id" placeholder="Ingrese el id">
        <input type="submit" name="filtrar" value="Filtar">
    </form>
        <?php
        include('./modelos/modelou.php');
    session_start();
    ?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Correo</th>
            </tr>
            <?php
        if (isset($_SESSION['resultado'])) {
            $resultado=$_SESSION["resultado"];
        ?>
        <tr>
            <td><?= $resultado['id']?></td>
            <td><?= $resultado['nombres']?></td>
            <td><?= $resultado['correo']?></td>
        </tr>
        <?php
        }
        ?>
            
    </table>
    <h2>Ver Usuarios</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Acciones</th>
            
        </tr>
        <?php
        $usuarios = obtenerUsuarios();
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?=$usuario['nombres'] ?></td>
                <td><?=$usuario['apellidos'] ?></td>
                <td><?=$usuario['celular'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['rol'] ?></td>

                <td>
                     
                    <form action="./controladores/controladoru.php" method="POST">
                    <a href="">Editar</a>
                        <input type="hidden" name="id" value="<?= $usuario['id']?>">
                        <input type="submit" name="eliminarUsuario" value="Eliminar">
                        
                        </form>
                </td>
            </tr>
        <?php
        }
        ?>
        
</body>

</html>