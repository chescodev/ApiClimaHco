<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Luz</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Gráficos de Luz</h2>
        <?= $this->Form->create(null, ['url' => ['action' => 'graphics'], 'class' => 'date-picker']) ?>
            <div class="form-group">
                <label for="start_date">Fecha de Inicio:</label>
                <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <label for="end_date">Fecha de Fin:</label>
                <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'form-control']) ?>
            </div>
            <?= $this->Form->submit('Mostrar Gráfico', ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>

        <canvas id="lightChart" width="400" height="200"></canvas>
        <canvas id="uviChart" width="400" height="200"></canvas>
        <canvas id="outTempChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var ctx = document.getElementById('lightChart').getContext('2d');
        var lightChart = new Chart(ctx, {
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
    <script>
    var ctxUvi = document.getElementById('uviChart').getContext('2d');
    var uviChart = new Chart(ctxUvi, {
        type: 'line',
        data: {
            labels: <?= json_encode($uviLabels) ?>,
            datasets: [{
                label: 'Índice de radiación ultravioleta (UVI)',
                data: <?= json_encode($uviValues) ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
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
<script>
    var ctxoutTemp = document.getElementById('outTempChart').getContext('2d');
    var outTempChart = new Chart(ctxoutTemp, {
        type: 'line',
        data: {
            labels: <?= json_encode($outTempLabels) ?>,
            datasets: [{
                label: 'Temperatura exterior',
                data: <?= json_encode($outTempValues) ?>,
                backgroundColor: 'rgb(60, 179, 113)',
                borderColor: 'rgb(60, 179, 113)',
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
