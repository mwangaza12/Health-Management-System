<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";

const toast = useToast();
const props = defineProps({ doctors: Object });

const form = useForm({}); // Empty form object

const submit = (doctorId) => {
    toast.info('Are you sure you want to delete this doctor?', {
        timeout: 5000,
        closeOnClick: true,
        pauseOnHover: true,
        onClick: () => {
            form.delete(route('doctors.destroy', doctorId), {
                onSuccess: () => toast.success('Doctor deleted successfully!')
            });
        }
    });
};
</script>


<template>
    <Head title="doctor" />
    <AuthenticatedLayout>
        <h2 class="text-3xl text-center text-blue-500">Doctors view</h2>
        <Link 
            :href="route('doctors.create')"
            class="bg-blue-500 rounded-md text-white font-bold hover:text-white hover:bg-blue-700 justify-end p-3 m-2"
        >
            Add a Doctor
        </Link>
        <div class="container mx-auto p-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border">Full Name</th>
                                    <th class="px-4 py-2 border">Specialization</th>
                                    <th class="px-4 py-2 border">Contact Number</th>
                                    <th class="px-4 py-2 border">Contact Email</th>
                                    <th class="px-4 py-2 border">Edit</th>
                                    <th class="px-4 py-2 border">Show</th>
                                    <th class="px-4 py-2 border">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="doctor in doctors" :key="doctor.id">
                                    <td class="px-4 py-2 border">{{ doctor.full_name }}</td>
                                    <td class="px-4 py-2 border">{{ doctor.specialization }}</td>
                                    <td class="px-4 py-2 border">{{ doctor.contact_number }}</td>
                                    <td class="px-4 py-2 border">{{ doctor.email }}</td>
                                    <td class="px-4 py-2 border">
                                        <Link :href="route('doctors.edit', doctor.id)" class="text-blue-500">Edit</Link>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <Link :href="route('doctors.show', doctor.id)" class="text-yellow-500">Show</Link>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <button @click="submit(doctor.id)" class="text-red-500 content-center">Delete</button>
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
