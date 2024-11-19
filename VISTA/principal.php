<?php
include('../MODELO/conexion.php');
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Obtener el nombre de usuario desde la sesión
$usuario = $_SESSION['usuario'];

// Consulta para obtener el `id_usuario` desde la tabla `tb_usuario`
$sqlUsuario = "SELECT id_usuario FROM tb_usuario WHERE usuario = ?";
$stmtUsuario = $conexion->prepare($sqlUsuario);
$stmtUsuario->bind_param("s", $usuario);
$stmtUsuario->execute();
$resultadoUsuario = $stmtUsuario->get_result();

if ($resultadoUsuario->num_rows > 0) {
    // Obtener el `id_usuario` correspondiente
    $filaUsuario = $resultadoUsuario->fetch_assoc();
    $id_usuario = $filaUsuario['id_usuario'];

    // Consulta para obtener `tecn_resp` y `tecn_espec` de la tabla `tb_tecnico`
    $sqlTecnico = "SELECT tecn_resp, tecn_espec FROM tb_tecnico WHERE id_usuario = ?";
    $stmtTecnico = $conexion->prepare($sqlTecnico);
    $stmtTecnico->bind_param("i", $id_usuario);
    $stmtTecnico->execute();
    $resultadoTecnico = $stmtTecnico->get_result();

    if ($resultadoTecnico->num_rows > 0) {
        // Obtener los valores de `tecn_resp` y `tecn_espec`
        $filaTecnico = $resultadoTecnico->fetch_assoc();
        $tecn_resp = $filaTecnico['tecn_resp'];
        $tecn_espec = $filaTecnico['tecn_espec'];
    } else {
        $_SESSION['usuario'] = "Responsable no encontrado";
    }
} else {
    $_SESSION['usuario'] = "Usuario no encontrado";
}

// Cerrar los statement
$stmtUsuario->close();
$stmtTecnico->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="styles1.css">
</head>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>
    <div class="barra-lateral">
        <div class="nombre-pagina">
            <ion-icon id="foto" name="person-circle-outline"></ion-icon>
            <div>
                <span><?php echo $tecn_resp; ?></span>
                <br>
                <span><?php echo $tecn_espec; ?></span>
            </div>
        </div>

        <button class="boton" id="abrirModal">
            <ion-icon name="ticket-outline"></ion-icon>
            <span>Nuevo Ticket</span>
        </button>

        <div id="modalTicket" class="modal">
            <div class="modal-contenido">
                <span id="cerrarModal">&times;</span>
                <iframe id="iframeTicket" src="" width="100%" height="500px" style="border:none;"></iframe>
            </div>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a id="dashboard" data-page="dashboard.php">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a data-page="departamentos.php">
                        <ion-icon name="business-outline"></ion-icon>
                        <span>Departamentos</span>
                    </a>
                </li>
                <li>
                    <a data-page="trabajadores.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Trabajadores</span>
                    </a>
                </li>
                <li>
                    <a data-page="calendario.php">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <span>Calendario</span>
                    </a>
                </li>
                <li>
                    <a data-page="reportes.php">
                        <ion-icon name="clipboard-outline"></ion-icon>
                        <span>Reportes</span>
                    </a>
                </li>
                <li>
                    <a data-page="mensajes.php">
                        <ion-icon name="mail-unread-outline"></ion-icon>
                        <span>Tickets</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="linea"></div>

        <div class="modo-oscuro">
            <div class="info">
                <ion-icon name="moon-outline"></ion-icon>
                <span>Modo oscuro</span>
            </div>
            <div class="switch">
                <div class="base">
                    <div class="circulo"></div>
                </div>
            </div>
        </div>

        <nav class="navegacion">
            <ul>
                <li style="margin-top: 50px">
                    <a data-page="configuracion.php">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <main id="main-content">
        <!-- El contenido del dashboard se cargará automáticamente aquí -->
    </main>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Verificación en JS -->
    <script defer src="../CONTROLADOR/script.js"></script>
    <script defer src="../CONTROLADOR/script1.js"></script>
</body>

</html>