<script setup>
import {Head} from '@inertiajs/vue3';
import SvgRays from "@/Components/SvgRays.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {onMounted, onUnmounted, ref} from "vue";
import HeroBlobsTopRight from "@/Components/HeroBlobsTopRight.vue";
import LoadingScreen from "@/Components/LoadingScreen.vue";
import LandingSection from "@/Components/LandingSection.vue";
import FeatureCard from "@/Components/FeatureCard.vue";
import WorkflowStepLine from "@/Components/WorkflowStepLine.vue";
import CTACard from "@/Components/CTACard.vue";
import PricingCard from "@/Components/PricingCard.vue";
import FAQCollapse from "@/Components/FAQAccordion.vue";
import Footer from "@/Components/Footer.vue";
import Navbar from "@/Components/Navbar.vue";
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

const h1 = ref(null)
const heroSection = ref(null)
const rightLine = ref(null)

const calculateSpace = () => {
    if (heroSection.value && h1.value) {
        const heroRect = heroSection.value.getBoundingClientRect();
        const h1Rect = h1.value.getBoundingClientRect();

        space.value.right = Math.ceil(Math.max(0, heroRect.right - h1Rect.right));
    }
};

const space = ref({
    left: 32,
    right: null
})

onMounted(() => {
    calculateSpace()
    window.addEventListener("resize", () => {
        calculateSpace()
        rightLine.value.style.width = space.value.right + 'px'
    })

    space.value.right = heroSection.value.offsetWidth - h1.value.offsetWidth - space.value.left
    rightLine.value.style.width = space.value.right + 'px'

    gsap.set('.halo-light', { opacity: 0 })
    gsap.from(heroSection.value, {
        opacity: 0,
        translateY: 20,
        duration: 0.8,
        scrollTrigger: {
            trigger: heroSection.value,
            start: 'top 80%',
        },
        onComplete: () => {
            gsap.to('#developer-underscore', {
                "--after-h1-width": "100%",
                duration: 1,
                ease: 'power2.out',
                delay: 0.2
            }),
            gsap.to('#fullstack', {
                textShadow: '0.03em 0.035em 0 #F6C31B',
                duration: 0.5,
                ease: 'power2.out',
                delay: 0.2
            }),
            gsap.fromTo('.halo-light', {
                opacity: 0,
                scale: 0.8
            }, {
                opacity: 1,
                scale: 1,
                duration: 2.5,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: heroSection.value,
                    start: 'top 80%',
                }
            })
        }
    })

    gsap.fromTo('.card-1, .card-3', {
        opacity: 0,
        translateX: -50
    }, {
        opacity: 1,
        translateX: 0,
        duration: 0.8,
        scrollTrigger: {
            trigger: '#section-features',
            start: 'top 65%',
        }
    })

    gsap.fromTo('.card-2, .card-4', {
        opacity: 0,
        translateX: 50
    }, {
        opacity: 1,
        translateX: 0,
        duration: 0.8,
        scrollTrigger: {
            trigger: '#section-features',
            start: 'top 65%',
        }
    })

    gsap.utils.toArray('.workflow-step-line').forEach((line) => {
        gsap.fromTo(line, {
            opacity: 0,
            translateY: -35,
            scale: 0.9
        }, {
            opacity: 1,
            translateY: 0,
            scale: 1,
            zIndex: 10,
            duration: 0.7,
            scrollTrigger: {
                trigger: line,
                start: 'top 65%',
            }
        })
    })

    gsap.fromTo('#section-cta div', {
        opacity: 0,
        rotateX: 25,
        scale: 1.01,
    }, {
        opacity: 1,
        rotateX: 0,
        scale: 1,
        duration: 0.5,
        scrollTrigger: {
            trigger: '#section-cta',
            start: 'top 65%',
        }
    })

    gsap.utils.toArray('.pricing-card').forEach((card, index) => {
        gsap.fromTo(card, {
            opacity: 0,
            rotateX: 30,
            scale: 0.9,
        }, {
            opacity: 1,
            rotateX: 0,
            scale: 1,
            duration: 1,
            delay: index * 0.3,
            scrollTrigger: {
                trigger: '#section-pricing',
                start: 'top 65%',
            }
        })
    })

    gsap.fromTo('.faq-collapse', {
        opacity: 0,
        translateY: 20,
    }, {
        opacity: 1,
        translateY: 0,
        duration: 0.5,
        stagger: 0.2,
        scrollTrigger: {
            trigger: '#section-faq',
            start: 'top 65%',
        }
    })
})

