<script setup>
defineProps({
    title: String,
    description: String,
    width: String,
    gradient: String,
})
</script>

<template>
    <div class="relative flex z-10 h-[300px] p-4 rounded-lg"
         :class="width === 'large' ? 'w-[61%]' : 'w-[39%]', gradient">
        <div class="relative flex flex-col gap-1 mt-auto z-10 font-dm-sans">
            <h3 class="text-base font-medium text-white">{{ title }}</h3>
            <p class="text-sm text-zinc-500">{{ description }}</p>
        </div>
        <div class="absolute inset-px bg-[url('images/features-card-1.jpg')] bg-cover rounded-lg before:flex before:rounded-lg before:size-full before:bg-black/35"></div>
    </div>
</template>

<style scoped>
.card-1 {
    background:
        radial-gradient(36% 65% at 88% 100%, #298C65 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(30% 65% at 37% 0%, #8E3BB4 50%, transparent 100%);

    @apply before:absolute before:-z-10 before:top-8 before:left-1/4 before:size-36 before:bg-accent-purple before:rounded-full before:blur-3xl;
    @apply after:absolute after:-z-10 after:top-1/2 after:left-8 after:size-24 after:bg-primary-700 after:rounded-full after:blur-3xl;
}

.card-2 {
    background:
        radial-gradient(42% 50% at 55% 100%, #298C65 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(50% 40% at 0% 42%, #F6C31B 30%, transparent 100%);

    @apply before:absolute before:-z-10 before:bottom-8 before:left-1/2 before:-translate-x-1/3 before:w-44 before:h-36 before:bg-[#298C65] before:rounded-full before:blur-3xl;
}

.card-3 {
    background:
        radial-gradient(40% 50% at 100% 75%, #8E3BB4 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(50% 40% at 10% 30%, #F6C31B 30%, transparent 100%);

    @apply before:absolute before:-z-10 before:bottom-8 before:left-4 before:size-32 before:bg-gradient-to-tl before:from-accent-purple before:from-40% before:to-accent-yellow before:to-60% before:rounded-full before:blur-2xl;
}

.card-4 {
    background:
        radial-gradient(60% 60% at 100% 100%, #0A67EB 0, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(35% 50% at 15% 0%, #8E3BB4 30%, transparent 100%);

    @apply before:absolute before:-z-10 before:bottom-11 before:right-8 before:size-36 before:bg-primary-700 before:rounded-full before:blur-3xl;
}
</style>
