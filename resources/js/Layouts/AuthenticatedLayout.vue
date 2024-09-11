<script setup>
import Header from '@/Components/Header.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

</script>

<template>
    <Header>
        <!-- Your main content here -->
        <header class="bg-white shadow flex justify-around">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-orange-500">Health Management System Dashboard</h1>
            </div>

            <!-- Settings Dropdown -->
            <div class="mx-auto py-6 px-4">
                <Dropdown align="left" width="48">
                    <template #trigger>
                        <button
                            class="w-full flex justify-between items-center text-gray-700 font-medium hover:bg-gray-200 px-4 py-2 rounded-lg transition ease-in-out duration-150"
                        >
                            {{ $page.props.auth.user.name }}
                            <svg
                                class="h-5 w-5 text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace this with your content -->
                <div class="px-4 py-6 sm:px-0">
                    <div class="">
                        <slot />
                    </div>
                </div>
            </div>
        </main>
    </Header>
</template>
