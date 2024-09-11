<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();

const form = useForm({
    full_name: '',
    specialization: '',
    contact_number: '',
    email: ''
});

const submit = () => {
    form.post(route('doctors.store'), {
        onSuccess: () => {
            toast.success('Doctor created successfully!');
            setTimeout(() => {
                window.location.href = route('doctors.index');
            }, 1500); // Delay before redirecting to allow the toast to show
        }
    });
};
</script>

<template>
<Head title="Create doctor" />
    <AuthenticatedLayout>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 ml-auto mr-auto bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
        <h2 class="text-3xl text-center text-blue-500">Create doctor</h2>
       
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="full_name" value="Full Name" />

                <TextInput
                    id="full_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.full_name"
                    required
                    autofocus
                    autocomplete="full_name"
                />

                <InputError class="mt-2" :message="form.errors.full_name" />
            </div>

            <div class="mt-4">
                <InputLabel for="specialization" value="Specialization" />

                <TextInput
                    id="specialization"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.specialization"
                    required
                    autocomplete="specialization"
                />

                <InputError class="mt-2" :message="form.errors.specialization" />
            </div>

            <div class="mt-4">
                <InputLabel for="contact" value="Contact" />

                <TextInput
                    id="contact_number"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.contact_number"
                    required
                    autocomplete="contact_number"
                />

                <InputError class="mt-2" :message="form.errors.contact" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="email"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('doctors.index')"
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
