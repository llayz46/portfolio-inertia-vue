<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {computed} from "vue";

const props = defineProps({
    plan: String,
});

const plan = computed(() => {
    switch (props.plan) {
        case 'essential':
            return {
                title: 'Essential Web App',
                price: '200€',
                description: 'Perfect for professionals.',
                background: 'bg-accent-green/35',
                halo: 'pricing-essential-halo w-full h-60 -translate-y-1/3'
            };
        case 'advanced':
            return {
                title: 'Advanced Web App',
                price: '500€',
                description: 'Great for starters.',
                background: 'bg-accent-purple/5',
                halo: 'pricing-advanced-halo w-full h-60 -translate-y-1/3'
            };
        default:
            return {
                title: 'Landing Page',
                price: '80€',
                description: 'Parfait pour présenter un produit, un service ou une idée avec impact.',
                halo: 'pricing-default-halo w-4/5 h-2/6'
            };
    }
});
</script>

<template>
    <div class="relative border rounded-lg pricing-card"
         :class="{
             'bg-zinc-1050 border-zinc-1000': !(props.plan === 'essential' || props.plan === 'advanced'),
             'bg-zinc-1050/35 border-[#256088]/30': props.plan === 'essential',
             'bg-zinc-1050/40 border-accent-purple/20': props.plan === 'advanced'
         }">
        <div class="relative p-5 z-30 overflow-hidden rounded-lg">
            <div class="relative z-40">
                <template v-if="props.plan === 'essential'">
                    <div class="flex justify-between items-center">
                        <h3 class="text-base font-semibold tracking-small">{{ plan?.title }}</h3>
                        <span class="font-dm-sans text-xs/none py-1 px-3 rounded-full bg-accent-green/75 border border-[#256088]/50">Vedette</span>
                    </div>
                </template>
                <template v-else>
                    <h3 class="text-base font-semibold tracking-small">{{ plan?.title }}</h3>
                </template>

                <div class="flex gap-1 items-baseline mt-5">
                    <span class="text-4xl font-bold tracking-small">{{ plan?.price }}</span>
                    <span class="text-xs tracking-small text-gray-400">Hors option</span>
                </div>

                <div class="flex flex-col gap-6 mt-1 mb-7 font-dm-sans">
                    <p class="text-sm font-medium text-gray-300">Parfait pour présenter un produit, un service ou une idée avec impact.</p>
                    <ul class="space-y-2">
                        <li v-for="n in 6" class="flex items-center gap-2 text-xs text-gray-400">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.46877 2.09375C9.32815 1.95312 9.1094 1.95312 8.96877 2.09375L3.65627 7.25L1.03127 4.67187C0.89065 4.53125 0.6719 4.54687 0.531275 4.67187C0.39065 4.8125 0.406275 5.03125 0.531275 5.17187L3.2969 7.85937C3.39065 7.95312 3.51565 8 3.65627 8C3.7969 8 3.90628 7.95312 4.01565 7.85937L9.46877 2.5625C9.6094 2.45312 9.6094 2.23437 9.46877 2.09375Z" fill="#9CA3AF"/>
                            </svg>
                            50 Api calls from the server
                        </li>
                    </ul>
                </div>

                <SecondaryButton class="w-full">En savoir plus</SecondaryButton>
            </div>

            <span class="pointer-events-none absolute top-0 left-1/2 -translate-x-1/2"
                  :class="plan?.halo"
                  aria-hidden="true" />

            <template v-if="props.plan === 'essential'">
                <span class="pointer-events-none absolute bottom-0 left-0 bg-[radial-gradient(100%_90%_at_0%_100%,#0f2534_60%,transparent_100%)] w-[calc(100%+25%)] h-2/3" aria-hidden="true" />
                <span class="pointer-events-none absolute bottom-0 left-0 bg-[radial-gradient(100%_40%_at_0%_100%,#256088_0%,transparent_100%)] w-3/5 h-2/3" aria-hidden="true" />
                <span class="pointer-events-none absolute top-0 left-1/2 bg-primary-300/25 blur-xl -translate-y-1/2 -translate-x-1/2 w-2/5 h-12" aria-hidden="true" />
            </template>

            <template v-if="props.plan === 'advanced'">
                <span class="pointer-events-none absolute bottom-0 right-0 bg-[radial-gradient(75%_60%_at_100%_70%,#8E3BB44D_10%,transparent_100%)] w-[calc(100%+25%)] h-2/3" aria-hidden="true" />
                <span class="pointer-events-none absolute bottom-0 right-0 bg-[radial-gradient(80%_40%_at_100%_70%,#8E3BB459_0%,transparent_100%)] w-3/5 h-2/3" aria-hidden="true" />
            </template>

            <span class="pointer-events-none absolute z-10 top-0 left-1/2 -translate-x-1/2 w-full h-2/6 bg-[url('/images/pattern.svg')] bg-[size:65px_65px] mix-blend-plus-lighter [mask-image:radial-gradient(45%_65%_at_50%_0%,#ffffff4D_10%,transparent_65%)]" aria-hidden="true" />
        </div>

        <span class="pointer-events-none select-none absolute rounded-lg inset-0 z-10 size-full"
              :class="plan?.background"
              aria-hidden="true" />

        <template v-if="props.plan === 'essential'">
            <span class="pointer-events-none select-none absolute -z-10 bottom-0 w-24 h-20 rounded-full bg-[#256088] blur-2xl" aria-hidden="true" />
        </template>

        <template v-if="props.plan === 'advanced'">
            <span class="pointer-events-none select-none absolute -z-10 bottom-8 right-0 w-24 h-20 rounded-full bg-accent-purple blur-2xl" aria-hidden="true" />
            <span class="pointer-events-none select-none absolute -z-10 top-0 left-1/2 -translate-x-1/2 w-32 h-20 rounded-full bg-accent-purple blur-2xl" aria-hidden="true" />
        </template>
    </div>
</template>


<style scoped>
.pricing-default-halo {
    background:
        radial-gradient(56% 86% at 50% -15%,hsla(0,0%,60%,.14) 0,transparent),
        radial-gradient(50% 40% at 50% -5%,hsla(0,0%,75%,.1) 0,transparent),
        radial-gradient(30% 35% at 50% -20%,rgba(255,255,255,.25) 0,transparent);
}

.pricing-essential-halo {
    background:
        radial-gradient(70% 90% at 50% 5%,hsla(204,55%,13%,1) 0%,transparent);
}

.pricing-advanced-halo {
    background: radial-gradient(60% 75% at 50% 0%,hsla(281,51%,47%,.5) 10%,transparent);
}
</style>
