<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// PrimeVue components
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Toolbar from 'primevue/toolbar';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';

// Props
const props = defineProps({ patients: Array });

// State
const selectedPatients = ref([]);
const createDialogVisible = ref(false);

// Inertia form for new patient
const form = useForm({
    full_name: '',
    date_of_birth: '',
    gender: '',
});

// Open modal
const openNew = () => {
    form.reset();
    createDialogVisible.value = true;
};

// Save new patient
const savePatient = () => {
    form.post(route('patients.store'), {
        onSuccess: () => {
            createDialogVisible.value = false;
        },
    });
};
</script>

<template>
    <Head title="Patients" />

    <AuthenticatedLayout>
        <!-- Title -->
        <h2 class="text-3xl font-semibold text-center text-blue-600 mb-6">
            Comprehensive Patient Information & Management
        </h2>

        <!-- Toolbar -->
        <Toolbar class="mb-6">
        <template #start>
            <Button
                label="New"
                icon="pi pi-plus"
                class="mr-2"
                @click="openNew"
            />
            <Button
                label="Delete"
                icon="pi pi-trash"
                severity="danger"
                variant="outlined"
                :disabled="!selectedPatients.length"
            />
        </template>
        </Toolbar>

        <!-- Patients Table -->
        <DataTable
            v-model:selection="selectedPatients"
            :value="props.patients"
            dataKey="id"
            tableStyle="min-width: 50rem"
            paginator
            :rows="10"
            :rowsPerPageOptions="[5,10,20]"
        >
        <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
        <Column field="full_name" header="Full Name" sortable />
        <Column field="date_of_birth" header="Date of Birth" sortable />
        <Column field="gender" header="Gender" sortable />
        </DataTable>

        <!-- Create Patient Modal -->
        <Dialog
            v-model:visible="createDialogVisible"
            modal
            header="Create Patient"
            :style="{ width: '30rem' }"
        >
        <div class="flex flex-col gap-4">
            <div>
            <label for="full_name" class="block font-semibold mb-2">Full Name</label>
            <InputText
                id="full_name"
                v-model="form.full_name"
                placeholder="Enter full name"
                class="w-full"
            />
            <div v-if="form.errors.full_name" class="text-red-500 text-sm mt-1">
                {{ form.errors.full_name }}
            </div>
            </div>

            <div>
            <label for="date_of_birth" class="block font-semibold mb-2">Date of Birth</label>
            <InputText
                id="date_of_birth"
                type="date"
                v-model="form.date_of_birth"
                class="w-full"
            />
            <div v-if="form.errors.date_of_birth" class="text-red-500 text-sm mt-1">
                {{ form.errors.date_of_birth }}
            </div>
            </div>

            <div>
            <label for="gender" class="block font-semibold mb-2">Gender</label>
            <InputText
                id="gender"
                v-model="form.gender"
                placeholder="Male / Female"
                class="w-full"
            />
            <div v-if="form.errors.gender" class="text-red-500 text-sm mt-1">
                {{ form.errors.gender }}
            </div>
            </div>
        </div>

        <template #footer>
            <Button label="Cancel" text severity="secondary" @click="createDialogVisible = false" />
            <Button label="Save" icon="pi pi-check" @click="savePatient" :loading="form.processing" />
        </template>
        </Dialog>
    </AuthenticatedLayout>
</template>
