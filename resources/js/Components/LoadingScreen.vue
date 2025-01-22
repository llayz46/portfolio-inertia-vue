<script setup>
import {ref, onMounted, inject} from 'vue'

const gsap = inject('gsap')
const isAnimated = ref(null)

const handleAnimationComplete = () => {
    isAnimated.value = false
    sessionStorage.setItem('loadingScreenComplete', true)

    document.body.style.overflow = 'auto'
};

onMounted(() => {
    const isLoadingComplete = sessionStorage.getItem('loadingScreenComplete')

    if (isLoadingComplete) {
        isAnimated.value = false
    } else {
        isAnimated.value = true
        document.body.style.overflow = 'hidden'
    }

    // Line
    gsap.set(".line", { opacity: 0, width: 2, height: 2, borderRadius: 99 })
    gsap.to(".line", { opacity: 1, duration: 0.5, ease: "none", delay: 0.5 })
    gsap.to(".line", { width: 320, duration: 1, ease: "power1.inOut", delay: 1 })
    gsap.to(".line", { borderRadius: 0, duration: 1, delay: 1.5 })

    // Logo
    gsap.set(".logo", { y: 100, opacity: 0 })
    gsap.to(".logo", { y: 0, duration: 1, ease: "power2.out", delay: 2.2 })
    gsap.to(".logo", { opacity: 1, duration: 0.4, ease: "none", delay: 2.2 })

    // Gradient
    gsap.set(".gradient", { width: 0, height: 2 })
    gsap.to(".gradient", { width: 320, duration: 1, delay: 3 })

    // Retirer tout les contents
    gsap.to(".line", { opacity: 0, duration: 0.25, delay: 4.1 })
    gsap.to(".logo", { opacity: 0, duration: 0.25, delay: 4.1 })
    gsap.to(".gradient", { opacity: 0, duration: 0.25, delay: 4.1 })
    gsap.to(".blob", { opacity: 0, duration: 0.25, delay: 4.1 })

    // Background
    gsap.to(".bg-bar", {
        height: 0,
        duration: 1,
        ease: "power4.in",
        delay: 3.7,
        stagger: {
            amount: 0.5
        },
        onComplete: handleAnimationComplete
    })
})
</script>

<template>
    <div class="relative z-50">
        <div class="blob absolute top-0 z-50 left-1/2 -translate-x-1/2 -translate-y-full w-[720px] h-[170px] bg-primary-700/50 blur-[100px]"></div>
        <div class="blob absolute top-0 z-50 left-1/2 -translate-x-1/2 -translate-y-full w-72 h-12 bg-primary-400/40 blur-[50px]"></div>
        <div class="blob pointer-events-none absolute top-0 left-1/2 -translate-x-1/2 z-50 w-1/5 h-28 bg-[url('/images/pattern.svg')] bg-[size:90px_90px] opacity-50 mix-blend-plus-lighter [mask-image:radial-gradient(60%_40%_at_50%_0%,black_0%,transparent_80%)]"></div>

        <div class="absolute top-0 w-full h-screen z-40 flex flex-col justify-center items-center">
            <svg class="logo z-10" width="47" height="36" viewBox="0 0 47 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M31.9171 0H21.9544C21.2494 0 20.5974 0.37299 20.2459 0.977156L0 35.7449H9.97647C10.6736 35.7449 11.3177 35.3777 11.6653 34.7794L31.9171 0Z"
                    fill="white" />
                <path
                    d="M46.9171 0H36.9544C36.2494 0 35.5974 0.37299 35.2459 0.977156L15 35.7449H24.9765C25.6736 35.7449 26.3177 35.3777 26.6653 34.7794L46.9171 0Z"
                    fill="white" />
                <path
                    d="M21 28.5001C21 27.6716 21.6716 27.0001 22.5 27.0001H44.5C45.3284 27.0001 46 27.6716 46 28.5001V34.2501C46 35.0785 45.3284 35.7501 44.5 35.7501H22.5C21.6716 35.7501 21 35.0785 21 34.2501V28.5001Z"
                    fill="white" />
            </svg>

            <div class="line bg-white rounded-full mt-7 relative overflow-visible z-30">
                <div class="bg-gradient-to-r from-zinc-1050 via-primary-600 via-60% to-primary-500 relative gradient"></div>
                <div class="absolute top-0.5 -translate-x-1/2 left-1/2 mx-auto w-20 h-32 bg-background"></div>
            </div>
        </div>

        <div class="fixed top-0 left-0 w-screen h-screen flex">
            <div v-for="n in 6" :key="n" class="bg-bar w-1/6 h-screen bg-background"></div>
        </div>
    </div>
</template>
