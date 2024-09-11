<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue'; // Import the SelectInput component
import { Head, Link, useForm } from '@inertiajs/vue3';
import SelectOption from '@/Components/SelectOption.vue';

const form = useForm({
    full_name: '',
    date_of_birth: '',
    gender: '',
    contact_number: '',
    email: '',
    address: '',
});

const submit = () => {
    form.post(route('patients.store'));
};
</script>

<template>
<Head title="Create Patient" />
    <AuthenticatedLayout>
        <div class="max-w-lg mt-10 px-8 py-6 mx-auto bg-white shadow-md rounded-lg">
            <!-- Page Title -->
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-6">Create Patient</h2>

            <!-- Form -->
            <form @submit.prevent="submit">
                <!-- Patient Name -->
                <div class="mb-4">
                    <InputLabel for="name" value="Patient Name" />
                    <TextInput
                        id="full_name"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.full_name"
                        required
                        autofocus
                        autocomplete="full_name"
                    />
                    <InputError class="mt-2 text-red-500" :message="form.errors.full_name" />
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <InputLabel for="date_of_birth" value="Date of Birth" />
                    <TextInput
                        id="date_of_birth"
                        type="date"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.date_of_birth"
                        required
                        autocomplete="date_of_birth"
                    />
                    <InputError class="mt-2 text-red-500" :message="form.errors.date_of_birth" />
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <SelectOption
                        id="gender"
                        label="Gender"
                        v-model="form.gender"
                    />
                    <InputError class="mt-2 text-red-500" :message="form.errors.gender" />
                </div>

                <!-- Contact -->
                <div class="mb-4">
                    <InputLabel for="contact" value="Contact Number" />
                    <TextInput
                        id="contact"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.contact_number"
                        required
                        autocomplete="contact_number"
                    />
                    <InputError class="mt-2 text-red-500" :message="form.errors.contact_number" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.email"
                        required
                        autocomplete="email"
                    />
                    <InputError class="mt-2 text-red-500" :message="form.errors.email" />
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <InputLabel for="address" value="Address" />
                    <TextInput
                        id="address"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.address"
                        required
                        autocomplete="address"
                    />
                    <InputError class="mt-2 text-red-500" :message="form.errors.address" />
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between mt-6">
                    <!-- Back Link -->
                    <Link
                        :href="route('patients.index')"
                        class="text-gray-600 hover:text-gray-900 hover:underline"
                    >
                        ← Back to Patients
                    </Link>

                    <!-- Create Button -->
                    <PrimaryButton
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition ease-in-out duration-150"
                        :class="{ 'opacity-50': form.processing }"
                        :disabled="form.processing"
                    >
                        Create
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
