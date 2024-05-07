<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'formularior';


$conexion = mysqli_connect($server, $user, $pass, $db);


if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $tecnico = mysqli_real_escape_string($conexion, $_POST['tecnico']);

    
    if (!empty($nombre) && !empty($direccion) && !empty($telefono) && !empty($email) && !empty($precio) && !empty($tecnico)) {
        
        $sql = "INSERT INTO datos (nombre, direccion, telefono, email, precio, tecnico) 
                VALUES ('$nombre', '$direccion', '$telefono', '$email', '$precio', '$tecnico')";

        
        if (mysqli_query($conexion, $sql)) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar los datos: " . mysqli_error($conexion);
        }
    } else {
        echo "Por favor completa todos los campos del formulario.";
    }
} else {
    echo "No se recibieron datos del formulario.";
}


mysqli_close($conexion);

?>




