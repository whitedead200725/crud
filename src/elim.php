<?php
include "conex.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $consulta = "DELETE FROM Alumnos WHERE ID = $id";
    $consulta2 = "DELETE FROM Usuarios WHERE ID = $id";
    
    if (mysqli_query($mysqli, $consulta ) && mysqli_query($mysqli, $consulta2)) {
        echo "Alumno eliminado con éxito!";
    } else {
        echo "Error al eliminar el alumno: " . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

    header("Location: index.php");
    exit();
} else {
    echo "ESTA MAL!!!!, EN ALGOOOO";
}
?>
