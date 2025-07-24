<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

defineProps({
    contrats: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div>
        <p>This is the index page for contracts.</p>
        <div v-if="contrats.length > 0" class="divide-y divide-gray-200">
            <div v-for="contrat in contrats" :key="contrat.id" class="py-4">
                <Link :href="route('contrats.show', contrat.id)" class="text-blue-600 hover:underline">
                {{ contrat.name }}
                </Link>
            </div>
        </div>
    </div>
</template>