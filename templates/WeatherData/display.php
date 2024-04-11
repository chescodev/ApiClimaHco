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

    <?= $this->Form->create(null, ['url' => ['action' => 'display'], 'class' => 'flex items-center justify-center']) ?>
        <div class="relative">
            <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha Inicial']) ?>
        </div>
        <span class="mx-4 text-gray-500">hasta</span>
        <div class="relative">
            <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha final']) ?>
        </div>
        <div class="relative mx-4">
            <?= $this->Form->select('data_type', $dataTypes, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 py-2.5', 'placeholder' => 'Seleccionar Tipo de Dato']) ?>
        </div>
        <div class="relative">
            <?= $this->Form->button('Buscar', ['class' => 'py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg 
            border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100']) ?>
        </div>
    <?= $this->Form->end() ?>


    <div class="datos">
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
    </div>

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
<style>

    table {
        max-width: 30%;
    }

    .datos {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
