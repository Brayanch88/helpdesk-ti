<?php
// Incluir el archivo de conexión a la base de datos
include_once '../MODELO/conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $asunto = $_POST['asunto'];
    $descripcion = $_POST['descripcion'];
    $area = $_POST['area'];
    $categoria = $_POST['categoria'];

    // Verificar si se ha subido un archivo
    if (isset($_FILES['adjunto']) && $_FILES['adjunto']['error'] === UPLOAD_ERR_OK) {
        // Obtener la información del archivo
        $nombre_archivo = $_FILES['adjunto']['name'];
        $ruta_temporal = $_FILES['adjunto']['tmp_name'];
        $ruta_destino = "../uploads/" . basename($nombre_archivo);

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
            // Insertar los datos en la base de datos
            $query = "INSERT INTO tb_ticket (asunto, descripcion, area, categoria, adjunto) 
                      VALUES ('$asunto', '$descripcion', '$area', '$categoria', '$ruta_destino')";

            if ($conexion->query($query) === TRUE) {
                // Si la inserción fue exitosa, redirigir o mostrar un mensaje
                echo "Ticket creado exitosamente.";
                // Redirigir a la página principal o mostrar un mensaje de éxito
                // header("Location: success.php");
            } else {
                echo "Error al crear el ticket: " . $conexion->error;
            }
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        // Si no se subió ningún archivo, solo insertamos los datos sin archivo
        $query = "INSERT INTO tb_ticket (asunto, descripcion, area, categoria) 
                  VALUES ('$asunto', '$descripcion', '$area', '$categoria')";

        if ($conexion->query($query) === TRUE) {
            header('Location: ../VISTA/salida.php');
        } else {
            echo "Error al crear el ticket: " . $conexion->error;
        }
    }
} else {
    // Si no es una solicitud POST, redirigir o mostrar error
    echo "Acción no permitida.";
}
