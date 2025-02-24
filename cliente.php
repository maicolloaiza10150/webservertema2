<?php
$options = array( 
    'location' => 'http://localhost/webservices/appwebservices/server.php',
    'uri' => 'http://localhost/webservices/appwebservices/'
); 

$client = new SoapClient(NULL, $options);

$nombre = "Usuario"; 

echo $client->saludar($nombre . '!!') . "</br>"; 

$num1 = 10;
$num2 = 5;

echo "El resultado de la suma es: " . $client->suma($num1, $num2) . "</br>"; 
echo "El resultado de la resta es: " . $client->resta($num1, $num2) . "</br>"; 
echo "El resultado de la multiplicación es: " . $client->multiplicacion($num1, $num2) . "</br>"; 
echo "El resultado de la división es: " . $client->division($num1, $num2) . "</br>"; 
?>