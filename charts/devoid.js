document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('truid').getContext('2d');

    
    const lineChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], 
        datasets: [{
            label: 'Compliance Status',
            data: [65, 59, 80, 81, 56, 55, 40], 
            fill: false, // No fill under the line
            borderColor: '#00BDD6', // Line color
            tension: 0.1 // Smooth line
        }]
    };

    const options = {
        responsive: true,
        plugins: {
            tooltip: {
                enabled: true,
                mode: 'index'
            },
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Compliance Status Comparison'
            }
        },
        layout: {
            padding: {
                top: 20,
                bottom: 20,
                left: 20,
                right: 20
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Month' // Example title for x-axis
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Value' // Example title for y-axis
                }
            }
        }
    };

    new Chart(ctx, {
        type: 'line',
        data: lineChartData,
        options: options
    });
});
