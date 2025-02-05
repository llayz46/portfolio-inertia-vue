<script setup>
import ProjectLayout from '@/Layouts/ProjectLayout.vue';
import TechnologyTag from "@/Components/TechnologyTag.vue";
import {ArrowUpRight} from "lucide-vue-next";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {inject, onMounted} from "vue";
import { Link } from '@inertiajs/vue3';
import SparklesText from "@/Components/InpiraUI/SparklesText.vue";
import Navbar from "@/Components/Navbar.vue";

const gsap = inject('gsap')

defineProps({
    project: Object
})

onMounted(() => {
    gsap.set('.title-div ul li:not(:first-child)', {
        opacity: 0
    })

    gsap.fromTo('.title-div > *', {
        opacity: 0,
        translateY: -35,
        scale: 0.9
    }, {
        opacity: 1,
        translateY: 0,
        scale: 1,
        duration: 0.55,
        delay: 0.3,
        stagger: 0.3,
        onComplete: () => {
            gsap.fromTo('.title-div ul li:not(:first-child)', {
                opacity: 0,
                scale: 0.9
            }, {
                opacity: 1,
                scale: 1,
                duration: 0.4,
                stagger: 0.2,
            })
        }
    })

    gsap.fromTo('.project-image', {
        opacity: 0,
        scale: 0.9
    }, {
        opacity: 1,
        scale: 1,
        duration: 0.6,
        delay: 1.2,
    })
})
</script>

<template>
    <ProjectLayout :project="project">

        <Navbar />
        <div class="relative z-20 md:max-w-3xl lg:max-w-5xl xl:max-w-7xl px-3 md:px-8 mx-auto">
            <article class="pt-24 pb-20 sm:pb-32 flex flex-col gap-8 md:gap-16 items-center w-full">
                <div class="title-div flex flex-col items-center gap-4">
                    <span class="text-xs md:text-sm text-neutral-400 uppercase tracking-small">Projet</span>

                    <h1 class="text-5xl md:text-8xl">{{ project.name }}</h1>

                    <ul class="mt-4 flex justify-center flex-wrap gap-2.5 font-dm-sans text-xs">
                        <TechnologyTag v-for="technology in project.technologies" :key="technology.id" :technology="technology" />
                    </ul>
                </div>

                <img :src="project.image" :alt="`Image d'illustration du projet ${project.name}`" class="project-image w-fit rounded-md sm:rounded-xl md:rounded-3xl">

                <div class="max-w-4xl flex flex-col max-md:gap-6 grid-container">
                    <div class="text-start space-y-0.5">
                        <h3 class="text-sm text-neutral-400 lowercase tracking-small">Projet</h3>
                        <h2 class="text-lg font-dm-sans">{{ project.name }}</h2>
                    </div>

                    <div class="text-start space-y-0.5">
                        <h3 class="text-sm text-neutral-400 lowercase tracking-small">Année</h3>
                        <h2 class="text-lg font-dm-sans">{{ project.year }}</h2>
                    </div>

                    <div class="flex flex-col gap-8">
                        <div class="text-start space-y-0.5">
                            <h3 class="text-sm text-neutral-400 lowercase tracking-small">Présentation</h3>
                            <h2 class="text-base md:text-lg font-dm-sans">{{ project.description }}</h2>
                        </div>

                        <div class="flex items-center justify-between">
                            <a v-if="project.github" target="_blank" :href="project.github" class="flex items-center gap-2 group">
                                <h4 class="text-base text-neutral-400">GitHub</h4>

                                <ArrowUpRight class="w-4 h-6 text-white/50 group-hover:rotate-45 transition-transform duration-300" />
                            </a>

                            <a :href="project.url" target="_blank">
                                <SecondaryButton>
                                    Lien vers le projet
                                </SecondaryButton>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <h3 class="text-sm text-neutral-400 lowercase tracking-small">Stack</h3>

                        <ul class="flex flex-wrap md:flex-col gap-2 mt-1.5 font-dm-sans text-xs">
                            <TechnologyTag class="w-fit" v-for="technology in project.technologies" :key="technology.id" :technology="technology" />
                        </ul>
                    </div>
                </div>
            </article>

            <div>
                <SparklesText
                    text="Contactez-moi"
                    :colors="{ first: '#8E3BB4', second: '#F6C31B' }"
                    :sparkles-count="10"
                    class="my-4 sm:my-8 max-sm:text-2xl sm:text-3xl md:text-5xl font-semibold text-center"
                />

                <div class="sm:grid sm:grid-cols-3 items-center max-w-3xl mx-auto p-6 pattern w-full rounded-xl sm:rounded-3xl">
                    <div class="flex flex-col sm:col-span-2">
                        <h3 class="text-2xl sm:text-3xl leading-none">Un projet ?</h3>

                        <p class="mt-4 mb-6 text-xs sm:text-sm text-white/60">Un projet en tête ou une question ? Je suis disponible pour échanger et découvrir de nouvelles opportunités !</p>

                        <Link :href="route('contact.index')">
                            <SecondaryButton class="w-fit">Contactez moi</SecondaryButton>
                        </Link>
                    </div>

                    <svg class="hidden sm:block mx-auto size-16 fill-white/85" width="128" height="128" viewBox="0 0 128 128" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 24C0 10.7452 10.7452 0 24 0H104C117.255 0 128 10.7452 128 24V104C128 117.255 117.255 128 104 128H24C10.7452 128 0 117.255 0 104V24ZM80.9908 24.9999H67.4648C65.9085 24.9999 64.4691 25.8233 63.6931 27.1571L18.9966 103.913H32.5529C34.092 103.913 35.5139 103.103 36.2813 101.782L80.9908 24.9999ZM103.708 103.913H60.5587H47.0024L91.6989 27.1571C92.4749 25.8233 93.9142 24.9999 95.4706 24.9999H108.997L70.6902 90.7852L103.716 91.0297C104.813 91.0383 105.702 91.9218 105.702 93.0111V101.94C105.702 103.03 104.809 103.913 103.708 103.913Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </ProjectLayout>
