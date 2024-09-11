<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head,useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";

const toast = useToast();
const props = defineProps({ medicines:Object })

const form = useForm({}); // Empty form object

const submit = (medicineId) => {
    toast.info('Are you sure you want to delete this medicine?', {
        timeout: 5000,
        closeOnClick: true,
        pauseOnHover: true,
        onClick: () => {
            form.delete(route('medicines.destroy', medicineId), {
                onSuccess: () => toast.success('medicine deleted successfully!')
            });
        }
    });
};
</script>

<template>
<Head title="Medicine" />
    <AuthenticatedLayout>
        <h2 class="text-3xl text-center text-blue-500">Medicines view</h2>
       <Link 
            :href="route('medicines.create')"
            class="bg-blue-500 rounded-md text-white font-bold hover:text-white hover:bg-blue-700 justify-end p-3 m-2"
        >
        Create Medicine
        </Link>
        <div class="container mx-auto p-4">
    <div class="row">
        <div class="col-md-12">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Price</th>
                            <th class="px-4 py-2 border">Qauntity</th>
                            <th class="px-4 py-2 border">Edit</th>
                            <th class="px-4 py-2 border">Delete</th>
                        </tr>
                    </thead>
                    <tbody v-for="medicine in medicines" :key="medicine.id">
                            <tr>
                                <td class="px-4 py-2 border">{{ medicine.name }}</td>
                                <td class="px-4 py-2 border">{{ medicine.price }}</td>
                                <td class="px-4 py-2 border">{{ medicine.quantity }}</td>
                                <td class="px-4 py-2 border">
                                    <Link :href="route('medicines.edit',medicine.id)" class="text-blue-500">Edit</Link>
                                </td>
                                <td class="px-4 py-2 border">
                                    <button @click="submit(medicine.id)" class="text-red-500 content-center">Delete</button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </AuthenticatedLayout>
</template>