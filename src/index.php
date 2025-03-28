<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SNKschool | Alumnos</title>
</head>
<body class="container-fluid">
<div class="container-fluid p-5 row">
    
<form action="agregar.php" method="POST" class="col-4">
            
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="nie" placeholder="NIE" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <select name="genero" class="form-select" required>
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Correo" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="telefono" placeholder="Teléfono" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P1" placeholder="P1" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P2" placeholder="P2" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P3" placeholder="P3" required autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <input type="number" class="form-control" name="P4" placeholder="P4" required autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary w-100">Agregar Alumno</button>
        </form>


    <div class="col-8">
        <h2>Lista de Alumnos</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th>NIE</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Periodo 1</th>
                    <th>Periodo 2</th>
                    <th>Periodo 3</th>
                    <th>Periodo 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                include "conex.php";
                $sql = "SELECT * FROM Alumnos";
                $resultado = mysqli_query($mysqli, $sql);
                if ($resultado) {
                    while ($fila = mysqli_fetch_array($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['ID'] . "</td>";
                        echo "<td>" . $fila['NIE'] . "</td>";
                        echo "<td>" . $fila['nombre_com'] . "</td>";
                        echo "<td>" . $fila['genero'] . "</td>";
                        echo "<td>" . $fila['email'] . "</td>";
                        echo "<td>" . $fila['telefono'] . "</td>";
                        echo "<td>" . $fila['P1'] . "</td>";
                        echo "<td>" . $fila['P2'] . "</td>";
                        echo "<td>" . $fila['P3'] . "</td>";
                        echo "<td>" . $fila['P4'] . "</td>";
                        echo "<td>
                        <a href='edit.php?id=" . $fila['ID'] . "' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='elim.php?id=" . $fila['ID'] . "' class='btn btn-danger btn-sm'>Eliminar</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No hay alumnos registrados</td></tr>";
                }
                mysqli_close($mysqli);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
