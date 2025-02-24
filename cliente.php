<?php
$options = array(
'location' =>'http://localhost/webservices/appwebservices/server.php',
        'uri' => 'http://localhost/webservices/appwebservices/'
);

try {
    // Crear el cliente SOAP
    $client = new SoapClient(null, $options);

    // Llamar al método saludar
    $nombre = "Usuario";
    echo $client->saludar($nombre . '！！') . "</br>";

    // Llamar al método operacion
    echo "El Resultado de la suma es: " . $client->operacion(10, 5) . "</br>";

    // Llamar al método getProduct (corregido a getProducts si es necesario)
    $productos = $client->getProducts() ;
echo "Los productos son: " . implode(", ", $productos);
echo"</br>";
$usuario = "maicol";  // Cambia esto para probar con otros usuarios
$clave = "123";

echo $client->validarUsuario($usuario, $clave);


} catch (SoapFault $e) {
    // Manejo de errores
    echo "Error en el servicio SOAP: " . $e->getMessage();
}
?>