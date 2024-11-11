<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Vincular el archivo CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <div> <!-- Imagen debajo de Login -->
            <img src="http://localhost/helpdesk/VISTA/imagenes/usuario0.png" alt="Imagen de usuario">
        </div>
        <!-- Formulario de Login -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Usuario: </label>
                <input type="text" id="username" name="username" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required autocomplete="off">
            </div>

            <div>
                <a href="#" class="forgot-password">Olvidé mi contraseña</a>
            </div>

            <div class="button-container">
                <button type="submit" name="login">Iniciar Sesión</button>
            </div>

        </form>

        <?php
        include('../MODELO/conexion.php');

        // Inicializamos la variable para controlar el mensaje de error
        $error_message = '';

        // Lógica para validar el login usando PHP
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Consulta para verificar las credenciales en la base de datos
            $sql = "SELECT * FROM tb_usuario WHERE usuario = ? AND contraseña = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Si se encuentra un resultado, redirecciona a principal.php
            if ($resultado->num_rows > 0) {
                session_start(); // Iniciar sesión
                $_SESSION['usuario'] = $username; // Guardar usuario en sesión
                header("Location: principal.php"); //direccionar a principal.php
                exit(); // Terminar el script después de la redirección
            } else {
                $error_message = "Usuario o contraseña incorrectos.";
            }

            // Cerrar recursos
            $stmt->close();
            $conexion->close();
        }

        // Mostrar el mensaje de error solo si existe
        if ($error_message != '') {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
</body>

</html>