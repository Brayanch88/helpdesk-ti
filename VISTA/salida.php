<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Tickets</title>
    <style>
        /* Estilos para la ventana emergente */
        .modal {
            display: block;
            /* Ahora la ventana emergente se muestra por defecto */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            text-align: center;
        }

        .modal-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .modal-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <!-- Ventana emergente de agradecimiento -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Gracias por registrar su problema/incidencia</h2>
            <p>El equipo de soporte la atenderá en la brevedad.</p>
            <!-- Modificar el botón para que solo cierre el modal -->
            <button class="modal-button" onclick="closeModal()">OK</button>
        </div>
    </div>

    <script>
        // Función para cerrar el modal sin redirigir
        function closeModal() {
            document.getElementById('modal').style.display = 'none'; // Oculta el modal
        }
    </script>

</body>

</html>