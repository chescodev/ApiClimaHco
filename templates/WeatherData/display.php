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
    <?= $this->Form->create(null, ['url' => ['action' => 'display'], 'class' => 'date-picker']) ?>
        <div class="form-group">
            <label for="startDate">Fecha de Inicio:</label>
            <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <label for="endDate">Fecha de Fin:</label>
            <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <label for="dataType">Seleccionar tipo de datos:</label>
            <?= $this->Form->select('data_type', $dataTypes, ['class' => 'form-control']) ?>
        </div>
        <?= $this->Form->submit('Buscar', ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>

    <!-- Aquí puedes mostrar la tabla o el gráfico según los datos seleccionados -->

    <div class="col-md-6">
        <canvas id="dataChart" width="400" height="200"></canvas>
    </div>

    <?php if (!empty($data)) : ?>
        <h3>Datos del <?= $startDate ?> al <?= $endDate ?></h3>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr class="header">
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col"><?= ucfirst($selectedDataType) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->time->format('Y-m-d H:i:s') ?></td>
                        <td><?= $item->$selectedDataType ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <script>
        var ctxData = document.getElementById('dataChart').getContext('2d');
        var dataChart = new Chart(ctxData, {
            type: 'line',
            data: {
                labels: <?= json_encode($dataLabels) ?>,
                datasets: [{
                    label: '<?= ucfirst($selectedDataType) ?>',
                    data: <?= json_encode($dataValues) ?>,
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
