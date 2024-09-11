<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// Accept props
const props = defineProps({ patients: Object });

// Loading state
const isLoading = ref(false);

// Pagination state (if applicable)
const currentPage = ref(1);
const itemsPerPage = 5;

// Compute paginated patients
const paginatedpatients = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return props.patients.slice(start, end);
});

// Function to handle pagination
const handlePageChange = (page) => {
    isLoading.value = true;
    currentPage.value = page;
    setTimeout(() => {
        isLoading.value = false; // Simulate loading delay
    }, 500); // Simulated delay for loading data
};
</script>

<template>
    <Head title="patient" />
    <AuthenticatedLayout>
        <!-- Title -->
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">Comprehensive Patient Information & Management</h2>

        <!-- Create Button -->
        <div class="text-right mb-4">
            <Link 
                :href="route('patients.create')"
                class="bg-blue-500 rounded-md text-white font-bold hover:bg-blue-700 p-3"
            >
            Create a patient
            </Link>
        </div>

        <!-- Loading Indicator -->
        <div v-if="isLoading" class="flex justify-center items-center">
            <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 4v4m0 0a8 8 0 1 0 8 8H20"/></svg>
            <span class="ml-2 text-blue-500">Loading...</span>
        </div>

        <!-- patient Table -->
        <div v-else class="container mx-auto p-4 bg-white shadow-lg rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Full Name</th>
                            <th class="px-4 py-2 border">Date of Birth</th>
                            <th class="px-4 py-2 border">Gender</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="patient in paginatedpatients" :key="patient.id" class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ patient.full_name }}</td>
                            <td class="px-4 py-2 border">{{ patient.date_of_birth }}</td>
                            <td class="px-4 py-2 border">{{ patient.gender }}</td>
                            <td class="px-4 py-2 border text-center">
                                <Link :href="route('patients.show', patient.id)" class="text-yellow-500 hover:text-yellow-700">Show</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4 flex justify-between items-center">
                <button 
                    :disabled="currentPage === 1" 
                    @click="handlePageChange(currentPage - 1)" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 disabled:opacity-50"
                >
                    Previous
                </button>
                <span>Page {{ currentPage }}</span>
                <button 
                    :disabled="currentPage * itemsPerPage >= props.patients.length" 
                    @click="handlePageChange(currentPage + 1)" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 disabled:opacity-50"
                >
                    Next
                </button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
