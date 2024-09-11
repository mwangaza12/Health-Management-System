<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';

const toast = useToast();
const props = defineProps({ ward: Object });

const form = useForm({}); // Empty form object

const deleteWard = () => {
    toast.error('Are you sure you want to delete this ward?', {
        timeout: 5000,
        closeOnClick: true,
        pauseOnHover: true,
        onClick: () => {
            form.delete(route('wards.destroy', props.ward.id), {
                onSuccess: () => {
                    toast.success('Ward deleted successfully!');
                    setTimeout(() => {
                        window.location.href = route('wards.index'); // Redirect after deletion
                    }, 1500);
                }
            });
        }
    });
};
</script>

<template>
    <Head title="Show Ward"/>
    <AuthenticatedLayout>
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
            <h2 class="text-4xl font-semibold text-center text-blue-600 mb-6">{{ ward.name }} - Ward Details</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-lg font-semibold">Location:</p>
                    <p class="text-gray-700">{{ ward.location }}</p>
                </div>

                <div>
                    <p class="text-lg font-semibold">Number of Beds:</p>
                    <p class="text-gray-700">{{ ward.no_of_beds }}</p>
                </div>
            </div>
            
            <div class="mt-8">
                <h3 class="text-2xl font-semibold text-gray-700">Additional Information</h3>
                <p class="mt-2 text-gray-600">Here you can include more information about the ward, such as its services, doctors assigned, or any other relevant data that would help make the page more comprehensive.</p>
            </div>

            <div class="mt-8 flex justify-between">
                <Link :href="route('wards.edit', ward.id)" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                    Edit Ward
                </Link>

                <button @click="deleteWard" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-700">
                    Delete Ward
                </button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
