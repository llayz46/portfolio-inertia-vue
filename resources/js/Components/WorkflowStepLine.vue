<script setup>
import WorkflowStepBadge from "@/Components/WorkflowStepBadge.vue";

defineProps({
    step: String,
    image: String,
    imageAlt: String
});
</script>

<template>
    <div class="flex items-center justify-between w-full max-w-[796px] mx-auto workflow-step-line">
        <div class="relative z-20">
            <img loading="lazy" :src="'images/workflow/' + image" width="300px" height="160px" class="rounded-lg min-w-[300px] aspect-video" aria-hidden="true" :alt="'Workflow image step : ' + imageAlt">

            <span class="absolute -z-10 rounded-full blur-2xl" :class="`top-step-${step}`" aria-hidden="true"></span>
            <span class="absolute -z-10 rounded-full blur-2xl" :class="`bottom-step-${step}`" aria-hidden="true"></span>
        </div>

        <WorkflowStepBadge>{{ step }}</WorkflowStepBadge>

        <div class="flex flex-col gap-1 max-w-[300px]">
            <h3 class="font-medium text-base tracking-small"><slot name="title" /></h3>
            <p class="text-zinc-500 text-sm font-dm-sans"><slot name="description" /></p>
        </div>
    </div>
</template>

<style scoped>
.top-step-1 {
    @apply top-4 left-5 size-14 bg-[#24CD6F]/50;
}

.bottom-step-1 {
    @apply bottom-1/2 translate-y-2/3 right-0 size-14 bg-primary-800/60;
}

.top-step-2 {
    @apply top-4 right-4 size-14 bg-[#24CD6F]/50;
}

.bottom-step-2 {
    @apply bottom-4 left-4 size-14 bg-primary-800/65;
}
</style>
