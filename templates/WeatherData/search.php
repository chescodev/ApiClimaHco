<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?= $this->Form->create(null, ['url' => ['action' => 'search']]) ?>
<?= $this->Form->input('selected_date', ['type' => 'date']) ?>
<?= $this->Form->submit('Search') ?>
<?= $this->Form->end() ?>



<?php if (!empty($weatherData)) : ?>
    <h3>Weather Data for <?= $selectedDate ?></h3>
    <table>
        <tr class="header">
                <th> Fecha y Hora</th>
                <th> Intervalo</th>
                <th> Temperatura Exterior</th>
                <th> Humedad Exterior</th>
                <th> Velociad del Viento</th>
                <!--th> Ráfaga del Viento</th-->

                <th> Gust</th>
                <th> Dirección del Viento</th>
                <th> Punto de Rocío</th>
                <th> Sensación Térmica</th>

                <th> Índice UV</th>
                <th> Índice de Luz</th>

                <th> LLuvia Horaria</th>
                <th> LLuvia Diaria</th>
                <th> LLuvia Semanal</th>
                <th> LLuvia Mensual</th>
        </tr>
        <?php foreach ($weatherData as $data) : ?>
            <tr>
                <td><?= $data->time->format('Y-m-d H:i:s') ?></td>
                <td><?php echo $data->intervalo; ?></td>
                <td><?php echo $data->outdoor_temp; ?></td>
                <td><?php echo $data->outdoor_hum; ?></td>
                <td><?php echo $data->wind_speed; ?></td>

                <td><?php echo $data->gust; ?></td>
                <td><?php echo $data->wind_dir; ?></td>
                <td><?php echo $data->dew_point; ?></td>
                <td><?php echo $data->wind_chill; ?></td>

                <td><?php echo $data->uvi; ?></td>
                <td><?php echo $data->light; ?></td>

                <td><?php echo $data->hour_rain; ?></td>
                <td><?php echo $data->day_rain; ?></td>
                <td><?php echo $data->week_rain; ?></td>
                <td><?php echo $data->month_rain; ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<canvas id="temperatureChart" width="400" height="200"></canvas>
</body>
</html>

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