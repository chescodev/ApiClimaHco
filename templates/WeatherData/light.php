<?php

use function PHPSTORM_META\type;
?>
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
    <?= $this->Form->create(null, ['url' => ['action' => 'light'], 'class' => 'date-picker']) ?>
        <div class="form-group">
            <label for="startDateLight">Fecha de Inicio:</label>
            <?= $this->Form->input('start_date_light', ['type' => 'date','class'=> 'form-control']) ?>
        </div>
        <div class="form-group">
            <label for="endDateLight">Fecha de Fin:</label>
            <?= $this->Form->input('end_date_light', ['type'=> 'date', 'class' => 'form-control']) ?>
        </div>
        <?= $this->Form->submit('Mostrar Luz', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>

    <h3>Datos del <?= $startDateLight ?> al <?= $endDateLight ?></h3>
    <div class="grupo">
    <?php if (!empty($lightData)) : ?>
        <table class="table table-hover">
        <thead class="thead-dark">
            <tr class="header">
                <th scope="col"> Fecha y Hora</th>
                <th scope="col"> Índice de luz</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lightData as $data) : ?>
                <tr>
                    <td scope="row"><?= $data->time->format('Y-m-d H:i:s') ?></td>       
                    <td><?php echo $data->light; ?>lux </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    
    <?php endif; ?>

    <div class="col-md-6">
        <canvas id="lightChart" width="400" height="200"></canvas>
    </div>
    </div>
    <script>
        var ctxLight = document.getElementById('lightChart').getContext('2d');
        var lightChart = new Chart(ctxLight, {
            type: 'line',
            data: {
                labels: <?= json_encode($lightLabels) ?>,
                datasets: [{
                    label: 'Intensidad de luz',
                    data: <?= json_encode($lightValues) ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
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


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    table {
        max-width: 30%;
    }
    
    .grupo {
        display: flex;
    }
</style>