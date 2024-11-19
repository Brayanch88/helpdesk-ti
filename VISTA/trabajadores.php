<?php
include('../MODELO/conexion.php');
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Obtener el nombre de usuario desde la sesión
$usuario = $_SESSION['usuario'];

// Consulta para obtener los usuarios y sus datos
$sqlUsuarios = "SELECT u.id_usuario, u.usuario, t.tecn_resp, t.tecn_espec 
                FROM tb_usuario u 
                LEFT JOIN tb_tecnico t ON u.id_usuario = t.id_usuario";
$stmtUsuarios = $conexion->prepare($sqlUsuarios);
$stmtUsuarios->execute();
$resultadoUsuarios = $stmtUsuarios->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>
    <link rel="stylesheet" href="style-trabajadores.css">
</head>

<body>
    <div class="encabezado">
        <h2>Capital Humano</h2>
        <div class="linea"></div>
    </div>

    <div class="trabajadores">
        <ul>
            <?php
            // Recorrer los resultados y mostrar cada trabajador
            while ($fila = $resultadoUsuarios->fetch_assoc()) {
                $id_usuario = $fila['id_usuario'];
                $nombre_tecnico = $fila['tecn_resp'];
                $cargo_tecnico = $fila['tecn_espec'];
                $usuario_nombre = $fila['usuario'];
                $foto_usuario = "../VISTA/img/user" . $id_usuario . ".jpg"; // Asume que las fotos son user1.jpg, user2.jpg, etc.
            ?>
                <li>
                    <a>
                        <div class="imagen-contenedor">
                            <img src="<?php echo $foto_usuario; ?>" alt="imagen_<?php echo $id_usuario; ?>">
                        </div>
                        <span>
                            <h3><?php echo $nombre_tecnico; ?></h3>
                            <p><?php echo $cargo_tecnico; ?></p>
                            <p><?php echo $usuario_nombre; ?></p>
                            <div class="linea1"></div>
                        </span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <?php
    // Cerrar la conexión a la base de datos
    $stmtUsuarios->close();
    $conexion->close();
    ?>
</body>

</html>