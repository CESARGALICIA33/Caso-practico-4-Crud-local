<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Editar Restaurante</title>
</head>
<body>

<div class="container">
    <h2>Editar Restaurante</h2>

<?php
    // Verificar si se ha recibido un parámetro 'Id' válido
    if (isset($_GET['Id'])) {
        $Id = $_GET['Id'];

        $cliente = new SoapClient(
            null, array(
                'location' => 'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
                'uri' => 'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
                'trace' => 1
            )
        );

        try {
            $respuesta = $cliente->__soapCall("ConsultarRestauranteporID", [$Id]);
            // Verificar si se recibió una respuesta
            if ($respuesta) {
                // Llenar los campos del formulario con los valores del registro
                $nombre = $respuesta[0]['Nombre'];
                $ubicacion = $respuesta[0]['Ubicacion'];
                $telefono = $respuesta[0]['Telefono'];
                $categoria = $respuesta[0]['Categoria'];
            }
        } catch (SoapFault $e) {
            echo 'Error al llamar al servicio web: ' . $e->getMessage();
        }
    }
?>

<form action="Actualizar.php" method="post">
        <input type="hidden" id="Id "name="Id" value="<?php echo $Id; ?>"> 
        <label for="Nombre">Nombre:</label><br>
        <input type="text" id="Nombre" name="Nombre" value="<?php echo $nombre; ?>"><br><br>
        <label for="Ubicacion">Ubicacion:</label><br>
        <input type="text" id="Ubicacion" name="Ubicacion" value="<?php echo $ubicacion; ?>"><br><br>
        <label for="Telefono">Telefono:</label><br>
        <input type="text" id="Telefono" name="Telefono" value="<?php echo $telefono; ?>"><br><br>
        <label for="Categoria">Categoria:</label><br>
        <input type="text" id="Categoria" name="Categoria" value="<?php echo $categoria; ?>"><br><br>
        <input type="submit" class="add-button" value="Actualizar">
    </form>
</div>



</body>
</html>
