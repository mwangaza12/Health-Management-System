<script setup>
import { onMounted } from 'vue';
import Chart from 'chart.js/auto';

onMounted(() => {
  const ctx = document.getElementById('myChart').getContext('2d');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Appointments', 'Consultations', 'Surgeries', 'Admissions', 'Discharges', 'Lab Tests'],
      datasets: [{
        label: 'Weekly Activities',
        data: [120, 200, 45, 80, 90, 150],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 206, 86, 0.2)',
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 206, 86, 1)',
        ],
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
</script>

<template>
  <div class="p-6">
    <canvas id="myChart"></canvas>
  </div>
</template>
