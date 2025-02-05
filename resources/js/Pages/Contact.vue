<script setup>
import {Head} from "@inertiajs/vue3"
import Footer from "@/Components/Footer.vue"
import { useForm } from '@inertiajs/vue3'
import PrimaryButton from "@/Components/PrimaryButton.vue"
import Toaster from '@/Components/ui/toast/Toaster.vue'
import { useToast } from '@/Components/ui/toast/use-toast'

const { toast } = useToast()

const form = useForm({
    name: '',
    email: '',
    message: ''
})

const submit = () => {
    form.post(route('contact.store'), {
        preserveState: true,
        onSuccess: () => {
            toast({ description: "Votre message a bien été envoyé !" })
            form.reset()
        },
    })
}
</script>

<template>
    <Head>
        <title>Me contacter</title>
        <meta name="author" content="Louis Mazeau">
<!--        <meta name="description" content="Découvrez le portfolio de Louis Mazeau, développeur web full-stack spécialisé dans la création d'applications modernes et innovantes.">-->
<!--        <meta name="keywords" content="Louis Mazeau, llayz, layz, développeur web, développeur front, développeur back, développeur fullstack, portfolio, développement web, Vue.js, Nuxt, PHP, Laravel, Tailwind CSS, intégration web">-->
<!--        <meta name="robots" content="index, follow">-->

<!--        <meta property="og:type" content="website">-->
<!--        <meta property="og:title" content="Louis Mazeau - Développeur Web Full-Stack">-->
<!--        <meta property="og:description" content="Découvrez mon portfolio : projets récents, articles de blog et services en intégration web avec Vue.js et Laravel.">-->
<!--        <meta property="og:url" content="https://llayz.fr">-->
<!--        <meta property="og:image" content="https://llayz.fr/images/seo/portfolio-seo-image.webp">-->

<!--        <meta name="twitter:card" content="summary_large_image">-->
<!--        <meta name="twitter:title" content="Louis Mazeau - Développeur Web Full-Stack">-->
<!--        <meta name="twitter:description" content="Découvrez le portfolio de Louis Mazeau, développeur web passionné par les technologies modernes.">-->
<!--        <meta name="twitter:image" content="https://llayz.fr/images/seo/portfolio-seo-image.webp">-->
    </Head>

    <div class="h-screen flex flex-col">
        <main class="h-full pb-20 w-full bg-background">
            <Toaster />

            <h1 class="tracking-small pt-8 pl-8 text-4xl sm:text-6xl md:text-8xl">Contactez-moi</h1>

            <section class="mt-20 md:mt-44 px-8 flex max-md:flex-col gap-16">
                <div class="md:w-1/2">
                    <p class="text-sm md:text-base">Que ce soit la création d’un site moderne, une refonte, ou le développement d'une solution sur-mesure, je suis là pour donner vie à vos idées !</p>
                </div>

                <form @submit.prevent="submit" class="md:w-1/2">
                    <div class="mb-8">
                        <label for="name" class="block text-sm font-medium text-white font-dm-sans">Nom*</label>
                        <input
                            type="text"
                            id="name"
                            v-model="form.name"
                            class="mt-2 block w-full bg-background border-zinc-1050 rounded-md shadow-sm"
                            required
                        />
                        <span v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</span>
                    </div>

                    <div class="mb-8">
                        <label for="email" class="block text-sm font-medium text-white font-dm-sans">Adresse email*</label>
                        <input
                            type="text"
                            id="email"
                            v-model="form.email"
                            class="mt-2 block w-full bg-background border-zinc-1050 rounded-md shadow-sm"
                            required
                        />
                        <span v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</span>
                    </div>

                    <div class="mb-8">
                        <label for="message" class="block text-sm font-medium text-white font-dm-sans">Message*</label>
                        <textarea
                            id="message"
                            v-model="form.message"
                            class="mt-2 block w-full bg-background border-zinc-1050 rounded-md shadow-sm"
                            rows="5"
                            required
                        />
                        <span v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name }}</span>
                    </div>

                    <PrimaryButton type="submit" class="ml-auto w-fit">Envoyer</PrimaryButton>
                </form>
            </section>
        </main>

<!--        <Footer />-->
    </div>
</template>
