<!-- templates/WeatherData/view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Weather Data</title>
    <!-- Agrega tus enlaces a hojas de estilo CSS aquí -->
</head>
<body>
    <h1>Weather Data</h1>
    <h2>Detalles del Dato Meteorológico</h2>
    <ul>
        <li><strong>Fecha y Hora:</strong> <?php echo $weatherData->time; ?></li>
        <li><strong>Intervalo:</strong> <?php echo $weatherData->intervalo; ?></li>
        <li><strong>Temperatura Interior:</strong> <?php echo $weatherData->indoor_temp; ?></li>
        <li><strong>Humedad Interior:</strong> <?php echo $weatherData->indoor_hum; ?></li>
        <li><strong>Temperatura Exterior:</strong> <?php echo $weatherData->outdoor_temp; ?></li>
        <li><strong>Humedad Exterior:</strong> <?php echo $weatherData->outdoor_hum; ?></li>
        <li><strong>Presión Relativa:</strong> <?php echo $weatherData->rel_pres; ?></li>
        <li><strong>Presión Absoluta:</strong> <?php echo $weatherData->abs_pres; ?></li>
        <li><strong>Velocidad del Viento:</strong> <?php echo $weatherData->wind_speed; ?></li>
        <li><strong>Ráfaga de Viento:</strong> <?php echo $weatherData->gust; ?></li>
        <li><strong>Dirección del Viento:</strong> <?php echo $weatherData->wind_dir; ?></li>
        <li><strong>Punto de Rocío:</strong> <?php echo $weatherData->dew_point; ?></li>
        <li><strong>Sensación Térmica:</strong> <?php echo $weatherData->wind_chill; ?></li>
        <li><strong>Lluvia Horaria:</strong> <?php echo $weatherData->hour_rain; ?></li>
        <li><strong>Lluvia Diaria:</strong> <?php echo $weatherData->day_rain; ?></li>
        <li><strong>Lluvia Semanal:</strong> <?php echo $weatherData->week_rain; ?></li>
        <li><strong>Lluvia Mensual:</strong> <?php echo $weatherData->month_rain; ?></li>
        <li><strong>Índice de Luz:</strong> <?php echo $weatherData->light; ?></li>
        <li><strong>Índice UV:</strong> <?php echo $weatherData->uvi; ?></li>
        <!-- Agrega más detalles según las columnas de tu tabla clima -->
    </ul>
    <p><a href="<?php echo $this->Url->build(['controller' => 'WeatherData', 'action' => 'index']); ?>">Volver a la lista de datos meteorológicos</a></p>
    <!-- Agrega tus enlaces a scripts JavaScript aquí -->
</body>
</html>