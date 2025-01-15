<script setup>
import {Head} from '@inertiajs/vue3';
import SvgRays from "@/Components/SvgRays.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {onMounted, ref} from "vue";
import HeroBlobsTopRight from "@/Components/HeroBlobsTopRight.vue";

const h1 = ref(null)
const heroSection = ref(null)
const rightLine = ref(null)

const space = ref({
    left: 32,
    right: null
})

onMounted(() => {
    space.value.right = heroSection.value.offsetWidth - h1.value.offsetWidth - space.value.left

    rightLine.value.style.width = space.value.right + 'px'
})
</script>

<template>
    <Head title="Grr paa" />

    <section class="relative h-screen w-full overflow-hidden bg-accent-green-darker">
<!--        <Navbar />-->

        <HeroBlobsTopRight/>
        <SvgRays />

        <div class="flex flex-col gap-6 text-white pt-52 h-full mx-24 border-x border-dashed border-red-500 relative z-20" :style="{ paddingLeft : space.left + 'px' }" ref="heroSection">
            <div class="relative">
                <h1 class="w-fit p-2 border-2 border-primary-600 font-bold text-7xl" ref="h1">Votre <span class="relative after:absolute after:-z-10 after:-mt-1 after:left-1/2 after:-translate-x-1/2 after:block after:h-1.5 after:w-full after:bg-accent-yellow">développeur</span> web <br> <span class="text-stroke-1 text-shadow">fullstack</span> de confiance.</h1>

                <div class="absolute top-1/2 left-0 -translate-x-full -translate-y-1/2">
                    <div class="relative bg-primary-600 h-px" :style="{ width: space.left + 'px' }">
                        <span class="absolute bottom-2 left-1/2 -translate-x-1/2 text-xs py-px px-1.5 bg-primary-600 rounded-full">{{ space.left }}</span>
                    </div>
                </div>

                <div class="absolute top-1/2 right-0 -translate-y-1/2">
                    <div class="relative bg-primary-600 h-px" ref="rightLine">
                        <span class="absolute bottom-2 left-1/2 -translate-x-1/2 text-xs py-px px-1.5 bg-primary-600 rounded-full">{{ space.right }}</span>
                    </div>
                </div>
            </div>

            <p class="text-xl">Je conçois et développe des applications web modernes, performantes et sur mesure pour donner vie à vos projets. Ensemble, construisons des solutions qui feront la différence.</p>
            <PrimaryButton>Discutons de votre projet</PrimaryButton>
        </div>

        <img loading="lazy" src="images/noise-background.png" class="absolute inset-0 pointer-events-none select-none" aria-hidden="true" alt="Noise effect on the background">

        <img loading="lazy" src="images/light-effect.svg" width="530px" height="535px" class="absolute -bottom-32 -right-40 w-[530px] h-[535px] mix-blend-hard-light opacity-30 pointer-events-none select-none" aria-hidden="true" alt="Light effect on the background">
        <img loading="lazy" src="images/light-effect.svg" width="530px" height="535px" class="absolute -bottom-32 -left-40 w-[530px] h-[535px] mix-blend-hard-light opacity-30 pointer-events-none select-none transform scale-x-[-1]" aria-hidden="true" alt="Light effect on the background">

        <svg class="absolute -bottom-12 -left-32 -rotate-[21deg] opacity-20 blur-md" width="481" height="463" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M220.86 12.6323C282.557 10.2467 306.345 91.7664 349.44 135.982C391.483 179.116 458.584 204.838 466.41 264.561C474.728 328.03 440.377 394.81 388.222 431.923C340.924 465.579 278.884 441.044 220.86 439.29C165.97 437.631 105.195 457.629 63.32 422.102C19.771 385.155 7.02877 321.125 14.9103 264.561C21.9585 213.979 69.5298 185.095 101.854 145.555C140.983 97.6896 159.083 15.021 220.86 12.6323Z" stroke="#298C65" stroke-width="25"/>
        </svg>

        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-72 bg-[radial-gradient(43%_95%_at_50%_100%,#0F52BE33_50%,#0F52BE00_85%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-72 bg-[radial-gradient(40%_60%_at_50%_100%,#0F52BE_50%,#0F52BE00_85%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-40 bg-[radial-gradient(36%_87%_at_50%_100%,#88D6FF_45%,transparent_75%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>

        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-20 bg-[radial-gradient(45%_109%_at_50%_90%,#07090A_80%,transparent_81%)] z-20 pointer-events-none select-none" aria-hidden="true"></div>
    </section>

    <main class="h-[2000px] w-full bg-background"></main>
</template>
