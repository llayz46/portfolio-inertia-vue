<script setup>
import {computed} from "vue";

const props = defineProps({
    title: String,
    description: String,
    width: String,
    number: String,
})

const backgroundClass = computed(() => `bg-feature-${props.number}`);
</script>

<template>
    <div class="relative flex z-10 h-[300px] p-4 rounded-lg"
         :class="width === 'large' ? 'lg:w-[61%]' : 'sm:w-1/2 lg:w-[39%]', `gradient-${number}`">
        <div class="relative flex flex-col gap-1 mt-auto z-10 font-dm-sans">
            <h3 class="text-base font-medium">{{ title }}</h3>
            <p class="text-sm text-zinc-500">{{ description }}</p>
        </div>
        <div :class="backgroundClass" class="absolute inset-px bg-center bg-cover rounded-lg before:flex before:rounded-lg before:size-full before:bg-black/35"></div>
    </div>
</template>

<style scoped>
.gradient-1 {
    background:
        radial-gradient(36% 65% at 88% 100%, theme('colors.accent-green.lighter') 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(30% 65% at 37% 0%, theme('colors.accent-purple') 50%, transparent 100%);

    @apply before:absolute before:-z-10 before:top-8 before:left-1/4 before:size-36 before:bg-accent-purple before:rounded-full before:blur-3xl;
    @apply after:absolute after:-z-10 after:top-1/2 after:left-8 after:size-24 after:bg-primary-700 after:rounded-full after:blur-3xl;
}

.gradient-2 {
    background:
        radial-gradient(42% 50% at 55% 100%, theme('colors.accent-green.lighter') 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(50% 40% at 0% 42%, theme('colors.accent-yellow') 30%, transparent 100%);

    @apply before:absolute before:-z-10 before:bottom-8 before:left-1/2 before:-translate-x-1/3 before:w-44 before:h-36 before:bg-accent-green-lighter before:rounded-full before:blur-3xl;
}

.gradient-3 {
    background:
        radial-gradient(40% 50% at 100% 75%, theme('colors.accent-purple') 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(50% 40% at 10% 30%, theme('colors.accent-yellow') 30%, transparent 100%);

    @apply before:absolute before:-z-10 before:bottom-8 before:left-4 before:size-32 before:bg-gradient-to-tl before:from-accent-purple before:from-40% before:to-accent-yellow before:to-60% before:rounded-full before:blur-2xl;
}

.gradient-4 {
    background:
        radial-gradient(60% 60% at 100% 100%, theme('colors.primary.700') 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(35% 50% at 15% 0%, theme('colors.accent-purple') 30%, transparent 100%);

    @apply before:absolute before:-z-10 before:bottom-11 before:right-8 before:size-36 before:bg-primary-700 before:rounded-full before:blur-3xl;
}
</style>
