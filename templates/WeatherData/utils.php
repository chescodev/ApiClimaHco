<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>


<script>
    tailwind.config = {
        content: ["./*.html"],
        theme: {
            extend: {
                colors: {
                    primary: {
                        blue: {
                            light: "#00ccdd"
                        }
                    }
                }
            }
        },
        darkMode: "class"
    };
</script>

<div class="row">
            <div class="col-md-6">
                <canvas id="outTempChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="dewPointChart" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="windSpeedChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="windGustChart" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="windDirectionChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="lightChart" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="uviChart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="absPresChart" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <canvas id="dayRainChart" width="400" height="200"></canvas>
            </div>
        </div>
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