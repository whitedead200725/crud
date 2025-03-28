<?php
include "conex.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM Alumnos WHERE ID = '$id'";
    $resultado = mysqli_query($mysqli, $sql);
    $alumno = mysqli_fetch_assoc($resultado);
}

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

    $consulta =     "UPDATE Alumnos 
                    SET NIE = '$nie', nombre_com = '$nombre', genero = '$genero', email = '$email', telefono = '$telefono', P1 = '$P1', P2 = '$P2', P3 = '$P3', P4 = '$P4' 
                    WHERE ID = '$id'";

    $consulta2 =    "UPDATE Usuarios 
                    SET nombre_com = '$nombre', genero = '$genero', NIE = '$nie'
                    WHERE ID = '$id'";


    if (mysqli_query($mysqli, $consulta) && mysqli_query($mysqli, $consulta2)) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar alumno: " . mysqli_error($mysqli);
    }


    mysqli_close($mysqli);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Estu</title>
</head>
<body class="container">
    <div class="container p-5">
        <h2>Editar info de <?php echo $alumno['nombre_com']; ?></h2>
        <form method="POST">
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="nie" value="<?php echo $alumno['NIE']; ?>" placeholder="NIE">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="nombre" value="<?php echo $alumno['nombre_com']; ?>" placeholder="Nombre">
            </div>
            <div class="form-group mb-3">
                <select name="genero" class="form-select">
                    <option value="H" <?php if ($alumno['genero'] == 'H') echo 'selected'; ?>>Hombre</option>
                    <option value="M" <?php if ($alumno['genero'] == 'M') echo 'selected'; ?>>Mujer</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" value="<?php echo $alumno['email']; ?>" placeholder="Correo">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="telefono" value="<?php echo $alumno['telefono']; ?>" placeholder="Telefono">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P1" value="<?php echo $alumno['P1']; ?>" placeholder="P1">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P2" value="<?php echo $alumno['P2']; ?>" placeholder="P2">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P3" value="<?php echo $alumno['P3']; ?>" placeholder="P3">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P4" value="<?php echo $alumno['P4']; ?>" placeholder="P4">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
