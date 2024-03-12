<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data</title>
    <!-- Agrega tus enlaces a hojas de estilo CSS aquí -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Estación IHUANUCO2 </h1>
    <p>Lista de datos meteorológicos:</p>
    <table>
        <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>Intervalo</th>
                <th>Temperatura Interior</th>
                <th>Humedad Interior</th>
                <th>Temperatura Exterior</th>
                <th>Humedad Exterior</th>
                <th>Presión Relativa</th>
                <th>Presión Absoluta</th>
                <th>Velociad del Viento</th>
                <th>Ráfaga del Viento</th>
                <th>Gust</th>
                <th>Dirección del Viento</th>
                <th>Punto de Rocío</th>
                <th></th>

                <!-- Agrega más encabezados según las columnas de tu tabla clima -->
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes iterar sobre los datos meteorológicos y mostrarlos -->
            <?php foreach ($weatherData as $data): ?>
                <tr>
                    <td><?php echo $data->time; ?></td>
                    <td><?php echo $data->intervalo; ?></td>
                    <td><?php echo $data->indoor_temp; ?></td>
                    <td><?php echo $data->indoor_hum; ?></td>
                    <td><?php echo $data->outdoor_temp; ?></td>
                    <td><?php echo $data->outdoor_hum; ?></td>
                    <!-- Agrega más celdas según las columnas de tu tabla clima -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->Paginator->prev('« Anterior'); ?>
    <?php echo $this->Paginator->numbers(); ?>
    <?php echo $this->Paginator->next('Siguiente »'); ?>

    <!-- Agrega tus enlaces a scripts JavaScript aquí -->
    <script src="scripts.js"></script>
</body>
</html>
