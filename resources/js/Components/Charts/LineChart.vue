<script setup>
import { onMounted, ref } from 'vue';
import Chart from 'chart.js/auto';

const chartRef = ref(null);

onMounted(() => {
  const ctx = chartRef.value.getContext('2d');
  
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'Number of Patients',
        data: [50, 60, 55, 70, 65, 40, 30], // Example data for each day
        fill: false,
        borderColor: 'rgb(54, 162, 235)',
        tension: 0.1
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
      <canvas ref="chartRef"></canvas>
    </div>
</template>
