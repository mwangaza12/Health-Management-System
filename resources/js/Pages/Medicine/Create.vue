<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    price: '',
    quantity: '',
});

const submit = () => {
    form.post(route('medicines.store'));
};
</script>

<template>
    <Head title="Create Medicine" />
    <AuthenticatedLayout>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 ml-auto mr-auto bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
        <h2 class="text-3xl text-center text-blue-500">Create Medicine</h2>
       
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="price" value="Price" />

                <TextInput
                    id="price"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.price"
                    required
                    autocomplete="price"
                />

                <InputError class="mt-2" :message="form.errors.price" />
            </div>

            <div class="mt-4">
                <InputLabel for="quantity" value="Qauntity" />

                <TextInput
                    id="quantity"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.quantity"
                    required
                    autocomplete="quantity"
                />

                <InputError class="mt-2" :message="form.errors.quantity" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('medicines.index')"
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