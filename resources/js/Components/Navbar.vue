<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
</script>

<template>
    <header class="w-fit mx-auto flex gap-44 items-center px-7 py-2 bg-accent-green/30 rounded-2xl border border-white/5 shadow-[0_0_12px_0_rgba(0,0,0,0.2)]">
        <div class="flex gap-1 items-center">
            <svg class="size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="1.3125" y="0.9375" width="21.375" height="21.75" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4C0 1.79086 1.79086 0 4 0H20C22.2091 0 24 1.79086 24 4V20C24 22.2091 22.2091 24 20 24H4C1.79086 24 0 22.2091 0 20V4ZM15.1858 4.6875H12.6497C12.3578 4.6875 12.088 4.8419 11.9425 5.09198L3.56186 19.4837H6.10368C6.39224 19.4837 6.65886 19.3318 6.80274 19.0841L15.1858 4.6875ZM19.4452 19.4837H11.3548H8.81294L17.1935 5.09198C17.339 4.8419 17.6089 4.6875 17.9007 4.6875H20.4369L13.2544 17.0223L19.4468 17.0681C19.6525 17.0697 19.8191 17.2353 19.8191 17.4396V19.1138C19.8191 19.3181 19.6516 19.4837 19.4452 19.4837Z" fill="#F6C31B"/>
            </svg>
            <span class="text-base font-bold text-white">llayz</span>
        </div>

        <nav class="flex gap-5 px-6 py-2 font-dm-sans text-xs font-medium text-white">
            <a href="/">Projets</a>
            <a href="/">Blog</a>
            <a href="/">Contact</a>
        </nav>

        <SecondaryButton>Me contacter</SecondaryButton>
    </header>
</template>
