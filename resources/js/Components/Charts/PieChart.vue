<script setup>
import { onMounted } from 'vue';
import Chart from 'chart.js/auto';

onMounted(() => {
  const ctx = document.getElementById('pieChart').getContext('2d');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Patients', 'Appointments', 'Doctors', 'Surgeries'],
      datasets: [{
        label: 'Healthcare Metrics',
        data: [1364, 56, 8, 4],
        backgroundColor: [
          'rgba(34, 193, 195, 0.6)',
          'rgba(253, 187, 45, 0.6)',
          'rgba(250, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
        ],
        borderColor: [
          'rgba(34, 193, 195, 1)',
          'rgba(253, 187, 45, 1)',
          'rgba(250, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          callbacks: {
            label: function (tooltipItem) {
              return `${tooltipItem.label}: ${tooltipItem.raw}`;
            }
          }
        }
      }
    }
  });
});
</script>

<template>
  <div>
    <div class="p-6 max-w-fit">
      <canvas id="pieChart"></canvas>
    </div>
  </div>
</template>
