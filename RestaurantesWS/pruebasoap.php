<?php

$cliente = new SoapClient(null, array(
    'location' => "http://localhost:82/RestaurantesWS/RestaurantesSW.php",
    'uri'      => "http://localhost:82/RestaurantesWS/RestaurantesSW.php",
    'trace'    => 1 ));

try {
    $resultado = $cliente->__soapCall("ConsultarRestauranteporID", [$id=1]);
    var_dump($resultado); // Imprime el resultado de la llamada al método ConsultarRestaurante
} catch (SoapFault $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
