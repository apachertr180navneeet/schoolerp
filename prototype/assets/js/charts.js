/**
 * EDUSYS PRO - CHART.JS DASHBOARD INITIALIZERS
 * Analytics graphs for Student strength, Fee collection, Attendance, Exam results
 */

window.EduCharts = (function () {

  const colors = {
    primary: '#1e40af',
    primaryLight: '#3b82f6',
    success: '#10b981',
    warning: '#f59e0b',
    danger: '#ef4444',
    info: '#0284c7',
    purple: '#7c3aed',
    gray: '#94a3b8',
    grid: 'rgba(226, 232, 240, 0.6)'
  };

  function initRevenueCollectionChart(canvasId) {
    const el = document.getElementById(canvasId);
    if (!el || !window.Chart) return;

    return new Chart(el, {
      type: 'bar',
      data: {
        labels: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
        datasets: [
          {
            label: 'Fees Collected (₹ Lakhs)',
            data: [42, 38, 12, 54, 48, 18, 52, 45, 15, 58, 49, 28],
            backgroundColor: 'rgba(30, 64, 175, 0.85)',
            borderRadius: 6
          },
          {
            label: 'Operating Expenses (₹ Lakhs)',
            data: [28, 29, 27, 31, 30, 29, 32, 30, 28, 33, 31, 30],
            backgroundColor: 'rgba(245, 158, 11, 0.65)',
            borderRadius: 6
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'top', labels: { boxWidth: 12, font: { family: 'Plus Jakarta Sans', size: 12 } } },
          tooltip: {
            callbacks: {
              label: (ctx) => `${ctx.dataset.label}: ₹${ctx.raw} Lakhs`
            }
          }
        },
        scales: {
          x: { grid: { display: false } },
          y: { grid: { color: colors.grid }, ticks: { callback: (val) => '₹' + val + 'L' } }
        }
      }
    });
  }

  function initAttendanceTrendChart(canvasId) {
    const el = document.getElementById(canvasId);
    if (!el || !window.Chart) return;

    return new Chart(el, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datasets: [{
          label: 'Student Attendance (%)',
          data: [94.5, 96.2, 95.8, 93.4, 95.1, 91.0],
          borderColor: colors.success,
          backgroundColor: 'rgba(16, 185, 129, 0.1)',
          tension: 0.35,
          fill: true,
          pointRadius: 4,
          pointBackgroundColor: colors.success
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          y: { min: 80, max: 100, grid: { color: colors.grid }, ticks: { callback: (v) => v + '%' } },
          x: { grid: { display: false } }
        }
      }
    });
  }

  function initClassStrengthChart(canvasId) {
    const el = document.getElementById(canvasId);
    if (!el || !window.Chart) return;

    return new Chart(el, {
      type: 'bar',
      data: {
        labels: ['Class 1-3', 'Class 4-5', 'Class 6-8', 'Class 9-10', 'Class 11', 'Class 12'],
        datasets: [
          {
            label: 'Boys',
            data: [180, 150, 230, 195, 110, 105],
            backgroundColor: 'rgba(59, 130, 246, 0.8)',
            borderRadius: 4
          },
          {
            label: 'Girls',
            data: [170, 130, 203, 160, 85, 85],
            backgroundColor: 'rgba(236, 72, 153, 0.8)',
            borderRadius: 4
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'top', labels: { boxWidth: 10 } }
        },
        scales: {
          x: { stacked: true, grid: { display: false } },
          y: { stacked: true, grid: { color: colors.grid } }
        }
      }
    });
  }

  function initPerformanceDonutChart(canvasId) {
    const el = document.getElementById(canvasId);
    if (!el || !window.Chart) return;

    return new Chart(el, {
      type: 'doughnut',
      data: {
        labels: ['Grade A1 / A2 (Distinction)', 'Grade B1 / B2 (First Class)', 'Grade C1 / C2 (Second Class)', 'Grade D (Pass)', 'Needs Improvement'],
        datasets: [{
          data: [45, 32, 14, 7, 2],
          backgroundColor: [colors.success, colors.primaryLight, colors.warning, colors.info, colors.danger],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 11 } } }
        },
        cutout: '68%'
      }
    });
  }

  return {
    revenueChart: initRevenueCollectionChart,
    attendanceChart: initAttendanceTrendChart,
    classStrengthChart: initClassStrengthChart,
    performanceChart: initPerformanceDonutChart
  };
})();
