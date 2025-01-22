<script setup>
import { onMounted, inject } from 'vue'

const gsap = inject('gsap')
const ScrollTrigger = inject('ScrollTrigger', null)

defineProps({
    sectionMaxWidth: {
        type: String,
        default: 'max-w-4xl',
    },
    h2FontSize: {
        type: String,
        default: 'text-2xl md:text-4xl',
    },
});

onMounted(() => {
    gsap.utils.toArray('.section-title').forEach((title) => {
        gsap.fromTo(title, {
            opacity: 0,
            y: 50
        }, {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: title,
                start: 'top 90%',
            },
        })
    })
})
</script>

<template>
    <section class="max-lg:px-6 mx-auto md:pb-40 pb-28" :class="sectionMaxWidth">
        <h2 class="section-title text-center font-medium tracking-small text-gradient-white bg-clip-text text-transparent mb-8" :class="h2FontSize">
            <slot name="title" />
        </h2>

        <slot />
    </section>
</template>
