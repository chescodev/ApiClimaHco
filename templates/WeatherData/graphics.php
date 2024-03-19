<!-- graph_search.ctp -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Datos Meteorológicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Gráficos de Datos Meteorológicos</h1>
        <?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'date-picker']) ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="start_date" class="form-label">Fecha de Inicio:</label>
                    <?= $this->Form->text('start_date', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) ?>
                </div>
                <div class="col-md-6">
                    <label for="end_date" class="form-label">Fecha de Fin:</label>
                    <?= $this->Form->text('end_date', ['class' => 'form-control datepicker', 'autocomplete' => 'off']) ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        <?= $this->Form->end() ?>

        <?php if (!empty($weatherData)) : ?>
            <h2 class="mt-4 mb-4">Datos del <?= $startDate ?> al <?= $endDate ?></h2>
            <canvas id="temperatureChart" width="800" height="400"></canvas>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            width: 100%;
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
        }
    </style>
</body>
</html>
