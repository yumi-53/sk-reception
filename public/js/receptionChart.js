document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('receptionChart').getContext('2d');

    const data = receptionData;  // receptionData を使用

    const labels = data.map(item => item.month);
    const counts = data.map(item => item.count);

    const receptionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '受付人数',
                data: counts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
