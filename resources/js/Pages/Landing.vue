<script setup>
import {Head} from '@inertiajs/vue3';
import SvgRays from "@/Components/SvgRays.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {inject, onMounted, onUnmounted, ref} from "vue";
import HeroBlobsTopRight from "@/Components/HeroBlobsTopRight.vue";
import LoadingScreen from "@/Components/LoadingScreen.vue";
import LandingSection from "@/Components/LandingSection.vue";
import FeatureCard from "@/Components/FeatureCard.vue";
import WorkflowStepLine from "@/Components/WorkflowStepLine.vue";
import CTACard from "@/Components/CTACard.vue";
import PricingCard from "@/Components/PricingCard.vue";
import FAQAccordion from "@/Components/FAQAccordion.vue";
import Footer from "@/Components/Footer.vue";
import Navbar from "@/Components/Navbar.vue";

const gsap = inject('gsap')

const loadingScreenAnimate = sessionStorage.getItem('loadingScreenComplete') ? ref(false) : ref(true)
const h1 = ref(null)
const heroContainer = ref(null)
const heroSection = ref(null)
const rightLine = ref(null)
const leftLine = ref(null)
const animationDelay = ref(0)

const calculateSpace = () => {
    if (window.innerWidth > 768 && heroContainer.value && h1.value) {
        const heroRect = heroContainer.value.getBoundingClientRect()
        const h1Rect = h1.value.getBoundingClientRect()

        space.value.right = Math.ceil(Math.max(0, heroRect.right - h1Rect.right))
        space.value.left2 = 32
    } else {
        const heroRect = heroSection.value.getBoundingClientRect()
        const h1Rect = h1.value.getBoundingClientRect()

        space.value.left2 = Math.ceil(Math.max(0, (heroRect.width - h1Rect.width) / 2))
        space.value.right = Math.ceil(Math.max(0, (heroRect.width - h1Rect.width) / 2))
    }
}

const space = ref({
    left: {
        value: 32,
        padding: 'md:pl-8',
        width: 'md:w-8'
    },
    left2: null,
    right: null
})

onMounted(() => {
    animationDelay.value = loadingScreenAnimate.value ? 5 : 0;

    calculateSpace()

    window.addEventListener("resize", () => {
        calculateSpace()

        rightLine.value.style.width = space.value.right + 'px'
        leftLine.value.style.width = space.value.left2 + 'px'
    })

    if(window.innerWidth > 768) {
        space.value.right = heroContainer.value.offsetWidth - h1.value.offsetWidth - space.value.left2
    } else {
        space.value.right = Math.ceil(Math.max(0, (heroSection.value.offsetWidth - h1.value.offsetWidth) / 2))
        space.value.left2 = Math.ceil(Math.max(0, (heroSection.value.offsetWidth - h1.value.offsetWidth) / 2))
        leftLine.value.style.width = space.value.left2 + 'px'
    }

    rightLine.value.style.width = space.value.right + 'px'

    gsap.set('.halo-light', { opacity: 0 })
    gsap.from(heroContainer.value, {
        opacity: 0,
        translateY: 20,
        duration: 0.8,
        delay: animationDelay.value,
        scrollTrigger: {
            trigger: heroContainer.value,
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
                    trigger: heroContainer.value,
                    start: 'top 80%',
                }
            })
        }
    })

    gsap.matchMedia().add('(max-width: 768px)', () => {
        gsap.fromTo('.card-1, .card-3', {
            opacity: 0,
            translateY: 50
        }, {
            opacity: 1,
            translateY: 0,
            duration: 0.8,
            scrollTrigger: {
                trigger: '#section-features',
                start: 'top 65%',
            }
        })

        gsap.fromTo('.card-2, .card-4', {
            opacity: 0,
            translateY: 50
        }, {
            opacity: 1,
            translateY: 0,
            duration: 0.8,
            scrollTrigger: {
                trigger: '#section-features',
                start: 'top 65%',
            }
        })
    })

    gsap.matchMedia().add('(min-width: 768px)', () => {
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
    })

    gsap.fromTo('.workflow-step-line', {
        opacity: 0,
        translateY: -35,
        scale: 0.9
    }, {
        opacity: 1,
        translateY: 0,
        scale: 1,
        zIndex: 10,
        duration: 0.7,
        stagger: 0.3,
        scrollTrigger: {
            trigger: '#section-workflow',
            start: 'top 65%',
        }
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
    window.removeEventListener("resize", calculateSpace)
})
</script>

