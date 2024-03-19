<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
<?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'date-picker']) ?>
        <div class="form-group">
            <label for="start_date">Fecha de Inicio:</label>
            <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <label for="end_date">Fecha de Fin:</label>
            <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'form-control']) ?>
        </div>
        <?= $this->Form->submit('Buscar', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>



<?php if (!empty($weatherData)) : ?>
    <h3>Datos del <?= $selectedDate ?></h3>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr class="header">
                <th scope="col"> Fecha y Hora</th>
                <th scope="col"> Intervalo</th>
                <th scope="col"> Temperatura Exterior</th>   
                <th scope="col"> Humedad Exterior</th>
                <th scope="col"> Velociad del Viento</th>
                <!--th> Ráfaga del Viento</th-->   
                <th scope="col"> Gust</th>
                <th scope="col"> Dirección del Viento</th>
                <th scope="col"> Punto de Rocío</th>
                <th scope="col"> Sensación Térmica</th> 

                <th scope="col">Índice UV</th>
                <th scope="col">Índice de luz</th>

                <!--

                <th scope="col"> LLuvia Horaria</th>
                <th scope="col"> LLuvia Diaria</th>
                <th scope="col"> LLuvia Semanal</th>
                <th scope="col"> LLuvia Mensual</th>
                -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weatherData as $data) : ?>
                <tr>
                    <td scope="row"><?= $data->time->format('Y-m-d H:i:s') ?></td>
                    <td><?php echo $data->intervalo; ?></td>
                    <td><?php echo $data->outdoor_temp; ?> °C</td>
                    <td><?php echo $data->outdoor_hum; ?> %</td>
                    <td><?php echo $data->wind_speed; ?> Km/h</td>
    
                    <td><?php echo $data->gust; ?> Km/h</td>
                    <td><?php echo $data->wind_dir; ?></td>
                    <td><?php echo $data->dew_point; ?> °C</td>
                    <td><?php echo $data->wind_chill; ?> °C</td>
    
                    <td><?php echo $data->uvi; ?> lux</td>
                    <td><?php echo $data->light; ?> </td>
    
                    <!-- $data->hour_rain
                        $data->day_rain
                        $data->week_rain
                        $data->month_rain
                    -->
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
<?php endif; ?>
<canvas id="temperatureChart" width="400" height="200"></canvas>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    var ctx = document.getElementById('temperatureChart').getContext('2d');
    var temperatureChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Temperatura Exterior Promedio',
                data: <?= json_encode($data) ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<style>
    .date-picker {
        width: 40%;
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
    }
</style>