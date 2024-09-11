<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    location: '',
    no_of_beds: '',
});

const submit = () => {
    form.post(route('wards.store'));
};
</script>

<template>
<Head title="Create Ward" />
    <AuthenticatedLayout>
        <div
            class="max-w-lg mt-10 px-8 py-6 mx-auto bg-white shadow-md rounded-lg"
        >
            <!-- Page Title -->
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-6">Create Ward</h2>

            <!-- Form -->
            <form @submit.prevent="submit">
                <!-- Ward Name -->
                <div class="mb-4">
                    <InputLabel for="name" value="Ward Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.name" />
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <InputLabel for="location" value="Location" />

                    <TextInput
                        id="location"
                        type="text"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.location"
                        required
                        autocomplete="location"
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.location" />
                </div>

                <!-- Number of Beds -->
                <div class="mb-4">
                    <InputLabel for="no_of_beds" value="Number of Beds" />

                    <TextInput
                        id="no_of_beds"
                        type="number"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        v-model="form.no_of_beds"
                        required
                        autocomplete="no_of_beds"
                    />

                    <InputError class="mt-2 text-red-500" :message="form.errors.no_of_beds" />
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between mt-6">
                    <!-- Back Link -->
                    <Link
                        :href="route('wards.index')"
                        class="text-gray-600 hover:text-gray-900 hover:underline"
                    >
                        ← Back to Wards
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
