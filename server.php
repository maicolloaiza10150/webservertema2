<?php

require('conexion.php');

class ServerSoap extends Conexion
{
    public function saludar($name)
    {
        return 'Hola, ' . $name;
    }

    public function operacion($num1, $num2)
    {
        return $num1 + $num2;
    }

    public function getProducts()
    {
        $query = "SELECT * FROM producto";
        $result = mysqli_query($this->db, $query);

        if (!$result) {
            throw new SoapFault("Server", "Error en la consulta: " . mysqli_error($this->db));
        }

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row['nombre'];
        }

        $result->close();
        return $products;
    }
    public function validarUsuario($usuario, $clave) {
        $query = "SELECT * FROM usuarios WHERE usuario = ? AND clave = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return "Los datos ingresados son válidos";
        } else {
            return "Los datos ingresados no coinciden, intente de nuevo";
        }
    }
    
}

// Configuración del servidor SOAP
$options = array(
    'uri' => 'http://localhost/webservices/appwebservices/'

);

// Instanciar el servidor SOAP (corregido el nombre de la clase)
$server = new SoapServer(null, $options);

// Configurar la clase que manejará las solicitudes
$server->setClass('ServerSoap');

// Procesar solicitudes
$server->handle();
?>