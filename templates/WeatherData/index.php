<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima Hco</title>
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
                <th>Sensación Térmica</th>
                <th>LLuvia Horaria</th>
                <th>LLuvia Diaria</th>
                <th>LLuvia Semanal</th>
                <th>LLuvia Mensual</th>
                <th>Índice de Luz</th>
                <th>Índice UV</th>
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
                    <td><?php echo $data->rel_pres; ?></td>
                    <td><?php echo $data->abs_pres; ?></td>
                    <td><?php echo $data->wind_speed; ?></td>
                    <td><?php echo $data->gust; ?></td>
                    <td><?php echo $data->wind_dir; ?></td>
                    <td><?php echo $data->dew_point; ?></td>
                    <td><?php echo $data->wind_chill; ?></td>
                    <td><?php echo $data->hour_rain; ?></td>
                    <td><?php echo $data->day_rain; ?></td>
                    <td><?php echo $data->week_rain; ?></td>
                    <td><?php echo $data->month_rain; ?></td>
                    <td><?php echo $data->light; ?></td>
                    <td><?php echo $data->uvi; ?></td>
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

<style>



</style>


