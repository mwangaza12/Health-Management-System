<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import  DataTable  from 'primevue/datatable';
import  Column  from 'primevue/column';
import Button  from 'primevue/button';
import Toolbar from 'primevue/toolbar';

// Accept props
const props = defineProps({ patients: Array });

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
            <!-- <Link 
                :href="route('patients.create')"
                class="bg-blue-500 rounded-md text-white font-bold hover:bg-blue-700 p-3"
            >
            Create a patient
            </Link> -->
            <Button label="Create Patient"/>
        </div>

        <!-- Loading Indicator -->
        <div v-if="isLoading" class="flex justify-center items-center">
            <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 4v4m0 0a8 8 0 1 0 8 8H20"/></svg>
            <span class="ml-2 text-blue-500">Loading...</span>
        </div>

        <!-- patient Table -->
        <Toolbar class="mb-6">
            <template #start>
                <Button label="New" icon="pi pi-plus" class="mr-2" @click="openNew" />
                <Button label="Delete" icon="pi pi-trash" severity="danger" variant="outlined" @click="confirmDeleteSelected" :disabled="!selectedProducts || !selectedProducts.length" />
            </template>
        </Toolbar>

        <DataTable v-model:selection="selectedProducts" :value="props.patients" dataKey="id" tableStyle="min-width: 50rem">
            <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
            <Column field="full_name" header="Full Name" class="px-4 py-2 border" />
            <Column field="date_of_birth" header="Date of Birth" class="px-4 py-2 border" />
            <Column field="gender" header="Gender" class="px-4 py-2 border" />

        </DataTable>
    </AuthenticatedLayout>
</template>
