<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Ticket</title>

    <!-- Aquí se agrega el enlace a tu archivo de estilos CSS -->
    <link rel="stylesheet" href="style-ticket.css">
</head>

<body>

    <!-- Formulario para crear un ticket -->
    <form action="../CONTROLADOR/crear_ticket.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" required>
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>

        <div>
            <label for="area">Área/Departamento:</label>
            <select id="area" name="area" required>
                <option value="" style="color:gray ; font-style:italic">Seleccione una opción</option>
                <option value="area1">Dirección</option>
                <option value="area1">Subdirección</option>
                <option value="area1">tesorería</option>
                <option value="area1">Biblioteca</option>
                <option value="area1">Secretaría</option>
                <option value="area2">Coordinación</option>
                <option value="area3">Docentes</option>
                <option value="area1">Laboratorio de computo</option>
                <option value="area1">Laboratorio de ciencias</option>
                <option value="area1">Aula de innovación</option>
                <option value="area1">Área de IST</option>
            </select>
        </div>

        <div>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="" style="color:gray ; font-style:italic">Seleccione una opción</option>
                <option value="Problema Técnico">Errores con el software</option>
                <option value="Solicitud de Acceso">Errores con el internet</option>
                <option value="Consulta General">Errores con el Hardware</option>
            </select>
        </div>

        <div>
            <label for="adjunto">Adjuntar archivo:</label>
            <input type="file" id="adjunto" name="adjunto">
        </div>

        <button type="submit">Crear Ticket</button>
    </form>

</body>

</html>