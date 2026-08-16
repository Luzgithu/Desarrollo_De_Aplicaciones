<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido.");
}

$nombre = trim($_POST["user_name"] ?? "");
$correo = trim($_POST["user_email"] ?? "");
$mensaje = trim($_POST["user_message"] ?? "");

if ($nombre === "" || $correo === "" || $mensaje === "") {
    exit("Todos los campos son obligatorios.");
}

$datos  = "Nombre: " . $nombre . "\n";
$datos .= "Correo: " . $correo . "\n";
$datos .= "Mensaje: " . $mensaje . "\n";
$datos .= "-------------------------\n";

file_put_contents(
    "mensajes.txt",
    $datos,
    FILE_APPEND | LOCK_EX
);

echo "Datos guardados correctamente.";

?>
