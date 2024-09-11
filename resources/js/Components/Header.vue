<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';

// Import necessary Heroicons
import { BeakerIcon, HomeIcon, UserIcon, ClipboardIcon,BuildingOfficeIcon, CalendarIcon, ShieldCheckIcon, BeakerIcon as LabIcon } from '@heroicons/vue/20/solid';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen flex bg-gray-100">
        <!-- Sidebar -->
        <div class="bg-white w-64 min-h-screen p-4 shadow-lg">
            <!-- Logo -->
            <div class="flex items-center justify-center mb-6">
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="h-12 w-12 fill-current text-gray-800" />
                </Link>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-5 flex flex-col">
                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    <HomeIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Dashboard
                </NavLink>
                <NavLink :href="route('patients.index')" :active="route().current('patients.index')">
                    <UserIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Patients
                </NavLink>
                <NavLink :href="route('doctors.index')" :active="route().current('doctors.index')">
                    <UserIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Doctors
                </NavLink>
                <NavLink :href="route('medicines.index')" :active="route().current('medicines.index')">
                    <ClipboardIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Medicine
                </NavLink>
                <NavLink :href="route('wards.index')" :active="route().current('wards.index')">
                    <BuildingOfficeIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Wards
                </NavLink>
                <NavLink :href="route('appointments.index')" :active="route().current('appointments.index')">
                    <CalendarIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Appointments
                </NavLink>
                <NavLink :href="route('insuaranceproviders.index')" :active="route().current('insuaranceproviders.index')">
                    <ShieldCheckIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Insurance Providers
                </NavLink>
                <NavLink :href="route('labtests.index')" :active="route().current('labtests.index')">
                    <LabIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Lab Tests
                </NavLink>
                <NavLink :href="route('labs.index')" :active="route().current('labs.index')">
                    <BeakerIcon class="h-6 w-6 text-blue-500 inline-block mr-2" />
                    Labs
                </NavLink>
            </nav>
        </div>

        <!-- Page Content -->
        <div class="flex-1">
            <slot />
        </div>
    </div>
</template>
