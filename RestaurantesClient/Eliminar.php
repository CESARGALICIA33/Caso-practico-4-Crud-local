<?php
// Verificar si se ha recibido un parámetro 'Id' válido
//if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];

    $cliente=new SoapClient(
        null,array(
            'location'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
            'uri'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
            'trace'=>1
        )

    );
 
        try{
           
        $respuesta=$cliente->__soapCall("EliminarRestaurante",[$Id]);
       if($respuesta==1){
        header('Location: index.php');
    }else{
        echo 'error no se elimino';
       }

         }catch(SoapFault $e){

         echo $e->getMessage();    
        }
    //header('Location: index.php'); // Reemplaza 'index.php' con la página a la que deseas redirigir al usuario después de eliminar
//}
?>
