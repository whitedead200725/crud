<?php
session_start();

include "conex.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nie = $_POST['NIE'];

    $consul = "SELECT * FROM Alumnos WHERE NIE = '$nie'";
    $resultado = mysqli_query($mysqli, $consul);


    if (mysqli_num_rows($resultado) > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>NIE no encontrado, por favor intente nuevamente.</div>";
    }
    mysqli_close($mysqli);
}
?>
