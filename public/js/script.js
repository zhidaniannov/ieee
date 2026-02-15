// Initialize Lucide Icons
lucide.createIcons();

// Mobile Sidebar Toggle Logic
const mobileToggle = document.getElementById('mobile-toggle');
const sidebar = document.getElementById('sidebar');

if (mobileToggle) {
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
    });
}

// Close sidebar on click outside (for mobile)
document.addEventListener('click', (e) => {
    if (window.innerWidth < 1024) {
        if (!sidebar.contains(e.target) && !mobileToggle.contains(e.target)) {
            sidebar.classList.remove('open');
        }
    }
});

// Charts Implementation
document.addEventListener('DOMContentLoaded', () => {
    // 1. Line Chart (Main Revenue)
    const ctxMain = document.getElementById('mainChart');
    if (ctxMain) {
        new Chart(ctxMain, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [12000, 19000, 15000, 25000, 22000, 30000, 28000],
                    borderColor: '#303AE4',
                    backgroundColor: (context) => {
                        const chart = context.chart;
                        const {ctx, chartArea} = chart;
                        if (!chartArea) return null;
                        const gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
                        gradient.addColorStop(0, 'rgba(48, 58, 228, 0)');
                        gradient.addColorStop(1, 'rgba(48, 58, 228, 0.1)');
                        return gradient;
                    },
                    fill: true,
                    tension: 0.4,
                    borderWidth: 4,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#303AE4',
                    pointHoverBorderColor: '#fff',
                    pointHoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#F1F2F5', drawBorder: false },
                        ticks: { color: '#9CA3AF', font: { size: 10 } }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { color: '#9CA3AF', font: { size: 10 } }
                    }
                }
            }
        });
    }

    // 2. Donut Chart (Market Share)
    const ctxDonut = document.getElementById('donutChart');
    if (ctxDonut) {
        new Chart(ctxDonut, {
            type: 'doughnut',
            data: {
                labels: ['Domestic', 'Export'],
                datasets: [{
                    data: [65, 35],
                    backgroundColor: ['#FFC209', '#3F80EF'],
                    hoverOffset: 4,
                    borderWidth: 0,
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '80%',
                plugins: { legend: { display: false } }
            }
        });
    }
});