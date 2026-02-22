<footer class="mt-10 py-6 text-center text-sm text-gray-500">
    © MALAKA 2026
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const weeklyData = <?= json_encode($data['weeklyData']) ?>;

// Format tanggal biar lebih rapi (contoh: 22 Feb)
const labels = weeklyData.map(item => {
    const date = new Date(item.date);
    return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short' });
});

const totals = weeklyData.map(item => item.total);

const ctx = document.getElementById('visitorChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Jumlah Visitor',
            data: totals,
            borderWidth: 1,
            borderRadius: 8,
            barThickness: 40
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
</body>
</html>