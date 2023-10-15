<?php
// Verificar si se ha recibido un parámetro 'Id' válido
//if (isset($_GET['Id'])) {
    $Id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $ubicacion = $_POST['Ubicacion'];
    $telefono = $_POST['Telefono'];
    $categoria = $_POST['Categoria'];

    $cliente=new SoapClient(
        null,array(
            'location'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
            'uri'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
            'trace'=>1
        )

    );
 
        try{
           
        $respuesta=$cliente->__soapCall("ModificarRestaurante",[$Id,$nombre,$ubicacion,$telefono,$categoria]);
       if($respuesta==1){
        //header('Location: index.php');
    }else{
        echo 'error no se elimino';
       }

         }catch(SoapFault $e){

         echo $e->getMessage();    
        }
    header('Location: index.php'); // Reemplaza 'index.php' con la página a la que deseas redirigir al usuario después de eliminar
//}
?>
