<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

// PrimeVue imports
import PanelMenu from 'primevue/panelmenu';

const items = ref([
    {
        label: 'Dashboard',
        icon: 'pi pi-home',
        command: () => window.location.href = route('dashboard')
    },
    {
        label: 'Patients',
        icon: 'pi pi-users',
        command: () => window.location.href = route('patients.index')
    },
    {
        label: 'Doctors',
        icon: 'pi pi-user',
        command: () => window.location.href = route('doctors.index')
    },
    {
        label: 'Medicine',
        icon: 'pi pi-clipboard',
        command: () => window.location.href = route('medicines.index')
    },
    {
        label: 'Wards',
        icon: 'pi pi-building',
        command: () => window.location.href = route('wards.index')
    },
    {
        label: 'Appointments',
        icon: 'pi pi-calendar',
        command: () => window.location.href = route('appointments.index')
    },
    {
        label: 'Insurance Providers',
        icon: 'pi pi-shield',
        command: () => window.location.href = route('insuaranceproviders.index')
    },
    {
        label: 'Lab Tests',
        icon: 'pi pi-list',
        command: () => window.location.href = route('labtests.index')
    },
    {
        label: 'Labs',
        icon: 'pi pi-flask',
        command: () => window.location.href = route('labs.index')
    }
]);
</script>

<template>
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen surface-section border-right-1 surface-border">
            <!-- Logo Section -->
            <div class="px-4 py-4 border-bottom-1 surface-border">
                <Link href="/" class="flex align-items-center gap-2">
                    <ApplicationLogo class="h-2rem" />
                    <span class="text-xl font-semibold text-900">HealthCare</span>
                </Link>
            </div>

            <!-- Navigation Menu -->
            <nav class="p-3">
                <PanelMenu :model="items" class="w-full border-none" />
            </nav>
        </aside>

        <!-- Page Content -->
        <main class="flex-1 surface-ground">
            <slot />
        </main>
    </div>
</template>

<style scoped>
:deep(.p-panelmenu) {
    border: none;
}

:deep(.p-panelmenu-header-content) {
    border-radius: 6px;
    margin-bottom: 4px;
}

:deep(.p-panelmenu-content) {
    border: none;
    background: transparent;
}
</style>