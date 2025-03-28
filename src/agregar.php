<?php
include "conex.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nie = $_POST['nie'];
    $nombre = $_POST['nombre'];
    $genero = $_POST['genero'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $P1 = $_POST['P1'];
    $P2 = $_POST['P2'];
    $P3 = $_POST['P3'];
    $P4 = $_POST['P4'];


    $consulta = "INSERT INTO Alumnos (NIE, nombre_com, genero, email, telefono, P1, P2, P3, P4) 
            VALUES ('$nie', '$nombre', '$genero', '$email', '$telefono', '$P1', '$P2', '$P3', '$P4')";

    $consulta2 = "INSERT INTO Usuarios (nombre_com, genero, NIE)
            VALUES ('$nombre', '$genero', '$nie')";

if (mysqli_query($mysqli, $consulta) && mysqli_query($mysqli, $consulta2)) {
    header("Location: index.php");
    }
else 
    {
    echo "Error al agregar alumno: " . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>
