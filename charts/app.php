<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx1 = document.getElementById('children').getContext('2d');
    const ctx2 = document.getElementById('stongone').getContext('2d');
    const ctx3 = document.getElementById('acquisitions').getContext('2d');
    const ctx4 = document.getElementById('beatit').getContext('2d');

    const orderNumbersData = {
        labels: ['Order Numbers'],
        datasets: [{
            data: [<?php echo $orderNumbersPercentage; ?>, 100 - <?php echo $orderNumbersPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    const overallWeightData = {
        labels: ['Overall Weight'],
        datasets: [{
            data: [<?php echo $overallWeightPercentage; ?>, 100 - <?php echo $overallWeightPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    const totalData = {
        labels: ['TOTAL'],
        datasets: [{
            data: [<?php echo $totalPercentage; ?>, 100 - <?php echo $totalPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    const totalCountData = {
        labels: ['TOTAL COUNT'],
        datasets: [{
            data: [<?php echo $totalCountPercentage; ?>, 100 - <?php echo $totalCountPercentage; ?>],
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    // Options for all charts
    const options = {
        responsive: true,
        plugins: {
            tooltip: {
                enabled: false
            },
            legend: {
                display: false
            },
            title: {
                display: true,
                text: (ctx) => {
                    if (ctx.chart.canvas.id === 'children') {
                        return 'Order Numbers';
                    } else if (ctx.chart.canvas.id === 'stongone') {
                        return 'Overall Weight';
                    } else if (ctx.chart.canvas.id === 'acquisitions') {
                        return 'TOTAL';
                    } else if (ctx.chart.canvas.id === 'beatit') {
                        return 'TOTAL COUNT';
                    }
                }
            },
            datalabels: {
                formatter: (value, ctx) => {
                    return ctx.chart.data.labels[0] + '\n' + value + '%'; // Display label and value with %
                },
                color: 'black', // Label text color
                anchor: 'end',
                align: 'start',
                offset: 5,
                font: {
                    weight: 'bold'
                }
            }
        },
    };

    new Chart(ctx1, {
        type: 'doughnut',
        data: orderNumbersData,
        options: options
    });

    new Chart(ctx2, {
        type: 'doughnut',
        data: overallWeightData,
        options: options
    });

    new Chart(ctx3, {
        type: 'doughnut',
        data: totalData,
        options: options
    });

    new Chart(ctx4, {
        type: 'doughnut',
        data: totalCountData,
        options: options
    });
});