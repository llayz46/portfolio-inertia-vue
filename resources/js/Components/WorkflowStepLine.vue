<script setup>
import WorkflowStepBadge from "@/Components/WorkflowStepBadge.vue";

defineProps({
    step: String,
    image: String,
    imageAlt: String
});
</script>

<template>
    <div class="flex justify-center items-center gap-[20%] sm:gap-[10%] md:gap-44">
        <div class="flex justify-start items-center w-full rounded-lg relative z-20">
            <img loading="lazy" :src="'images/workflow/' + image" class="rounded-lg aspect-video" aria-hidden="true" :alt="'Workflow image step : ' + imageAlt">

            <span class="absolute -z-10 rounded-full blur-2xl size-8 md:size-14" :class="`top-step-${step}`" aria-hidden="true"></span>
            <span class="absolute -z-10 rounded-full blur-2xl size-8 md:size-14" :class="`bottom-step-${step}`" aria-hidden="true"></span>
        </div>

        <div class="absolute flex items-center justify-center">
            <WorkflowStepBadge>{{ step }}</WorkflowStepBadge>
        </div>

        <div class="flex flex-col gap-2 justify-start w-full h-auto items-start">
            <h3 class="font-medium text-base tracking-small"><slot name="title" /></h3>
            <p class="text-zinc-500 text-sm font-dm-sans"><slot name="description" /></p>
        </div>
    </div>
</template>

<style scoped>
.top-step-1 {
    @apply top-4 left-5 bg-[#24CD6F]/50;
}

.bottom-step-1 {
    @apply bottom-1/2 translate-y-2/3 right-0 bg-primary-800/60;
}

.top-step-2 {
    @apply top-4 right-4 bg-[#24CD6F]/50;
}

.bottom-step-2 {
    @apply bottom-4 left-4 bg-primary-800/65;
}

.top-step-3 {
    @apply top-2 right-2 bg-[#24CD6F]/50;
}

.bottom-step-3 {
    @apply bottom-2 left-2 bg-primary-800/65;
}

.top-step-4 {
    @apply top-4 right-4 bg-[#24CD6F]/50;
}

.bottom-step-4 {
    @apply bottom-4 left-4 bg-primary-800/65;
}

.top-step-5 {
    @apply bottom-0 right-2 bg-[#24CD6F]/50;
}

.bottom-step-5 {
    @apply top-4 left-4 bg-primary-800/65;
}
</style>