onUnmounted(() => {
    window.removeEventListener("resize", calculateSpace);
});
</script>

<template>
    <Head title="Grr paa" />

<!--    <LoadingScreen />-->

    <Navbar />

    <section class="relative h-screen w-full overflow-hidden bg-accent-green-darker">
        <HeroBlobsTopRight/>
        <SvgRays />

        <div class="flex flex-col gap-6 pt-52 h-full mx-24 border-x border-dashed border-red-500 relative z-20" :style="{ paddingLeft : space.left + 'px' }" ref="heroSection">
            <div class="relative">
                <h1 class="w-fit p-2 border-2 border-primary-600 font-bold text-7xl will-change-auto" ref="h1">Votre <span id="developer-underscore" class="relative after:absolute after:-z-10 after:-mt-1 after:left-1/2 after:-translate-x-1/2 after:block after:h-1.5 after:bg-accent-yellow">développeur</span> web <br> <span id="fullstack" class="text-stroke-1">fullstack</span> de confiance.</h1>

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

        <div class="bg-[url('images/noise-pattern.webp')] absolute inset-0 pointer-events-none select-none" aria-hidden="true"></div>

        <img loading="lazy" src="images/light-effect.svg" width="530px" height="535px" class="absolute -bottom-32 -right-40 w-[530px] h-[535px] mix-blend-hard-light opacity-30 pointer-events-none select-none" aria-hidden="true" alt="Light effect on the background">
        <img loading="lazy" src="images/light-effect.svg" width="530px" height="535px" class="absolute -bottom-32 -left-40 w-[530px] h-[535px] mix-blend-hard-light opacity-30 pointer-events-none select-none transform scale-x-[-1]" aria-hidden="true" alt="Light effect on the background">

        <svg class="absolute -bottom-12 -left-32 -rotate-[21deg] opacity-20 blur-md" width="481" height="463" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M220.86 12.6323C282.557 10.2467 306.345 91.7664 349.44 135.982C391.483 179.116 458.584 204.838 466.41 264.561C474.728 328.03 440.377 394.81 388.222 431.923C340.924 465.579 278.884 441.044 220.86 439.29C165.97 437.631 105.195 457.629 63.32 422.102C19.771 385.155 7.02877 321.125 14.9103 264.561C21.9585 213.979 69.5298 185.095 101.854 145.555C140.983 97.6896 159.083 15.021 220.86 12.6323Z" stroke="#298C65" stroke-width="25"/>
        </svg>

        <div class="halo-light absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-72 bg-[radial-gradient(43%_95%_at_50%_100%,#0F52BE33_50%,#0F52BE00_85%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>
        <div class="halo-light absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-72 bg-[radial-gradient(41%_60%_at_50%_100%,#0F52BE_50%,#0F52BE00_85%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>
        <div class="halo-light absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-40 bg-[radial-gradient(39%_87%_at_50%_100%,#88D6FF_45%,transparent_75%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>

        <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-60 bg-[radial-gradient(48%_41%_at_50%_90%,#07090A_75%,transparent_76%)] z-20 pointer-events-none select-none" aria-hidden="true"></div>
    </section>

    <main class="w-full bg-background">
        <LandingSection id="section-features" class="pt-4">
            <template #title>
                Des solutions digitales sur-mesure pour vos ambitions.
            </template>

            <div class="space-y-3">
                <div class="flex gap-3">
                    <FeatureCard title="Interfaces modernes et performantes" description="Je conçois des interfaces modernes, fluides et responsives." width="large" gradient="card-1"></FeatureCard>
                    <FeatureCard title="Maintenance et support" description="Un accompagnement à chaque étape." width="small" gradient="card-2"></FeatureCard>
                </div>

                <div class="flex gap-3">
                    <FeatureCard title="Sécurité et performance" description="Des solutions web rapides et sécurisées." width="small" gradient="card-3"></FeatureCard>
                    <FeatureCard title="Des fondations solides pour vos projets" description="Un code propre et structuré pour une évolutivité maximale avec Laravel." width="large" gradient="card-4"></FeatureCard>
                </div>
            </div>
        </LandingSection>

        <LandingSection id="section-workflow">
            <template #title>
                De l'idée à la réalisation : votre projet, ma priorité.
            </template>

            <div class="relative flex flex-col gap-14">
                <WorkflowStepLine step="1" image="analyse-et-conception.webp" imageAlt="Etape 1 : Analyse et conception">
                    <template #title>
                        Analyse et conception
                    </template>
                    <template #description>
                        Je conçois une structure claire et intuitive pour une navigation optimale.
                    </template>
                </WorkflowStepLine>

                <WorkflowStepLine class="flex-row-reverse" step="2" image="developpement.webp" imageAlt="Etape 2 : Développement">
                    <template #title>
                        Développement
                    </template>
                    <template #description>
                        J'utilise les technologies les plus adaptées pour créer un site performant et esthétique.
                    </template>
                </WorkflowStepLine>

                <WorkflowStepLine step="3" image="performance.webp" imageAlt="Etape 3 : Optimisation et sécurité">
                    <template #title>
                        Optimisation et sécurité
                    </template>
                    <template #description>
                        Je veille à ce que votre site soit rapide et offre une expérience utilisateur fluide.
                    </template>
                </WorkflowStepLine>

                <WorkflowStepLine class="flex-row-reverse" step="4" image="deploiement.webp" imageAlt="Etape 4 : Livraison et déploiement">
                    <template #title>
                        Livraison et déploiement
                    </template>
                    <template #description>
                        Je vous accompagne dans le lancement et le déploiement de votre projet.
                    </template>
                </WorkflowStepLine>

                <WorkflowStepLine step="5" image="maintenance-et-evolution.webp" imageAlt="Etape 5 : Maintenance et évolution">
                    <template #title>
                        Maintenance et évolution
                    </template>
                    <template #description>
                        Je vous propose des solutions pour faire évoluer votre site au fil du temps.
                    </template>
                </WorkflowStepLine>

                <span class="absolute left-1/2 -translate-x-1/2 h-full w-px bg-[length:1px_4px] bg-[linear-gradient(to_bottom,transparent_0,transparent_50%,#262626_50%,#262626_100%)] bg-repeat-y before:w-0.5 before:h-16 before:bg-gradient-to-b before:from-background before:to-transparent before:absolute after:w-0.5 after:h-16 after:bg-gradient-to-t after:from-background after:to-transparent after:absolute after:bottom-0" role="separator" aria-hidden="true"></span>
            </div>
        </LandingSection>

        <LandingSection id="section-cta" section-max-width="max-w-7xl" h2-font-size="text-5xl">
            <template #title>
                Contactez-moi pour donner vie à vos idées.
            </template>

            <CTACard />
        </LandingSection>

        <LandingSection id="section-pricing">
            <template #title>
                Explorez des plans adaptés à chaque besoin.
            </template>

            <div class="flex gap-3 relative z-10">
                <PricingCard/>
                <PricingCard plan="essential"/>
                <PricingCard plan="advanced"/>
            </div>
        </LandingSection>

        <LandingSection id="section-faq">
            <template #title>
                Les questions qui reviennent régulièrement.
            </template>

            <div class="flex flex-col gap-3">
                <FAQCollapse>Combien de temps faut-il pour créer une landing page ?</FAQCollapse>
                <FAQCollapse>Quels outils utilisez-vous pour le développement ?</FAQCollapse>
                <FAQCollapse>Votre travail inclut-il l’optimisation des performances et la sécurité du site ?</FAQCollapse>
                <FAQCollapse>Pouvez-vous m'aider à migrer mon site existant ?</FAQCollapse>
                <FAQCollapse>Vous occupez-vous du déploiement du site ?</FAQCollapse>
            </div>
        </LandingSection>
    </main>

    <Footer />
</template>

<style scoped>
#developer-underscore::after {
    width: var(--after-h1-width, 0);
}
</style>