</template>

<style scoped>
@media (min-width: 768px) {
    .grid-container {
        display: grid;
        grid-template-columns: 2fr 1fr;
        width: 100%;
        gap: 3rem;
        padding-left: 1rem;
    }
}

.pattern {
    background-size: cover;
    background-position: center center;
    background-repeat: repeat;
    background-image: url("data:image/svg+xml;utf8,%3Csvg viewBox=%220 0 672 210%22 xmlns=%22http:%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cmask id=%22b%22 x=%220%22 y=%220%22 width=%22672%22 height=%22210%22%3E%3Cpath fill=%22url(%23a)%22 d=%22M0 0h672v210H0z%22%2F%3E%3C%2Fmask%3E%3Cpath fill=%22%23091821%22 d=%22M0 0h672v210H0z%22%2F%3E%3Cg style=%22transform-origin:center center%22 stroke=%22%23647683%22 stroke-width=%22.202%22 mask=%22url(%23b)%22%3E%3Cpath fill=%22none%22 d=%22M0 0h33.6v33.6H0z%22%2F%3E%3Cpath fill=%22%236476837d%22 d=%22M33.6 0h33.6v33.6H33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M67.2 0h33.6v33.6H67.2z%22%2F%3E%3Cpath fill=%22%2364768398%22 d=%22M100.8 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M134.4 0H168v33.6h-33.6zM168 0h33.6v33.6H168z%22%2F%3E%3Cpath fill=%22%23647683c5%22 d=%22M201.6 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M235.2 0h33.6v33.6h-33.6zM268.8 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476830f%22 d=%22M302.4 0H336v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M336 0h33.6v33.6H336zM369.6 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768369%22 d=%22M436.8 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M470.4 0H504v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768385%22 d=%22M504 0h33.6v33.6H504z%22%2F%3E%3Cpath fill=%22none%22 d=%22M537.6 0h33.6v33.6h-33.6zM571.2 0h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M604.8 0h33.6v33.6h-33.6zM638.4 0H672v33.6h-33.6zM0 33.6h33.6v33.6H0z%22%2F%3E%3Cpath fill=%22%2364768340%22 d=%22M33.6 33.6h33.6v33.6H33.6z%22%2F%3E%3Cpath fill=%22%2364768317%22 d=%22M67.2 33.6h33.6v33.6H67.2z%22%2F%3E%3Cpath fill=%22none%22 d=%22M100.8 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683b4%22 d=%22M134.4 33.6H168v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476837f%22 d=%22M168 33.6h33.6v33.6H168z%22%2F%3E%3Cpath fill=%22none%22 d=%22M201.6 33.6h33.6v33.6h-33.6zM235.2 33.6h33.6v33.6h-33.6zM268.8 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M302.4 33.6H336v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683a0%22 d=%22M336 33.6h33.6v33.6H336z%22%2F%3E%3Cpath fill=%22none%22 d=%22M369.6 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 33.6h33.6v33.6h-33.6zM436.8 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476830f%22 d=%22M470.4 33.6H504v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M504 33.6h33.6v33.6H504z%22%2F%3E%3Cpath fill=%22%23647683f2%22 d=%22M537.6 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M571.2 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M604.8 33.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476838b%22 d=%22M638.4 33.6H672v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M0 67.2h33.6v33.6H0zM33.6 67.2h33.6v33.6H33.6zM67.2 67.2h33.6v33.6H67.2z%22%2F%3E%3Cpath fill=%22%2364768388%22 d=%22M100.8 67.2h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M134.4 67.2H168v33.6h-33.6zM168 67.2h33.6v33.6H168zM201.6 67.2h33.6v33.6h-33.6zM235.2 67.2h33.6v33.6h-33.6zM268.8 67.2h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M302.4 67.2H336v33.6h-33.6zM336 67.2h33.6v33.6H336zM369.6 67.2h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 67.2h33.6v33.6h-33.6zM436.8 67.2h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683aa%22 d=%22M470.4 67.2H504v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768385%22 d=%22M504 67.2h33.6v33.6H504z%22%2F%3E%3Cpath fill=%22none%22 d=%22M537.6 67.2h33.6v33.6h-33.6zM571.2 67.2h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M604.8 67.2h33.6v33.6h-33.6zM638.4 67.2H672v33.6h-33.6zM0 100.8h33.6v33.6H0zM33.6 100.8h33.6v33.6H33.6zM67.2 100.8h33.6v33.6H67.2z%22%2F%3E%3Cpath fill=%22none%22 d=%22M100.8 100.8h33.6v33.6h-33.6zM134.4 100.8H168v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768379%22 d=%22M168 100.8h33.6v33.6H168z%22%2F%3E%3Cpath fill=%22%2364768399%22 d=%22M201.6 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768338%22 d=%22M235.2 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476836a%22 d=%22M268.8 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M302.4 100.8H336v33.6h-33.6zM336 100.8h33.6v33.6H336zM369.6 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 100.8h33.6v33.6h-33.6zM436.8 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M470.4 100.8H504v33.6h-33.6zM504 100.8h33.6v33.6H504zM537.6 100.8h33.6v33.6h-33.6zM571.2 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683a4%22 d=%22M604.8 100.8h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M638.4 100.8H672v33.6h-33.6zM0 134.4h33.6V168H0z%22%2F%3E%3Cpath fill=%22%2364768376%22 d=%22M33.6 134.4h33.6V168H33.6z%22%2F%3E%3Cpath fill=%22%2364768361%22 d=%22M67.2 134.4h33.6V168H67.2z%22%2F%3E%3Cpath fill=%22none%22 d=%22M100.8 134.4h33.6V168h-33.6zM134.4 134.4H168V168h-33.6z%22%2F%3E%3Cpath fill=%22%2364768388%22 d=%22M168 134.4h33.6V168H168z%22%2F%3E%3Cpath fill=%22none%22 d=%22M201.6 134.4h33.6V168h-33.6zM235.2 134.4h33.6V168h-33.6zM268.8 134.4h33.6V168h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M302.4 134.4H336V168h-33.6z%22%2F%3E%3Cpath fill=%22%236476832c%22 d=%22M336 134.4h33.6V168H336z%22%2F%3E%3Cpath fill=%22none%22 d=%22M369.6 134.4h33.6V168h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 134.4h33.6V168h-33.6zM436.8 134.4h33.6V168h-33.6z%22%2F%3E%3Cpath fill=%22%2364768314%22 d=%22M470.4 134.4H504V168h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M504 134.4h33.6V168H504z%22%2F%3E%3Cpath fill=%22%236476835e%22 d=%22M537.6 134.4h33.6V168h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M571.2 134.4h33.6V168h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M604.8 134.4h33.6V168h-33.6zM638.4 134.4H672V168h-33.6z%22%2F%3E%3Cpath fill=%22%23647683ad%22 d=%22M0 168h33.6v33.6H0z%22%2F%3E%3Cpath fill=%22none%22 d=%22M33.6 168h33.6v33.6H33.6z%22%2F%3E%3Cpath fill=%22%236476837b%22 d=%22M67.2 168h33.6v33.6H67.2z%22%2F%3E%3Cpath fill=%22none%22 d=%22M100.8 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768330%22 d=%22M134.4 168H168v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M168 168h33.6v33.6H168zM201.6 168h33.6v33.6h-33.6zM235.2 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683fd%22 d=%22M268.8 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683a5%22 d=%22M302.4 168H336v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768396%22 d=%22M336 168h33.6v33.6H336z%22%2F%3E%3Cpath fill=%22%23647683dc%22 d=%22M369.6 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476830c%22 d=%22M436.8 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M470.4 168H504v33.6h-33.6zM504 168h33.6v33.6H504zM537.6 168h33.6v33.6h-33.6zM571.2 168h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M604.8 168h33.6v33.6h-33.6zM638.4 168H672v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%236476835a%22 d=%22M0 201.6h33.6v33.6H0z%22%2F%3E%3Cpath fill=%22%23647683a0%22 d=%22M33.6 201.6h33.6v33.6H33.6z%22%2F%3E%3Cpath fill=%22%2364768324%22 d=%22M67.2 201.6h33.6v33.6H67.2z%22%2F%3E%3Cpath fill=%22none%22 d=%22M100.8 201.6h33.6v33.6h-33.6zM134.4 201.6H168v33.6h-33.6zM168 201.6h33.6v33.6H168z%22%2F%3E%3Cpath fill=%22%23647683a4%22 d=%22M201.6 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M235.2 201.6h33.6v33.6h-33.6zM268.8 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M302.4 201.6H336v33.6h-33.6zM336 201.6h33.6v33.6H336z%22%2F%3E%3Cpath fill=%22%2364768331%22 d=%22M369.6 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M403.2 201.6h33.6v33.6h-33.6zM436.8 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M470.4 201.6H504v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%2364768362%22 d=%22M504 201.6h33.6v33.6H504z%22%2F%3E%3Cpath fill=%22%236476831a%22 d=%22M537.6 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M571.2 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22none%22 d=%22M604.8 201.6h33.6v33.6h-33.6z%22%2F%3E%3Cpath fill=%22%23647683cf%22 d=%22M638.4 201.6H672v33.6h-33.6z%22%2F%3E%3C%2Fg%3E%3Cpath fill=%22%23f3f3f3%22 filter=%22url(%23c)%22 opacity=%22.8%22 d=%22M0 0h672v210H0z%22%2F%3E%3Cdefs%3E%3CradialGradient id=%22a%22%3E%3Cstop offset=%220%22 stop-color=%22%23fff%22%2F%3E%3Cstop offset=%22100%25%22 stop-color=%22%23fff%22 stop-opacity=%220%22%2F%3E%3C%2FradialGradient%3E%3Cfilter id=%22c%22 x=%22-268.8%22 y=%22-84%22 width=%22940.8%22 height=%22294%22 filterUnits=%22userSpaceOnUse%22 primitiveUnits=%22userSpaceOnUse%22 color-interpolation-filters=%22linearRGB%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%22.105%22 numOctaves=%224%22 seed=%2215%22 stitchTiles=%22no-stitch%22 x=%220%22 y=%220%22 width=%22672%22 height=%22210%22 result=%22turbulence%22%2F%3E%3CfeSpecularLighting surfaceScale=%2210%22 specularConstant=%22.07%22 specularExponent=%2220%22 lighting-color=%22%23fff%22 x=%220%22 y=%220%22 width=%22672%22 height=%22210%22 in=%22turbulence%22 result=%22specularLighting%22%3E%3CfeDistantLight azimuth=%223%22 elevation=%22100%22%2F%3E%3C%2FfeSpecularLighting%3E%3C%2Ffilter%3E%3C%2Fdefs%3E%3C%2Fsvg%3E");
}
</style>
