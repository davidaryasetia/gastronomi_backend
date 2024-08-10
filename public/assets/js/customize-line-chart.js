const ctx = document.getElementById('myChart');
const allMonthLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
const allMonthData = [0, 0, 12, 19, 3, 5, 2, 3];

const dailyData = {
    '1': [1, 3, 5, 2, 9, 6, 7, 4, 3, 8, 6, 2, 5, 9, 1, 3, 4, 5, 2, 9, 6, 7, 4, 3, 8, 6, 2, 5, 9, 1],
    '2': [0, 2, 1, 5, 4, 3, 6, 4, 7, 3, 5, 6, 2, 4, 5, 7, 9, 3, 6, 7, 2, 4, 5, 7, 2, 3, 6, 7],
    '3': [2, 4, 6, 8, 10, 5, 3, 7, 9, 6, 4, 5, 8, 9, 3, 4, 6, 7, 3, 2, 6, 7, 9, 3, 2, 4, 6, 8, 10, 5, 3],
    '4': [1, 3, 5, 2, 9, 6, 7, 4, 3, 8, 6, 2, 5, 9, 1, 3, 4, 5, 2, 9, 6, 7, 4, 3, 8, 6, 2, 5, 9, 1]
};

let myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: allMonthLabels,
        datasets: [{
            label: 'Total Of Visitors',
            data: allMonthData,
            borderWidth: 1,
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Tanggal/Bulan',
                    font: {
                        size: 16
                    }
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Amount Of Visitors',
                    font: {
                        size: 16
                    }
                }
            }, 
        }
    }
});

document.getElementById('monthSelector').addEventListener('change', function () {
    const selectedMonth = this.value;
    
    if (selectedMonth === 'all') {
        myChart.data.labels = allMonthLabels;
        myChart.data.datasets[0].data = allMonthData;
    } else {
        const daysInMonth = Array.from({ length: dailyData[selectedMonth].length }, (_, i) => i + 1);
        myChart.data.labels = daysInMonth;
        myChart.data.datasets[0].data = dailyData[selectedMonth];
    }
    myChart.update();
});
