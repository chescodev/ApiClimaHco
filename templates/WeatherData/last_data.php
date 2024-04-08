<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<h1>últimos datos registrados</h1>
<div class="bento-grid">
    <div class="bento-grid-item">
        <div class="name">Día</div>
        <div class="value"><?=$lastData->time ?></div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Temperatura</div>
        <div class="value"><?=$lastData->outdoor_temp ?> C°</div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Humedad</div>
        <div class="value"><?=$lastData->outdoor_hum ?> %</div>
    </div>
    <div class="bento-grid-item ">
        <div class="name">Velociad del Viento</div>
        <div class="value"><?=$lastData->wind_speed ?> Km/h</div>
    </div>
    <div class="bento-grid-item ">
        <div class="name">Ráfaga de Viento</div>
        <div class="value"><?=$lastData->gust ?>Km/h</div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Dirección del Viento</div>
        <div class="value"><?=$lastData->wind_dir ?></div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Punto de Rocío</div>
        <div class="value"><?=$lastData->dew_point ?> C°</div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Sensación Térmica</div>
        <div class="value"><?=$lastData->wind_chill ?> C°</div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Presión Atmosférica</div>
        <div class="value"><?=$lastData->abs_pres ?></div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Índice UV</div>
        <div class="value"><?=$lastData->uvi ?> uvi</div>
    </div>
    <div class="bento-grid-item">
        <div class="name">Índice de luz</div>
        <div class="value"><?=$lastData->light ?> lux</div>
    </div>
    <div class="bento-grid-item ">
        <div class="name">LLuvia Horaria</div>
        <div class="value"><?=$lastData->hour_rain ?></div>
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
<style>
    .bento-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(150px, 1fr));
        grid-gap: 20px;
    }

    .bento-grid-item {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        height: 160px;
    }

    .name {
        font-weight: bold;
    }

    .value {
        margin-top: 10px;
    }
</style>