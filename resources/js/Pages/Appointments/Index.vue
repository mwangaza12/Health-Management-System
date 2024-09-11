<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Link from '@/Components/Link.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Appointments" />
    <AuthenticatedLayout>
        <h2 class="text-3xl text-center text-blue-500">Appointment view</h2>
       <Link 
            :href="route('appointments.create')"
            class="bg-blue-500 rounded-md text-white font-bold hover:text-white hover:bg-blue-700 justify-end p-3 m-2"
        >
        Create Appointment
        </Link>
        <div class="container mx-auto p-4">
    <div class="row">
        <div class="col-md-12">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Patient Name</th>
                            <th class="px-4 py-2 border">Doctors Name</th>
                            <th class="px-4 py-2 border">Reason</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Appointment Date</th>
                            <th class="px-4 py-2 border">Edit</th>
                            <th class="px-4 py-2 border">Delete</th>
                            <th class="px-4 py-2 border">Show</th>
                        </tr>
                    </thead>
                    <tbody v-for="ward in wards" :key="ward.id">
                            <tr>
                                <td class="px-4 py-2 border">{{ ward.name }}</td>
                                <td class="px-4 py-2 border">{{ ward.location }}</td>
                                <td class="px-4 py-2 border">{{ ward.location }}</td>
                                <td class="px-4 py-2 border">{{ ward.location }}</td>
                                <td class="px-4 py-2 border">{{ ward.location }}</td>
                                <td class="px-4 py-2 border">{{ ward.no_of_beds }}</td>
                                <td class="px-4 py-2 border">
                                    <Link :href="route('wards.edit',ward.id)" class="text-blue-500">Edit</Link>
                                </td>
                                <td class="px-4 py-2 border">
                                    <button @click="submit" class="text-red-500 content-center">Delete</button>
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