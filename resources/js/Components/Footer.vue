<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="w-full bg-background pb-8 max-lg:px-6">
        <div class="max-w-4xl mx-auto flex flex-col gap-5">
            <span class="bg-gradient-to-r from-transparent via-[#24292F] to-background w-full max-w-4xl h-px" aria-hidden="true"></span>

            <div class="flex justify-between font-dm-sans text-xs">
                <p>2024 llayz</p>

                <div class="flex gap-5">
<!--                    <template v-if="!route().current('landing')">-->
<!--                        <Link :href="route('landing')">Accueil</Link>-->
<!--                    </template>-->
                    <Link :href="route('contact.index')">Contact</Link>
                    <Link href="/#section-projects">Projet</Link>
                    <Link href="/#section-pricing">Tarif</Link>
                </div>
            </div>
        </div>
    </footer>
</template>
