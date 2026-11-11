<?php

$conexion = new mysqli("localhost", "root", "", "registro_integrantes");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"] ?? "";

    $sql = "INSERT INTO integrantes (nombre) VALUES (?)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error: " . $conexion->error);
    }

    $stmt->bind_param("s", $nombre);

    if ($stmt->execute()) {

        echo "<h1>GOLDEN GHOST</h1>";
        echo "¡Integrante registrado correctamente!";
        echo "<br><br>";
        echo "<a href='act1.html'>Regresar</a>";

    } else {

        echo "Error al registrar: " . $stmt->error;

    }

    $stmt->close();
}

$conexion->close();

?>