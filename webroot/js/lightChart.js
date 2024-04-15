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