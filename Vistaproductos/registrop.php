<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al modulo de producto</title>
</head>
<body>
    <h2>Registrar Producto</h2>
    <form action="./controladores/controladorp.php" method="POST">
        <label for="">Nombre :</label><br>
        <input required name="nombre" type="text"><br>
        <label for="">Precio :</label><br>
        <input required name="precio" type="number"step="0.01" ><br>
        <label for="">Descripcion :</label><br>
        <input required name="descripcion" type="text" ><br>
        <input type="submit" name="crearProducto" value="Crear Producto">
    </form>


</body>
</html>