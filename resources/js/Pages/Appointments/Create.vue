<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    patients: Array,
    doctors: Array,
});

const form = useForm({
    patient_id: '',
    doctor_id: '',
    reason: '',
    status: '',
    appointment_date: '',
});

const submit = () => {
    form.post(route('appointments.store'));
};

const today = new Date().toISOString().split('T')[0]; // Default to today’s date
</script>

<template>
    <Head title="Create Appointment" />
    <AuthenticatedLayout>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 mx-auto bg-white shadow-md rounded-lg">
            <h2 class="text-3xl text-center text-blue-500">Create Appointment</h2>
           
            <form @submit.prevent="submit">
                <!-- Patient Dropdown -->
                <div class="mt-4">
                    <InputLabel for="patient_id" value="Patient Name" />

                    <SelectInput
                        id="patient_id"
                        :options="props.patients.map(patient => ({ value: patient.id, text: patient.full_name }))"
                        v-model="form.patient_id"
                        required
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.patient_id" />
                </div>

                <!-- Doctor Dropdown -->
                <div class="mt-4">
                    <InputLabel for="doctor_id" value="Doctor Name" />

                    <SelectInput
                        id="doctor_id"
                        :options="props.doctors.map(doctor => ({ value: doctor.id, text: doctor.full_name }))"
                        v-model="form.doctor_id"
                        required
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.doctor_id" />
                </div>

                <!-- Reason -->
                <div class="mt-4">
                    <InputLabel for="reason" value="Reason" />

                    <TextInput
                        id="reason"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.reason"
                        required
                        autocomplete="reason"
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.reason" />
                </div>

                <!-- Status -->
                <div class="mt-4">
                    <InputLabel for="status" value="Status" />

                    <TextInput
                        id="status"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.status"
                        required
                        autocomplete="status"
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.status" />
                </div>

                <!-- Appointment Date -->
                <div class="mt-4">
                    <InputLabel for="appointment_date" value="Appointment Date" />

                    <TextInput
                        id="appointment_date"
                        type="date"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.appointment_date"
                        required
                        autocomplete="appointment_date"
                        :min="today"
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.appointment_date" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <Link
                        :href="route('appointments.index')"
                        class="underline text-lg text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Back
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Create
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
