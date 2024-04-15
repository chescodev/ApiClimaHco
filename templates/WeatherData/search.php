<<<<<<< HEAD
<main class="flex flex-col items-center space-y-4">
    <span class="text-2xl font-bold">Seleccionar una Fecha</span>
    <?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'flex items-center justify-center flex-col']) ?>
    <div class="flex items-center space-x-4 mb-2">
        <?= $this->Form->input('start_date_table', ['type' => 'date', 'class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md']) ?>
        <?= $this->Form->input('end_date_table', ['type' => 'date', 'class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md']) ?>
    </div>
    <?= $this->Form->submit('Buscar', ['class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-950 text-white hover:bg-blue-900 w-[150px] h-10 px-4 py-2 text-center']) ?>
    <?= $this->Form->end() ?>

    <section class="relative overflow-x-auto ml-6">
        <?php if (!empty($weatherData)) : ?>
            <h2 class="text-lg font-semibold mb-2">Datos del <?= $startDateTable ?> al <?= $endDateTable ?></h2>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-2 py-1"> Fecha y Hora</th>
                        <th scope="col" class="px-2 py-1"> Intervalo</th>
                        <th scope="col" class="px-2 py-1"> Temperatura</th>
                        <th scope="col" class="px-2 py-1"> Humedad</th>
                        <th scope="col" class="px-2 py-1"> Velocidad del Viento</th>
                        <th scope="col" class="px-2 py-1"> Ráfaga de Viento</th>
                        <th scope="col" class="px-2 py-1"> Dirección del Viento</th>
                        <th scope="col" class="px-2 py-1"> Punto de Rocío</th>
                        <th scope="col" class="px-2 py-1"> Sensación Térmica</th>
                        <th scope="col" class="px-2 py-1"> Presión</th>
                        <th scope="col" class="px-2 py-1"> Índice UV</th>
                        <th scope="col" class="px-2 py-1"> Índice de luz</th>
                        <th scope="col" class="px-2 py-1"> LLuvia Horaria</th>
                    </tr>
                </thead>
                <tbody class="text-gray-900">
                    <?php foreach ($weatherData as $data) : ?>
                        <tr class="bg-white border-b">
                            <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap"><?= $data->time->format('Y-m-d H:i:s') ?></td>
                            <td class="px-2 py-1"><?php echo $data->intervalo; ?></td>
                            <td class="px-2 py-1"><?php echo $data->outdoor_temp; ?> °C</td>
                            <td class="px-2 py-1"><?php echo $data->outdoor_hum; ?> %</td>
                            <td class="px-2 py-1"><?php echo $data->wind_speed; ?> Km/h</td>
                            <td class="px-2 py-6"><?php echo $data->gust; ?> Km/h</td>
                            <td class="px-2 py-1"><?php echo $data->wind_dir; ?></td>
                            <td class="px-2 py-1"><?php echo $data->dew_point; ?> °C</td>
                            <td class="px-2 py-1"><?php echo $data->wind_chill; ?> °C</td>
                            <td class="px-2 py-1"><?php echo $data->abs_pres; ?> </td>
                            <td class="px-2 py-1"><?php echo $data->uvi; ?> uvi</td>
                            <td class="px-2 py-1"><?php echo $data->light; ?>lux </td>
                            <td class="px-2 py-1"><?php echo $data->hour_rain; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>
</main>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?= $this->Form->create(null, ['url' => ['action' => 'search'], 'class' => 'flex items-center justify-center']) ?>
    <div class="relative">
        <?= $this->Form->input('start_date_table', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha Inicial']) ?>
    </div>
    <span class="mx-4 text-gray-500">hasta</span>
    <div class="relative">
        <?= $this->Form->input('end_date_table', ['type' => 'date', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
             focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5', 'placeholder' => 'Seleccionar Fecha final']) ?>
    </div>
    <?= $this->Form->button('Buscar', ['class' => 'mx-4 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg 
    border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100']) ?>
<?= $this->Form->end() ?>

<?php if (!empty($weatherData)) : ?>
    <h2 class="text-4xl ">Datos del <?= $startDateTable ?> al <?= $endDateTable ?></h3>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray">
            <thead class="text-xd text-gray-700 uppercase bg-gray-50">
                <tr class="header">
                    <th scope="col" class="px-1 py-2"> Fecha y Hora</th>
                    <th scope="col" class="px-1 py-2"> Intervalo</th>
                    <th scope="col" class="px-1 py-2"> Temperatura</th>   
                    <th scope="col" class="px-1 py-2"> Humedad</th>
                    <th scope="col" class="px-1 py-2"> Velociad del Viento</th> 
                    <th scope="col" class="px-1 py-2"> Ráfaga de Viento</th>
                    <th scope="col" class="px-1 py-2"> Dirección del Viento</th>
                    <th scope="col" class="px-1 py-2"> Punto de Rocío</th>
                    <th scope="col" class="px-1 py-2"> Sensación Térmica</th> 
                    <th scope="col" class="px-1 py-2"> Presión Atmosférica</th>
                    <th scope="col" class="px-1 py-2"> Índice UV</th>
                    <th scope="col" class="px-1 py-2"> Índice de luz</th>
                    <th scope="col" class="px-1 py-2"> LLuvia Horaria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($weatherData as $data) : ?>
                    <tr class="bg-white-border-b">
                        <td scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap">
                            <?= $data->time->format('Y-m-d H:i:s') ?>
                        </td>
                        <td class="px-1 py-2 text-center"><?php echo $data->intervalo; ?></td>
                        <td class="px-1 py-2 text-center"><?php echo $data->outdoor_temp; ?> °C</td>
                        <td class="px-1 py-2 text-center"><?php echo $data->outdoor_hum; ?> %</td>
                        <td class="px-1 py-2 text-center"><?php echo $data->wind_speed; ?> Km/h</td>
                        
                        <td class="px-1 py-2 text-center"><?php echo $data->gust; ?> Km/h</td>
                        <td class="px-1 py-2 text-center"><?php echo $data->wind_dir; ?></td>
                        <td class="px-1 py-2 text-center"><?php echo $data->dew_point; ?> °C</td>
                        <td class="px-1 py-2 text-center"><?php echo $data->wind_chill; ?> °C</td>
                        <td class="px-1 py-2 text-center"><?php echo $data->abs_pres; ?> </td>
        
                        <td class="px-1 py-2 text-center"><?php echo $data->uvi; ?> uvi</td>
                        <td class="px-1 py-2 text-center"><?php echo $data->light; ?>lux </td>
                        <td class="px-1 py-2 text-center"><?php echo $data->hour_rain; ?></td>
        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="../path/to/flowbite/dist/datepicker.js"></script>
>>>>>>> 9c4032115c01c88620150ee8c284ef8fda6b062f
