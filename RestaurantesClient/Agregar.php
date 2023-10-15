<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Restaurante</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <h1>Agregar Restaurante</h1>
        <form action="GuardarRest.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"><br><br>
            <label for="ubicacion">Ubicación:</label><br>
            <input type="text" id="ubicacion" name="ubicacion"><br><br>
            <label for="telefono">Teléfono:</label><br>
            <input type="text" id="telefono" name="telefono"><br><br>
            <label for="categoria">Categoría:</label><br>
            <input type="text" id="categoria" name="categoria"><br><br>
            <input type="submit" value="Guardar" class="add-button">
        </form>
    </div>

</body>
</html>
