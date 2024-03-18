<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clima Hco</title>
    <!-- Agrega tus enlaces a hojas de estilo CSS aquí -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Estación IHUANUCO2 </h1>
    <p>Lista de datos meteorológicos:</p>
    <!-- Agrega este formulario al principio de tu vista index.php -->
    <form action="<?= $this->Url->build(['action' => 'index']) ?>" method="get">
        <div class="form-group">
            <label for="startDate">Fecha de inicio:</label>
            <input type="date" id="startDate" name="startDate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="endDate">Fecha de fin:</label>
            <input type="date" id="endDate" name="endDate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <table class="">
        <thead>
            <tr>
                <th> <div>Fecha y Hora</div></th>
                <th> <div>Intervalo</div></th>
                <!--<th> <div>Temperatura Interior</div></th>
                <th> <div>Humedad Interior</div></th>-->
                <th> <div>Temperatura Exterior</div></th>
                <th> <div>Humedad Exterior</div></th>
                <!-- <th> <div>Presión Relativa</div></th>
                <th> <div>Presión Absoluta</div></th> -->
                <th> <div>Velociad del Viento</div></th>
                <th> <div>Ráfaga del Viento</div></th>
                <th> <div>Gust</div></th>
                <th> <div>Dirección del Viento</div></th>
                <th> <div>Punto de Rocío</div></th>
                <th> <div>Sensación Térmica</div></th>
                <th> <div>Índice UV</div></th>
                <th> <div>Índice de Luz</div></th>
                <th> <div>LLuvia Horaria</div></th>
                <th> <div>LLuvia Diaria</div></th>
                <th> <div>LLuvia Semanal</div></th>
                <th> <div>LLuvia Mensual</div></th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes iterar sobre los datos meteorológicos y mostrarlos -->
            <?php foreach ($weatherData as $data): ?>
                <tr>
                    <td><?php echo $data->time; ?></td>
                    <td><?php echo $data->intervalo; ?></td>
                    <!-- $data->indoor_temp -->
                    <!-- $data->indoor_hum -->

                    <td><?php echo $data->outdoor_temp; ?></td>
                    <td><?php echo $data->outdoor_hum; ?></td>

                    <!--  $data->rel_pres -->
                    <!--  $data->abs_pres -->

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
                    <td></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav class="pagination">
        <?php echo $this->Paginator->prev('« Anterior'); ?>
        <?php echo $this->Paginator->numbers(); ?>
        <?php echo $this->Paginator->next('Siguiente »'); ?>
    </nav>

    <!-- Agrega tus enlaces a scripts JavaScript aquí -->
    <script src="scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- jQuery UI (incluyendo el Datepicker) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

</body>
</html>

<style>
    table {
        width: auto;
        table-layout: fixed;
        overflow-x: auto;
    }

    th {
        padding: 8px;
        min-width: 100px; /* Ancho mínimo para las columnas */
    }

    /* Estilo adicional para los encabezados */
    th div {
        display: block;
    }


    #datepicker {
        width: 30%;
    }
</style>


<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>