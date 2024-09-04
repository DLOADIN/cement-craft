document.addEventListener("DOMContentLoaded", function () {
  const ctx1 = document.getElementById('children').getContext('2d');
  const ctx2 = document.getElementById('stongone').getContext('2d');
  const ctx3 = document.getElementById('valueable').getContext('2d');


  // Data and configuration for the first doughnut chart
  const emergingTrendsData = {
      labels: ['Regulatory Compliance Status'],
      datasets: [{
          data: [89, 11],
          backgroundColor: ['#00BDD6', '#D0D3D4'],
          hoverBackgroundColor: ['#00BDD6', '#BFC9CA']
      }]
  };

  // Data and configuration for the second doughnut chart
  const priceFluctuationsData = {
      labels: ['Laws & Regulatory Performance Metrics'],
      datasets: [{
          data: [78, 22],
          backgroundColor: ['#00BDD6', '#D0D3D4'],
          hoverBackgroundColor: ['#00BDD6', '#BFC9CA']
      }]
  };

  // Data and configuration for the Polar Area chart
  const complianceData = {
      labels: ['Market Assessment Compliance', 'Product Review Compliance', 'Active Communication', 'Maintenance Compliance', 'Regulatory Compliance'],
      datasets: [{
          label: 'Laws & Regulations Compliance',
          data: [30, 20, 25, 15, 10], // Example data
          backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#FF9F40', '#4BC0C0'],
          hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#FF9F40', '#4BC0C0']
      }]
  };


  // Common chart options with custom tooltip configuration
  const options = {
      responsive: true,
      plugins: {
          tooltip: {
              enabled: true,
              callbacks: {
                  label: function(context) {
                      const value = context.raw;
                      return `${value}`; // Display only the value in the tooltip
                  }
              }
          },
          legend: {
              display: false
          },
          title: {
              display: true,
              text: function(context) {
                  if (context.chart.canvas.id === 'children') {
                      return 'Regulatory Compliance Status';
                  } else if (context.chart.canvas.id === 'stongone') {
                      return 'Laws & Regulatory Performance Metrics';
                  } else if (context.chart.canvas.id === 'valueable') {
                      return 'Laws & Regulations Compliance';
                  }
                  return '';
              }
          }
      }
  };

  // Initialize the first doughnut chart
  new Chart(ctx1, {
      type: 'doughnut',
      data: emergingTrendsData,
      options: options
  });

  // Initialize the second doughnut chart
  new Chart(ctx2, {
      type: 'doughnut',
      data: priceFluctuationsData,
      options: options
  });

  // Initialize the Polar Area chart
  new Chart(ctx3, {
      type: 'polarArea',
      data: complianceData,
      options: options
  });

});