<template>
    <Head title="Grr paa" />

    <LoadingScreen v-if="loadingScreenAnimate" />

    <Navbar />

    <section class="relative h-screen max-md:flex max-md:justify-center w-full overflow-hidden bg-accent-green-darker" ref="heroSection">
        <HeroBlobsTopRight/>
        <SvgRays />

        <div class="flex flex-col max-sm:px-6 max-md:max-w-md max-md:items-center gap-6 pt-36 md:pt-52 h-full md:mx-16 lg:mx-24 md:border-x md:border-dashed md:border-red-500 relative z-20" :class="space.left.padding" ref="heroContainer">
            <div class="relative">
                <h1 class="w-fit p-2 border-2 border-primary-600 font-bold text-4xl md:text-7xl max-md:text-center will-change-auto" ref="h1">Votre <span id="developer-underscore" class="relative after:absolute after:-z-10 after:-mt-1 after:left-1/2 after:-translate-x-1/2 after:block after:h-0.5 md:after:h-1.5 after:bg-accent-yellow">développeur</span> web <br class="max-lg:hidden"> <span id="fullstack" class="text-stroke-1">fullstack</span> de confiance.</h1>

                <div class="absolute top-1/2 left-0 -translate-x-full -translate-y-1/2">
                    <div class="relative bg-primary-600 h-px" :class="space.left.width" ref="leftLine">
                        <span class="absolute bottom-2 left-1/2 -translate-x-1/2 text-xs py-px px-1.5 bg-primary-600 rounded-full">{{ space.left2 }}</span>
                    </div>
                </div>

                <div class="absolute top-1/2 right-0 max-md:translate-x-full -translate-y-1/2">
                    <div class="relative bg-primary-600 h-px" ref="rightLine">
                        <span class="absolute bottom-2 left-1/2 -translate-x-1/2 text-xs py-px px-1.5 bg-primary-600 rounded-full">{{ space.right }}</span>
                    </div>
                </div>
            </div>

            <p class="text-base max-md:text-center md:text-xl md:max-w-4xl">Je conçois et développe des applications web modernes, performantes et sur mesure pour donner vie à vos projets. Ensemble, construisons des solutions qui feront la différence.</p>
            <PrimaryButton>Discutons de votre projet</PrimaryButton>
        </div>

        <div class="bg-[url('/images/noise-pattern.webp')] absolute inset-0 pointer-events-none select-none" aria-hidden="true"></div>

        <img loading="lazy" src="images/light-effect.svg" width="530px" height="535px" class="absolute -bottom-32 -right-40 w-[530px] h-[535px] mix-blend-hard-light opacity-30 pointer-events-none select-none" aria-hidden="true" alt="Light effect on the background">
        <img loading="lazy" src="images/light-effect.svg" width="530px" height="535px" class="absolute -bottom-32 -left-40 w-[530px] h-[535px] mix-blend-hard-light opacity-30 pointer-events-none select-none transform scale-x-[-1]" aria-hidden="true" alt="Light effect on the background">

        <svg class="absolute -bottom-20 -left-40 md:-bottom-12 md:-left-32 -rotate-[21deg] opacity-20 blur-md max-md:scale-75" width="481" height="463" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M220.86 12.6323C282.557 10.2467 306.345 91.7664 349.44 135.982C391.483 179.116 458.584 204.838 466.41 264.561C474.728 328.03 440.377 394.81 388.222 431.923C340.924 465.579 278.884 441.044 220.86 439.29C165.97 437.631 105.195 457.629 63.32 422.102C19.771 385.155 7.02877 321.125 14.9103 264.561C21.9585 213.979 69.5298 185.095 101.854 145.555C140.983 97.6896 159.083 15.021 220.86 12.6323Z" stroke="#298C65" stroke-width="25"/>
        </svg>

        <div class="halo-light absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-48 md:h-56 lg:h-72 bg-[radial-gradient(43%_95%_at_50%_100%,#0F52BE33_50%,#0F52BE00_85%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>
        <div class="halo-light absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-48 md:h-56 lg:h-72 bg-[radial-gradient(41%_60%_at_50%_100%,#0F52BE_50%,#0F52BE00_85%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>
        <div class="halo-light absolute bottom-0 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-28 md:h-28 lg:h-40 bg-[radial-gradient(39%_87%_at_50%_100%,#88D6FF_45%,transparent_75%)] blur-lg z-10 pointer-events-none select-none" aria-hidden="true"></div>

        <div class="absolute bottom-0 md:-bottom-4 lg:-bottom-8 left-1/2 -translate-x-1/2 w-[calc(100%+50%)] h-28 md:h-40 lg:h-60 bg-[radial-gradient(48%_41%_at_50%_90%,#07090A_75%,transparent_78%)] lg:bg-[radial-gradient(48%_41%_at_50%_90%,#07090A_75%,transparent_76%)] z-20 pointer-events-none select-none" aria-hidden="true"></div>
    </section>

    <main class="w-full bg-background">
        <LandingSection id="section-features" class="pt-4">
            <template #title>
                Des solutions digitales sur-mesure pour vos ambitions.
            </template>

            <div class="space-y-3">
                <div class="flex max-lg:flex-col gap-3">
                    <FeatureCard title="Interfaces modernes et performantes" description="Je conçois des interfaces modernes, fluides et responsives." width="large" gradient="card-1"></FeatureCard>
                    <FeatureCard class="max-lg:hidden" title="Maintenance et support" description="Un accompagnement à chaque étape." width="small" gradient="card-2"></FeatureCard>

                    <div class="space-y-3 lg:hidden">
                        <div class="flex max-sm:flex-col gap-3">
                            <FeatureCard title="Maintenance et support" description="Un accompagnement à chaque étape." width="small" gradient="card-2"></FeatureCard>
                            <FeatureCard title="Sécurité et performance" description="Des solutions web rapides et sécurisées." width="small" gradient="card-3"></FeatureCard>
                        </div>

                        <FeatureCard title="Des fondations solides pour vos projets" description="Un code propre et structuré pour une évolutivité maximale avec Laravel." width="large" gradient="card-4"></FeatureCard>
                    </div>
                </div>

                <div class="hidden lg:flex gap-3">
                    <FeatureCard title="Sécurité et performance" description="Des solutions web rapides et sécurisées." width="small" gradient="card-3"></FeatureCard>
                    <FeatureCard title="Des fondations solides pour vos projets" description="Un code propre et structuré pour une évolutivité maximale avec Laravel." width="large" gradient="card-4"></FeatureCard>
                </div>
            </div>
        </LandingSection>

        <LandingSection id="section-workflow">
            <template #title>
                De l'idée à la réalisation : votre projet, ma priorité.
            </template>

            <div class="flex flex-col justify-center items-center gap-14 mx-auto max-w-[796px] w-full h-auto relative">
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

        <LandingSection id="section-cta" section-max-width="max-w-7xl" h2-font-size="text-3xl md:text-5xl">
            <template #title>
                Contactez-moi pour donner vie à vos idées.
            </template>

            <CTACard />
        </LandingSection>

        <LandingSection id="section-pricing">
            <template #title>
                Explorez des plans adaptés à chaque besoin.
            </template>

            <div class="grid md:grid-cols-3 gap-3 relative z-10">
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
                <FAQAccordion>
                    <template #question>
                        Combien de temps faut-il pour développer un site web ?
                    </template>

                    <template #answer>
                        Le temps de développement dépend du plan choisi et de la complexité de votre projet :
                        <br> <br>
                        - <strong>Landing Page</strong> : 1 à 3 jours <br>
                        - <strong>Essential Web App</strong> : 5 à 7 jours <br>
                        - <strong>Advanced Web App</strong> : 7 à 12 jours <br>
                        <br>
                        Ces délais peuvent varier en fonction de vos besoins spécifiques et des éventuelles révisions. N'hésitez pas à me contacter pour un délai plus précis adapté à votre projet.
                    </template>
                </FAQAccordion>
                <FAQAccordion>
                    <template #question>
                        Quels outils utilisez-vous pour le développement ?
                    </template>

                    <template #answer>
                        Pour mes projets, j’utilise les outils et technologies suivants selon les besoins : <br>
                        <br>
                        <strong class="inline-flex items-center gap-1">
                            <svg viewBox="0 0 256 221" class="size-2.5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid"><path d="M204.8 0H256L128 220.8 0 0h97.92L128 51.2 157.44 0h47.36Z" fill="#41B883"/><path d="m0 0 128 220.8L256 0h-51.2L128 132.48 50.56 0H0Z" fill="#41B883"/><path d="M50.56 0 128 133.12 204.8 0h-47.36L128 51.2 97.92 0H50.56Z" fill="#35495E"/></svg>
                            Vue.js
                        </strong> pour la gestion des interactions dynamiques <br>
                        <strong class="inline-flex items-center gap-1">
                            <svg viewBox="0 0 256 168" xmlns="http://www.w3.org/2000/svg" class="size-2.5" preserveAspectRatio="xMidYMid"><path fill="#00DC82" d="M143.618 167.029h95.166c3.023 0 5.992-.771 8.61-2.237a16.963 16.963 0 0 0 6.302-6.115 16.324 16.324 0 0 0 2.304-8.352c0-2.932-.799-5.811-2.312-8.35L189.778 34.6a16.966 16.966 0 0 0-6.301-6.113 17.626 17.626 0 0 0-8.608-2.238c-3.023 0-5.991.772-8.609 2.238a16.964 16.964 0 0 0-6.3 6.113l-16.342 27.473-31.95-53.724a16.973 16.973 0 0 0-6.304-6.112A17.638 17.638 0 0 0 96.754 0c-3.022 0-5.992.772-8.61 2.237a16.973 16.973 0 0 0-6.303 6.112L2.31 141.975A16.302 16.302 0 0 0 0 150.325c0 2.932.793 5.813 2.304 8.352a16.964 16.964 0 0 0 6.302 6.115 17.628 17.628 0 0 0 8.61 2.237h59.737c23.669 0 41.123-10.084 53.134-29.758l29.159-48.983 15.618-26.215 46.874 78.742h-62.492l-15.628 26.214Zm-67.64-26.24-41.688-.01L96.782 35.796l31.181 52.492-20.877 35.084c-7.976 12.765-17.037 17.416-31.107 17.416Z"/></svg>
                            Nuxt.js
                        </strong> pour des applications web optimisées et côté serveur <br>
                        <strong class="inline-flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-2.5" preserveAspectRatio="xMidYMid" viewBox="0 0 256 264">
                                <path d="m255.9 59.6.1 1.1v56.6c0 1.4-.8 2.8-2 3.5l-47.6 27.4v54.2c0 1.4-.7 2.8-2 3.5l-99.1 57-.7.4-.3.1c-.7.2-1.4.2-2.1 0l-.4-.1-.6-.3L2 206c-1.3-.8-2.1-2.2-2.1-3.6V32.7l.1-1.1.2-.4.3-.6.2-.4.4-.5.4-.3c.2 0 .3-.2.5-.3L51.6.6c1.3-.8 2.9-.8 4.1 0L105.3 29c.2 0 .3.2.4.3l.5.3c0 .2.2.4.3.5l.3.4.3.6.1.4.2 1v106l41.2-23.7V60.7c0-.4 0-.7.2-1l.1-.4.3-.7.3-.3.3-.5.5-.3.4-.4 49.6-28.5c1.2-.7 2.8-.7 4 0L254 57l.5.4.4.3.4.5.2.3c.2.2.2.5.3.7l.2.3Zm-8.2 55.3v-47l-17.3 10-24 13.7v47l41.3-23.7Zm-49.5 85v-47l-23.6 13.5-67.2 38.4v47.5l90.8-52.3ZM8.2 39.9V200l90.9 52.3v-47.5l-47.5-26.9-.4-.4c-.2 0-.3-.1-.4-.3l-.4-.4-.3-.4-.2-.5-.2-.5v-.6l-.2-.5V63.6L25.6 49.8l-17.3-10Zm45.5-31L12.4 32.8l41.3 23.7 41.2-23.7L53.7 8.9ZM75 157.3l24-13.8V39.8l-17.3 10-24 13.8v103.6l17.3-10ZM202.3 36.9 161 60.7l41.3 23.8 41.3-23.8-41.3-23.8Zm-4.1 54.7-24-13.8-17.3-10v47l24 13.9 17.3 10v-47Zm-95 106 60.6-34.5 30.2-17.3-41.2-23.8-47.5 27.4L62 174.3l41.2 23.3Z" fill="#FF2D20"/>
                            </svg>
                            Laravel
                        </strong> pour la gestion du backend et des API <br>
                        <strong class="inline-flex items-center gap-1">
                            <svg
                                class="size-2.5"
                                viewBox="0 0 256 154"
                                width="256"
                                height="154"
                                xmlns="http://www.w3.org/2000/svg"
                                preserveAspectRatio="xMidYMid"
                            >
                                <defs
                                ><linearGradient x1="-2.778%" y1="32%" x2="100%" y2="67.556%" id="gradient">
                                    <stop stop-color="#2298BD" offset="0%"></stop>
                                    <stop stop-color="#0ED7B5" offset="100%"></stop>
                                </linearGradient></defs>
                                <path
                                    d="M128 0C93.867 0 72.533 17.067 64 51.2 76.8 34.133 91.733 27.733 108.8 32c9.737 2.434 16.697 9.499 24.401 17.318C145.751 62.057 160.275 76.8 192 76.8c34.133 0 55.467-17.067 64-51.2-12.8 17.067-27.733 23.467-44.8 19.2-9.737-2.434-16.697-9.499-24.401-17.318C174.249 14.743 159.725 0 128 0ZM64 76.8C29.867 76.8 8.533 93.867 0 128c12.8-17.067 27.733-23.467 44.8-19.2 9.737 2.434 16.697 9.499 24.401 17.318C81.751 138.857 96.275 153.6 128 153.6c34.133 0 55.467-17.067 64-51.2-12.8 17.067-27.733 23.467-44.8 19.2-9.737-2.434-16.697-9.499-24.401-17.318C110.249 91.543 95.725 76.8 64 76.8Z"
                                    fill="url(#gradient)"></path></svg>
                            Tailwind CSS</strong> pour une mise en page moderne et responsive <br>
                        <strong class="inline-flex items-center gap-1">
                            <svg class="size-2.5" viewBox="0 0 623 231" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M181.426 107.888C181.426 107.888 181.426 107.951 181.426 107.989L173.234 143.914C172.792 145.946 170.785 147.436 168.463 147.436H158.579C157.847 147.436 157.19 147.928 156.988 148.635C147.862 179.927 135.504 201.437 119.183 214.35C105.297 225.345 88.1806 230.47 65.3205 230.47C44.7703 230.47 30.9229 223.792 19.171 210.614C3.64473 193.194 -2.78035 164.679 1.10752 130.319C8.12588 65.8159 41.2233 0.732005 104.982 0.732005C124.371 0.555284 139.594 6.60168 150.185 18.6692C161.381 31.431 167.074 50.6558 167.099 75.8133C167.061 78.0981 165.181 79.941 162.921 79.941H116.216C114.563 79.941 113.086 78.4389 113.111 76.7853C112.732 59.3909 107.62 50.9082 97.4711 50.9082C79.5718 50.9082 69.0064 75.4725 63.4018 89.0927C55.5756 108.115 51.5993 128.767 52.3819 149.342C52.748 158.923 54.2754 172.392 63.2756 177.971C71.2533 182.919 82.6392 179.637 89.5313 174.159C96.4234 168.68 101.965 159.201 104.3 150.554C104.628 149.355 104.654 148.421 104.338 148.004C104.01 147.575 103.101 147.474 102.407 147.474H90.4149C89.1273 147.474 87.8524 146.881 87.0824 145.921C86.4387 145.113 86.1862 144.116 86.4134 143.132L94.6183 107.143C95.0223 105.301 96.6759 103.912 98.7082 103.66V103.571H177.412C177.602 103.571 177.791 103.571 177.968 103.609C180.013 103.874 181.452 105.793 181.414 107.888H181.426Z" fill="#FFFCE1"/>
                                <path d="M316.946 66.5987C316.908 68.8456 315.027 70.6885 312.768 70.6885H269.749C266.934 70.6885 264.573 68.3785 264.573 65.5636C264.573 52.8775 260.231 46.7049 251.345 46.7049C242.458 46.7049 236.727 52.2211 236.563 61.8525C236.374 72.5946 242.382 82.3521 259.499 99.128C282.031 120.486 291.056 139.408 290.627 164.414C289.92 204.858 262.705 231 221.302 231C200.158 231 184.001 225.282 173.259 214.01C162.353 202.56 157.354 185.759 158.402 164.073C158.452 161.826 160.32 159.996 162.58 159.996H207.076C208.288 159.996 209.487 160.589 210.295 161.599C210.989 162.47 211.279 163.543 211.103 164.553C210.61 172.379 211.961 178.223 215.003 181.455C216.96 183.55 219.674 184.611 223.069 184.611C231.287 184.611 236.109 178.741 236.285 168.516C236.437 159.68 233.672 151.93 218.601 136.265C199.136 117.04 181.678 97.1841 182.221 65.9549C182.537 47.8536 189.656 31.2923 202.267 19.3257C215.596 6.67754 233.837 0 255.005 0C276.212 0.151475 292.281 6.26098 302.77 18.1644C312.705 29.4493 317.489 45.7456 316.959 66.5987H316.946Z" fill="#FFFCE1"/>
                                <path d="M450.295 223.388L450.572 8.30601C450.61 6.0465 448.805 4.20355 446.546 4.20355H379.96C377.725 4.20355 376.741 6.14749 376.097 7.43503L279.696 222.076V222.114C279.696 222.114 279.67 222.151 279.658 222.164C278.585 224.802 280.617 227.63 283.445 227.63H329.985C332.497 227.63 334.164 226.86 334.984 225.257L344.224 202.813C345.36 199.821 345.575 199.544 348.806 199.544H393.277C396.369 199.544 396.433 199.607 396.382 202.662L395.385 223.527C395.347 225.787 397.152 227.63 399.412 227.63H446.432C447.631 227.63 448.755 227.125 449.499 226.229C450.168 225.433 450.446 224.424 450.295 223.388ZM367.917 151.577C367.488 151.577 367.147 151.564 366.87 151.539C366.175 151.476 365.708 150.807 365.885 150.125C365.973 149.809 366.1 149.393 366.289 148.875L399.639 65.5006C399.929 64.6801 400.295 63.8722 400.674 63.0896C401.217 61.9662 401.873 61.8904 402.075 62.7236C402.252 63.4178 398.25 148.332 398.25 148.332C397.935 151.513 397.796 151.64 394.691 151.905L367.955 151.589H367.892L367.917 151.577Z" fill="#FFFCE1"/>
                                <path d="M545.143 4.2035H509.799C507.931 4.2035 505.835 5.20071 505.343 7.4476C505.343 7.4476 456.151 223.25 456.151 223.275C455.937 224.272 456.164 225.257 456.82 226.077C457.59 227.036 458.865 227.63 460.153 227.63H504.333C506.706 227.63 508.335 226.456 508.776 224.411C508.776 224.411 514.128 200.023 514.141 199.948C514.52 198.042 513.863 196.565 512.172 195.668C511.377 195.252 510.581 194.835 509.799 194.419L502.137 190.392L494.512 186.378C493.528 185.86 492.543 185.343 491.571 184.825C491.079 184.573 490.776 184.068 490.789 183.513C490.801 182.692 491.483 182.023 492.303 182.023L516.514 182.137C523.76 182.174 531.005 181.657 538.125 180.332C588.263 170.978 621.562 130.395 622.522 75.1824C623.342 28.0609 597.314 4.17825 545.181 4.17825L545.143 4.2035ZM533.113 132.642H532.167C530.046 132.642 529.667 132.402 529.604 132.326C529.566 132.276 543.565 70.171 543.578 70.0827C543.931 68.2902 543.919 67.2551 542.82 66.6492C541.419 65.8666 520.983 54.973 520.983 54.973C520.49 54.7079 520.2 54.203 520.213 53.6476C520.225 52.8397 520.894 52.1707 521.715 52.1707H554.03C564.09 52.4863 569.695 61.5748 569.43 77.101C568.963 103.988 556.314 131.695 533.113 132.642Z" fill="#FFFCE1"/>
                                <path d="M581.095 227.63C588.366 227.63 594.058 222.038 594.058 214.502C594.058 206.966 588.366 201.374 581.095 201.374C573.824 201.374 568.068 206.966 568.068 214.502C568.068 222.038 573.811 227.63 581.095 227.63ZM571.16 214.451C571.16 208.052 574.96 203.861 581.095 203.861C587.229 203.861 590.966 208.039 590.966 214.451C590.966 220.864 587.229 225.08 581.095 225.08C574.96 225.08 571.16 220.902 571.16 214.451ZM575.402 221.495H579.529V216.446H580.729C583.821 216.446 582.471 220.902 583.228 221.495H587.507V221.28C586.699 221.066 587.999 215.474 584.415 214.881V214.817C586.157 214.451 587.28 213.189 587.28 211.296C587.28 208.582 585.323 207.117 582.168 207.117H575.377V221.495H575.402ZM579.529 213.404V210.033H580.943C582.357 210.033 583.165 210.475 583.165 211.712C583.165 212.848 582.357 213.391 580.943 213.391H579.529V213.404Z" fill="#FFFCE1"/>
                            </svg>
                            GSAP
                        </strong> pour des animations complexes et fluides <br>
                        <br>
                        Ces outils me permettent de créer des sites web et applications performants, modernes et optimisés.
                    </template>
                </FAQAccordion>
                <FAQAccordion>
                    <template #question>
                        Votre travail inclut-il l’optimisation des performances et la sécurité du site ?
                    </template>
                    <template #answer>
                        Oui, l'optimisation des performances et la sécurité font partie intégrante de mon processus de développement. Selon les besoins du projet, je m'assure de : <br>
                        <br>
                        - <strong>Optimiser les temps de chargement</strong> en compressant les images et en minimisant les fichiers CSS/JS <br>
                        - Mettre en place une bonne gestion du cache pour <strong>améliorer la réactivité</strong> <br>
                        - <strong>Appliquer les bonnes pratiques SEO</strong> pour un meilleur référencement <br>
                        - <strong>Sécuriser le site</strong> en utilisant des certificats SSL et en mettant en place des pare-feux et des protection contre les attaques XSS, CSRF, etc <br>
                        <br>
                        Je m'efforce de créer des sites performants, sécurisés et optimisés pour offrir la meilleure expérience utilisateur possible.
                    </template>
                </FAQAccordion>
                <FAQAccordion>
                    <template #question>
                        Pouvez-vous m'aider à migrer mon site existant ?
                    </template>
                    <template #answer>
                        Oui, je peux vous aider à migrer votre site existant vers une nouvelle plateforme d'hébergement. Cela inclut : <br>
                        <br>
                        - <strong>La création de sauvegardes complètes</strong> de vos données et fichiers avant la migration<br>
                        - <strong>La mise en place de la migration</strong> vers un nouvel environnement ou serveur sans perte de données <br>
                        - <strong>La configuration et l’optimisation du nouveau site</strong> sur la nouvelle plateforme <br>
                        <br>
                        Je m'assure que la migration soit sécurisée, sans risque de perte de données, et avec un minimum d'interruption pour vos utilisateurs.
                    </template>
                </FAQAccordion>
                <FAQAccordion>
                    <template #question>
                        Vous occupez-vous du déploiement du site ?
                    </template>
                    <template #answer>
                        Oui, je peux m'occuper du déploiement complet de votre site. Cela inclut : <br>
                        <br>
                        - <strong>La configuration du serveur</strong> pour héberger votre site (en utilisant NGINX, Apache, ou tout autre serveur compatible) <br>
                        - <strong>Le déploiement sur votre hébergement ou VPS</strong> avec la mise en place d'un environnement sécurisé <br>
                        - <strong>La configuration des certificats SSL</strong> pour garantir une connexion HTTPS sécurisée <br>
                        - <strong>La sécurisation du serveur</strong> en mettant en place des pare-feu, des accès SSH sécurisés et des mises à jour régulières <br>
                        <br>
                        Je m'assure que le déploiement se fasse de manière fluide et que votre site soit sécurisé et optimisé pour la production.
                    </template>
                </FAQAccordion>
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
