<<<<<<< HEAD
<main class="flex flex-col items-center space-y-4">
    <h1 class="text-2xl font-bold">Seleccionar una Fecha</h1>
    <?= $this->Form->create(null, ['url' => ['action' => 'display'], 'class' => 'flex items-center justify-center flex-col']) ?>
    <div class="flex items-center space-x-4 mb-2">
        <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md']) ?>
        <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md']) ?>
        <?= $this->Form->select('data_type', $dataTypes, ['class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md', 'id' => 'data_type_select', 'placeholder' => 'Seleccione su categoría']) ?>
    </div>
    <?= $this->Form->submit('Buscar', ['class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-950 text-white hover:bg-blue-900 w-[150px] h-10 px-4 py-2 text-center']) ?>
    <?= $this->Form->end() ?>

    <section class="w-full max-full overflow-auto flex flex-wrap justify-center gap-4 p-2">
        <article class="rounded-lg border bg-card text-card-foreground shadow-sm h-full w-full max-w-md">
            <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="text-center whitespace-nowrap text-xl font-semibold leading-none tracking-tight">Gráfica de <?= isset($dataTypes[$selectedDataType]) ? $dataTypes[$selectedDataType] : ucfirst($selectedDataType) ?> </h3>
                <canvas class="p-2" id="dataChart" width="400" height="200"></canvas>
            </div>
        </article>
        <article class="rounded-lg border bg-card text-card-foreground shadow-sm h-full w-full max-w-md">
            <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="text-center whitespace-nowrap text-xl font-semibold leading-none tracking-tight">Tabla de <?= isset($dataTypes[$selectedDataType]) ? $dataTypes[$selectedDataType] : ucfirst($selectedDataType) ?> </h3>
            </div>
            <div class="p-6">
                <div class="relative w-full overflow-auto">
                    <?php if (!empty($data)) : ?>
                        <table class="w-full caption-bottom text-sm">
                            <thead class="[&amp;_tr]:border-b">
                                <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                    <th class="h-12 px-4 text-left align-middle font-medium tex-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                        Fecha y Hora
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                        <?= isset($dataTypes[$selectedDataType]) ? $dataTypes[$selectedDataType] : ucfirst($selectedDataType) ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="[&amp;_tr:last-child]:border-0">
                                <?php foreach ($data as $item) : ?>
                                    <tr>
                                        <td class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted text-center"><?= $item->time->format('Y-m-d H:i:s') ?></td>
                                        <td class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted text-center"><?= $item->$selectedDataType ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctxData = document.getElementById('dataChart').getContext('2d');
    var dataChart = new Chart(ctxData, {
        type: 'line',
        data: {
            labels: <?= json_encode($dataLabels) ?>,
            datasets: [{
                label: '<?= isset($dataTypes[$selectedDataType]) ? $dataTypes[$selectedDataType] : ucfirst($selectedDataType) ?>',
                data: <?= json_encode($dataValues) ?>,
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
=======
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
>>>>>>> 9c4032115c01c88620150ee8c284ef8fda6b062f
                }]
            }
        }
    });
</script>