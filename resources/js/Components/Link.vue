<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <Link :href="href" class="text-blue-500">
        <slot />
    </Link>
</template>
