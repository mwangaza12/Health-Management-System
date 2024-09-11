<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Error from '@/Components/Error.vue';

// Define props
const props = defineProps({ ward: Object });

// Initialize form data using the ward prop
const form = useForm({
    name: props.ward.name,
    location: props.ward.location,
    no_of_beds: props.ward.no_of_beds,
});

// Define submit function
const submit = () => {
    form.put(route('wards.update', props.ward.id));
};
</script>

<template>
    <Head title="Edit Ward" />
    <AuthenticatedLayout>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 ml-auto mr-auto bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <h2 class="text-3xl text-center text-blue-500">Edit Ward</h2>
       
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
                    <InputLabel for="location" value="Location" />

                    <TextInput
                        id="location"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.location"
                        required
                        autocomplete="location"
                    />

                    <InputError class="mt-2" :message="form.errors.location" />
                </div>

                <div class="mt-4">
                    <InputLabel for="no_of_beds" value="No of beds" />

                    <TextInput
                        id="no_of_beds"
                        type="number"
                        class="mt-1 block w-full"
                        v-model="form.no_of_beds"
                        required
                        autocomplete="no_of_beds"
                    />

                    <InputError class="mt-2" :message="form.errors.no_of_beds" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('wards.index')"
                        class="underline text-lg text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Back
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Update
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
