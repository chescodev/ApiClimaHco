<main class="flex flex-col items-center space-y-4">
    <span class="text-2xl font-bold">Seleccionar una Fecha</span>
    <?= $this->Form->create(null, ['url' => ['action' => 'graphics'], 'class' => 'flex items-center justify-center flex-col']) ?>
    <div class="flex items-center space-x-4 mb-2">
        <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md']) ?>
        <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'flex h-10 border-input bg-background text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-[170px] px-3 py-2 border rounded-md']) ?>
    </div>
    <?= $this->Form->submit('Mostrar Gráfico', ['class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-950 text-white hover:bg-blue-900 w-[150px] h-10 px-4 py-2 text-center']) ?>
    <?= $this->Form->end() ?>

    <section class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="outTempChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="dewPointChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="windSpeedChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="windGustChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="windDirectionChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="lightChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="uviChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="absPresChart" width="400" height="200"></canvas>
        </div>
        <div class="rounded-lg border bg-card shadow-sm h-full w-full max-w-md">
            <canvas class="p-2" id="dayRainChart" width="400" height="200"></canvas>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                borderWidth: 1,
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
<script>
    var ctxDewPoint = document.getElementById('dewPointChart').getContext('2d');
    var dewPointChart = new Chart(ctxDewPoint, {
        type: 'line',
        data: {
            labels: <?= json_encode($dewPointLabels) ?>,
            datasets: [{
                label: 'Punto de rocío',
                data: <?= json_encode($dewPointValues) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
    var ctxWindSpeed = document.getElementById('windSpeedChart').getContext('2d');
    var windSpeedChart = new Chart(ctxWindSpeed, {
        type: 'line',
        data: {
            labels: <?= json_encode($windSpeedLabels) ?>,
            datasets: [{
                label: 'Velocidad del viento',
                data: <?= json_encode($windSpeedValues) ?>,
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
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
    var ctxWindGust = document.getElementById('windGustChart').getContext('2d');
    var windGustChart = new Chart(ctxWindGust, {
        type: 'line',
        data: {
            labels: <?= json_encode($windGustLabels) ?>,
            datasets: [{
                label: 'Ráfagas de viento',
                data: <?= json_encode($windGustValues) ?>,
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
<script>
    var ctxWindDirection = document.getElementById('windDirectionChart').getContext('2d');
    var windDirectionChart = new Chart(ctxWindDirection, {
        type: 'line',
        data: {
            labels: <?= json_encode($windDirectionLabels) ?>,
            datasets: [{
                label: 'Dirección del viento',
                data: <?= json_encode($windDirectionValues) ?>,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
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
    var ctxAbsPres = document.getElementById('absPresChart').getContext('2d');
    var absPresChart = new Chart(ctxAbsPres, {
        type: 'line',
        data: {
            labels: <?= json_encode($absPresLabels) ?>,
            datasets: [{
                label: 'Presión Atmosférica',
                data: <?= json_encode($absPresValues) ?>,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
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
    var ctxDayRain = document.getElementById('dayRainChart').getContext('2d');
    var dayRainChart = new Chart(ctxDayRain, {
        type: 'line',
        data: {
            labels: <?= json_encode($dayRainLabels) ?>,
            datasets: [{
                label: 'Lluvia diaria',
                data: <?= json_encode($dayRainValues) ?>,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
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