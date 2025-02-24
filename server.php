<?php 
require('conexion.php'); 

class serverSoap extends Conexion 
{
    public function saludar($name)
    {
        return 'Hola, '.$name.'!'; 
    }  

    public function suma($num1, $num2)
    {
        return $num1 + $num2;  
    } 

    public function resta($num1, $num2)
    {
        return $num1 - $num2;  
    } 

    public function multiplicacion($num1, $num2)
    {
        return $num1 * $num2;  
    } 

    public function division($num1, $num2)
    {
        if ($num2 == 0) {
            return "Error: División por cero.";
        }
        return $num1 / $num2;  
    } 
}

// Crear un nuevo servidor SOAP 
$options = array('uri' => 'http://localhost/webservices/appwebservices/'); 

// Instanciar el servidor SOAP 
$server = new SoapServer(NULL, $options);

// Configurar qué clase manejará las solicitudes SOAP 
$server->setClass('serverSoap'); 

// Procesar las solicitudes SOAP 
$server->handle();
?>