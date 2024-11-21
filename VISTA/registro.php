<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Tickets</title>
    <link rel="stylesheet" href="style-registro.css"> <!-- Enlace a estilos externos -->
</head>

<body>
    <form action="../CONTROLADOR/crear_ticket.php" method="POST" enctype="multipart/form-data">
        <div class="imagen"><img src="../VISTA/img/insigniasb.png" alt="Imageninf">
            <span>
                <h2>Registrar Ticket</h2>
            </span>
        </div>

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
                <option value="" style="color:gray; font-style:italic">Seleccione una opción</option>
                <option value="Dirección">Dirección</option>
                <option value="Subdirección">Subdirección</option>
                <option value="Tesorería">Tesorería</option>
                <option value="Biblioteca">Biblioteca</option>
                <option value="Secretaría">Secretaría</option>
                <option value="Coordinación">Coordinación</option>
                <option value="Docentes">Docentes</option>
                <option value="Laboratorio de cómputo">Laboratorio de cómputo</option>
                <option value="Laboratorio de ciencias">Laboratorio de ciencias</option>
                <option value="Aula de innovación">Aula de innovación</option>
                <option value="Área de IST">Área de IST</option>
            </select>
        </div>
        <div>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="" style="color:gray; font-style:italic">Seleccione una opción</option>
                <option value="Problema Técnico">Errores con el software</option>
                <option value="Solicitud de Acceso">Errores con el internet</option>
                <option value="Consulta General">Errores con el hardware</option>
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