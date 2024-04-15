<main class="flex flex-col items-center space-y-4">
    <section class="grid gap-1.5">
        <h1 class="text-3xl font-semibold tracking-tight">Clima de Huánuco


        </h1>
        <p class="text-sm leading-none text-gray-500">Estación IHUANCUO2</p>
    </section>
    <section flex items-center space-x-4>
        <div class="grid gap-0.5 items-center border-2 border-gray-500 rounded-lg p-6">
            <p class="text-sm font-medium leading-none">Temperatura</p>
            <p class="text-4xl font-extrabold tracking-tighter leading none"><?= $lastData->outdoor_temp ?> C°</p>
        </div>
    </section>
    <?php
    function grados_a_letras($grados)
    {
        $direccion = array(
            "N", "NNE", "NE", "ENE",
            "E", "ESE", "SE", "SSE",
            "S", "SSW", "SW", "WSW",
            "W", "WNW", "NW", "NNW"
        );
        $indice = round($grados / (360. / count($direccion)));
        return $direccion[($indice % count($direccion))];
    }

    // Ejemplo de uso
    $grados = $lastData->wind_dir; // Suponiendo que $lastData->wind_dir contiene los grados de la dirección del viento
    $direccion_letras = grados_a_letras($grados);
    ?>
    <section class="grid w-full max-w-sm grid-cols-2 items-center gap-1.5">
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/temperature.svg') ?>" alt="Icono de Termómetro">
            <div class="text-sm">Temperatura: <?= $lastData->outdoor_temp ?>°C</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/droplet.svg') ?>" alt="Icono de Humedad">
            <div class="text-sm">Humedad: <?= $lastData->outdoor_hum ?>%</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/wind.svg') ?>" alt="Icono de Velocidad del Viento">
            <div class="text-sm">Velocidad del Viento: <?= $lastData->wind_speed ?>Km/h</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/gust.svg') ?>" alt="Icono de Ráfaga de Viento">
            <div class="text-sm">Ráfaga de Viento: <?= $lastData->gust ?>Km/h</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/windsock.svg') ?>" alt="Icono de Dirección del Viento">
            <div class="text-sm">Dirección del Viento: <?php echo $direccion_letras; ?></div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/dewpoint.svg') ?>" alt="Icono de Punto de Rocío">
            <div class="text-sm">Punto de Rocío: <?= $lastData->dew_point ?>°C</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/temperature.svg') ?>" alt="Icono de Sensación Térmica">
            <div class="text-sm">Sensación Térmica: <?= $lastData->wind_chill ?>°C</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/atmos.svg') ?>" alt="Icono de Presión">
            <div class="text-sm">Presión: <?= $lastData->abs_pres ?></div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/uvindex.svg') ?>" alt="Icono de Riesgo UV">
            <div class="text-sm">Índice UV: <?= $lastData->uvi ?> uvi</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/sun.svg') ?>" alt="Icono de Energía Solar">
            <div class="text-sm">Índice de luz: <?= $lastData->light ?> lux</div>
        </div>
        <div class="flex items-center space-x-2">
            <img src="<?= $this->Url->webroot('img/cloud.svg') ?>" alt="Icono de Lluvia">
            <div class="text-sm">LLuvia Horaria: <?= $lastData->hour_rain ?></div>
        </div>
    </section>
</main>