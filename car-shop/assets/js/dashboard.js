const el = document.getElementById('chartData');
const chartLabels  = JSON.parse(el.dataset.labels);
const chartRevenue = JSON.parse(el.dataset.revenue);
const chartOrders  = JSON.parse(el.dataset.orders);
const brandLabels  = JSON.parse(el.dataset.brandlabels);
const brandRevenue = JSON.parse(el.dataset.brandrevenue);

let mainChart;

function buildMainChart(type) {
    if (mainChart) mainChart.destroy();

    const dataset1 = {
        label: 'Doanh thu (VNĐ)',
        data: chartRevenue,
        backgroundColor: type === 'bar' ? '#2a78d6' : 'rgba(42,120,214,0.1)',
        borderColor: '#2a78d6',
        borderWidth: 2,
        tension: 0.4,
        fill: type === 'line',
        yAxisID: 'y'
    };

    const dataset2 = {
        label: 'Số đơn hàng',
        data: chartOrders,
        backgroundColor: type === 'bar' ? '#1baf7a' : 'rgba(27,175,122,0.1)',
        borderColor: '#1baf7a',
        borderWidth: 2,
        tension: 0.4,
        fill: type === 'line',
        yAxisID: 'y1'
    };

    // borderRadius chỉ thêm khi là bar, không thêm cho line
    if (type === 'bar') {
        dataset1.borderRadius = 4;
        dataset2.borderRadius = 4;
    }

    mainChart = new Chart(document.getElementById('chartDoanhThu'), {
        type: type,
        data: {
            labels: chartLabels,
            datasets: [dataset1, dataset2]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: {
                    ticks: { color: '#898781', autoSkip: false },
                    grid: { color: '#e1e0d9' }
                },
                y: {
                    position: 'left',
                    ticks: {
                        color: '#898781',
                        callback: v => new Intl.NumberFormat('vi-VN', { notation: 'compact' }).format(v)
                    },
                    grid: { color: '#e1e0d9' }
                },
                y1: {
                    position: 'right',
                    ticks: { color: '#898781', callback: v => v + ' đơn' },
                    grid: { drawOnChartArea: false }
                }
            }
        }
    });
}

function switchChart(type) {
    buildMainChart(type);
    const active   = 'padding:8px 18px;border-radius:10px;border:1px solid #d1d5db;cursor:pointer;font-size:13px;font-weight:bold;background:#2563eb;color:#fff;';
    const inactive = 'padding:8px 18px;border-radius:10px;border:1px solid #d1d5db;cursor:pointer;font-size:13px;font-weight:bold;background:#fff;color:#111827;';
    document.getElementById('btn-bar').style.cssText  = type === 'bar'  ? active : inactive;
    document.getElementById('btn-line').style.cssText = type === 'line' ? active : inactive;
}

buildMainChart('bar');

/* Biểu đồ hãng xe */
const ctxBrand = document.getElementById('chartHangXe');
if (ctxBrand && brandLabels.length > 0) {
    new Chart(ctxBrand, {
        type: 'bar',
        data: {
            labels: brandLabels,
            datasets: [{
                label: 'Doanh thu',
                data: brandRevenue,
                backgroundColor: ['#2a78d6','#1baf7a','#eda100','#4a3aa7','#e34948','#eb6834'],
                borderRadius: 4
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: {
                    ticks: {
                        color: '#898781',
                        callback: v => new Intl.NumberFormat('vi-VN', { notation: 'compact' }).format(v)
                    },
                    grid: { color: '#e1e0d9' }
                },
                y: {
                    ticks: { color: '#52514e' },
                    grid: { display: false }
                }
            }
        }
    });
}