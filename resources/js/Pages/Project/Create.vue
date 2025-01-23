<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MultiStepForm from "@/Components/Project/MultiStepForm.vue";
import { defineProps } from 'vue';

const props = defineProps({
    technologies: Array,
});
</script>

<template>
    <AppLayout title="Ajouter un projet">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                Ajouter un projet
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-zinc-1050 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                    <MultiStepForm :technologies="technologies" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
