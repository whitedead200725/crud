<?php
define("NOMBRE_DB","localhost");
define("USUARIO_DB","fer");
define("CONTRA_DB","2501");
define("DATABASE_DB","EmiCrud");

function ConectarDB() {
    $conexion = mysqli_connect(NOMBRE_DB, USUARIO_DB, CONTRA_DB, DATABASE_DB);
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    return $conexion;
}
$mysqli = ConectarDB();
?>