<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['nombre']) && isset($_POST['ubicacion']) && isset($_POST['telefono']) && isset($_POST['categoria'])) {
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $telefono = $_POST['telefono'];
        $categoria = $_POST['categoria'];
        
        $cliente=new SoapClient(
            null,array(
                'location'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
                'uri'=>'http://localhost:82/RestaurantesWS/RestaurantesSW.php',
                'trace'=>1
            )
    
        );
     
            try{
            $respuesta=$cliente->__soapCall("InsertarRestaurante",[$nombre,$ubicacion,$telefono,$categoria]);
           if($respuesta==1){
            header('Location: index.php');
        }else{
            echo 'error no se inserto';
           }

             }catch(SoapFault $e){
    
             echo $e->getMessage();    
            }
    

        
    }
}
?>
