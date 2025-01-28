<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ArrowRight, Rocket, Sparkles, Gauge, Hammer } from 'lucide-vue-next';
</script>

<template>
    <div class="max-w-3xl mx-auto background-light-effect shadow-xl rounded-lg p-px relative z-20">
        <div class="flex max-md:flex-col justify-between md:px-6 p-5 md:py-8 bg-zinc-1050 rounded-lg relative overflow-hidden">
            <div class="flex flex-col gap-6 max-md:pb-6 md:max-w-96 z-20">
                <h3 class="text-2xl md:text-4xl font-medium tracking-small text-gradient-white bg-clip-text text-transparent">Un site performant pour booster votre activité.</h3>

                <div class="hidden md:flex items-center gap-8">
                    <PrimaryButton>Contactez-moi</PrimaryButton>
                    <button class="flex items-center gap-1 font-dm-sans text-lg font-medium text-primary-700 hover:text-primary-600 hover:gap-2 transition-all">
                        Voir les tarifs
                        <ArrowRight :size="18" />
                    </button>
                </div>
            </div>

            <ul class="max-sm:space-y-1 sm:grid sm:grid-cols-2 max-md:gap-y-1 md:flex md:flex-col justify-between text-lg tracking-small relative z-20 *:flex *:gap-2 *:items-center *:max-md:text-base">
                <li>
                    <Rocket :size="24" class="text-gray-500" />
                    Votre site prêt en 3 jours
                </li>
                <li class="max-md:ml-auto max-md:pr-8">
                    <Sparkles :size="24" class="text-gray-500" />
                    100% personnalisé
                </li>
                <li>
                    <Gauge :size="24" class="text-gray-500" />
                    Optimisé pour la performance
                </li>
                <li class="max-md:ml-auto max-md:pr-8">
                    <Hammer :size="24" class="text-gray-500" />
                    Suivi après livraison
                </li>
            </ul>

            <div class="md:hidden flex flex-wrap items-center gap-x-8 gap-y-2 pt-6">
                <PrimaryButton>Contactez-moi</PrimaryButton>
                <button class="flex items-center gap-1 font-dm-sans text-lg font-medium text-primary-700 hover:text-primary-600 hover:gap-2 transition-all">
                    Voir les tarifs
                    <ArrowRight :size="18" />
                </button>
            </div>

            <span class="pointer-events-none select-none z-10 absolute top-0 right-0 -translate-y-1/2 translate-x-1/3 w-3/5 aspect-[6/3] bg-primary-900/70 blur-3xl rotate-[37deg]" aria-hidden="true"></span>
            <span class="pointer-events-none select-none z-10 absolute top-0 right-0 -translate-y-1/2 translate-x-1/3 w-32 h-20 bg-primary-300/80 blur-2xl" aria-hidden="true"></span>
            <span class="pointer-events-none select-none z-10 absolute top-0 right-0 h-full w-80 bg-[url('/images/landing/pattern/square-pattern.svg')] bg-[size:80px_80px] opacity-45 mix-blend-plus-lighter [mask-image:radial-gradient(70%_75%_at_100%_0%,black_5%,transparent_95%)]" aria-hidden="true"></span>
        </div>
    </div>
</template>

<style scoped>
.background-light-effect {
    background:
        radial-gradient(25% 60% at 100% 0%, rgba(136, 214, 255, 0.7) 50%, rgba(10, 103, 235, 0.15) 100%),
        radial-gradient(25% 50% at 15% 65%, rgba(10, 103, 235, 1) 50%, rgba(10, 103, 235, 0.15) 100%);

    @apply
        after:absolute after:top-1/2 after:-z-10 after:-translate-y-1/2 after:right-0 after:size-28 after:bg-primary-700/70 after:rounded-full after:blur-3xl
        before:absolute before:-z-10 before:top-2/3 before:-translate-y-2/3 before:translate-x-1/2 before:size-28 before:bg-primary-700/70 before:rounded-full before:blur-3xl;
}
</style>
