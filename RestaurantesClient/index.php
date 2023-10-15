<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

<div class="container">
        <h1>Lista de Restaurantes</h1>

    <?php
    $cliente=new SoapClient(
        null,array(
            'location'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
            'uri'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
            'trace'=>1
        )

    );
 
        try{
        $respuesta=$cliente->__soapCall("ConsultarRestaurante",[]);
        $result=json_encode($respuesta,true);
        $datos=json_decode($result,true);
        echo '<table>';
        echo '<tr><th>Nombre</th><th>Ubicacion</th><th>Telefono</th><th>Categoria</th><th>Acciones</th></tr>';
        foreach ($datos as $item){
            echo '<tr>';
            echo '<td>'. $item['Nombre'].'</td>';
            echo '<td>'. $item['Ubicacion'].'</td>';
            echo '<td>'. $item['Telefono'].'</td>';
            echo '<td>'. $item['Categoria'].'</td>';
            echo '<td><a href="Editar.php?Id='.$item['IdRest'].'" class="edit-button">Editar</a> <a href="Eliminar.php?Id='.$item['IdRest'].'" class="delete-button">Eliminar</a></td>';
            echo '</tr>';
        }
         }catch(\Throwable $th){

    echo 'Hubo un error: ' . $th->getMessage();

        }


    ?>
    <a href="Agregar.php" class="add-button">Agregar</a>

</body>
</html>