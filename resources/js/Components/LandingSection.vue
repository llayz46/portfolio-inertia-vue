<script setup>
defineProps({
    sectionMaxWidth: {
        type: String,
        default: 'max-w-4xl',
    },
    h2FontSize: {
        type: String,
        default: 'text-4xl',
    },
});
</script>

<template>
    <section class="mx-auto pb-40" :class="sectionMaxWidth">
        <h2 class="text-center font-medium tracking-small text-gradient-white bg-clip-text text-transparent mb-8" :class="h2FontSize">
            <slot name="title" />
        </h2>

        <slot />
    </section>
</template>
