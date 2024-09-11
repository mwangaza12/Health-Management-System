<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import LineChart from '@/Components/Charts/LineChart.vue';
import BarChart from '@/Components/Charts/BarChart.vue';
import PieChart from '@/Components/Charts/PieChart.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <!-- Dashboard Header -->
    <header class="bg-blue-600 text-white p-6 rounded-b-lg shadow-lg">
      <h1 class="text-3xl font-semibold">Dashboard Overview</h1>
      <p class="text-lg mt-2">Monitor the health metrics and activities of your system.</p>
    </header>

    <!-- Main Content -->
    <section class="container mx-auto p-6">
      <!-- Dashboard Stats -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 shadow-lg rounded-lg flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">Total Patients</h3>
            <p class="text-3xl font-bold text-green-600">1,364</p>
            <p class="text-sm text-gray-500">+12% from last month</p>
          </div>
          <i class="fas fa-users text-green-500 text-4xl"></i>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">New Appointments</h3>
            <p class="text-3xl font-bold text-red-600">56</p>
            <p class="text-sm text-gray-500">-8% from last month</p>
          </div>
          <i class="fas fa-calendar-plus text-red-500 text-4xl"></i>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">Doctors On Duty</h3>
            <p class="text-3xl font-bold text-blue-600">8</p>
            <p class="text-sm text-gray-500">+2 from last month</p>
          </div>
          <i class="fas fa-user-md text-blue-500 text-4xl"></i>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg flex items-center justify-between">
          <div>
            <h3 class="text-lg font-semibold text-gray-700">Surgeries Today</h3>
            <p class="text-3xl font-bold text-pink-600">4</p>
            <p class="text-sm text-gray-500">No change</p>
          </div>
          <i class="fas fa-scalpel text-pink-500 text-4xl"></i>
        </div>
      </div>

      <!-- Charts Section -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 shadow-lg rounded-lg">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Patient Trends (Monthly)</h3>
          <LineChart />
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Appointment Statistics (Last 6 Months)</h3>
          <BarChart />
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Doctor Utilization</h3>
          <PieChart />
        </div>
      </div>

      <!-- Detailed Reports Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <div class="bg-white p-6 shadow-lg rounded-lg">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Activity</h3>
          <ul class="space-y-3">
            <li class="flex items-center border-b border-gray-200 pb-3">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">Dr. John performed a surgery on patient #3456</span>
            </li>
            <li class="flex items-center border-b border-gray-200 pb-3">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">New patient #5678 registered</span>
            </li>
            <li class="flex items-center border-b border-gray-200 pb-3">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">Appointment booked by patient #2345</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">Dr. Smith updated the medical record of patient #1234</span>
            </li>
          </ul>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg">
          <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Notifications</h3>
          <ul class="space-y-3">
            <li class="flex items-center border-b border-gray-200 pb-3">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">Reminder: Staff meeting at 3 PM</span>
            </li>
            <li class="flex items-center border-b border-gray-200 pb-3">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">System update scheduled for tonight</span>
            </li>
            <li class="flex items-center border-b border-gray-200 pb-3">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">New health guidelines issued</span>
            </li>
            <li class="flex items-center">
              <span class="text-gray-500 mr-3">•</span>
              <span class="text-gray-700">Reminder: Submit monthly reports by end of the week</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- User Engagement Section -->
      <div class="bg-white p-6 shadow-lg rounded-lg">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">User Engagement</h3>
        <div class="flex flex-col md:flex-row md:space-x-6">
          <div class="bg-gray-100 p-4 rounded-lg flex-1 mb-4 md:mb-0">
            <h4 class="text-md font-semibold text-gray-700 mb-2">Top Active Users</h4>
            <ul class="list-disc pl-5 space-y-2">
              <li class="text-gray-700">User A - 45 actions</li>
              <li class="text-gray-700">User B - 32 actions</li>
              <li class="text-gray-700">User C - 29 actions</li>
            </ul>
          </div>
          <div class="bg-gray-100 p-4 rounded-lg flex-1">
            <h4 class="text-md font-semibold text-gray-700 mb-2">Recent Feedback</h4>
            <ul class="list-disc pl-5 space-y-2">
              <li class="text-gray-700">“Great support and fast response!” - User X</li>
              <li class="text-gray-700">“The system is very user-friendly.” - User Y</li>
              <li class="text-gray-700">“Could use more customization options.” - User Z</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </AuthenticatedLayout>
</template>
