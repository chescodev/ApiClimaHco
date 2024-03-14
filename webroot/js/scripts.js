document.addEventListener('DOMContentLoaded', function () {
    fetch('/temperature-chart-data')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(entry => entry.time);
            const temperatures = data.map(entry => entry.outdoor_temp);

            const ctx = document.getElementById('temperature-chart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Temperatura Exterior',
                        data: temperatures,
                        borderColor: 'blue',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                displayFormats: {
                                    hour: 'HH:mm'
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Temperatura (°C)'
                            }
                        }
                    }
                }
            });
        });
});
