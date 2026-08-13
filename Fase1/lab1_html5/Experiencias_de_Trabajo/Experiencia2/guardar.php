<?php

$nombre = $_POST["user_name"];
$correo = $_POST["user_email"];
$mensaje = $_POST["user_message"];

$datos = "Nombre: " . $nombre . "\n";
$datos .= "Correo: " . $correo . "\n";
$datos .= "Mensaje: " . $mensaje . "\n";
$datos .= "-------------------------\n";

file_put_contents("credentials.txt", $datos, FILE_APPEND);

echo "Datos guardados correctamente.";

?>
