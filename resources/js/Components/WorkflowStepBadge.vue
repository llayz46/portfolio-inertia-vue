<template>
    <span class="relative flex flex-none justify-center items-center z-20 size-8 md:size-12 rounded-full bg-gradient-to-tr from-primary-300 to-primary-900 text-base md:text-2xl font-medium workflow-step-badge-inset-shadow before:pointer-events-none before:absolute before:inset-0 before:size-full before:rounded-full before:bg-white/10 after:pointer-events-none after:-z-10 after:absolute after:inset-0 max-md:after:left-1/2 max-md:after:-translate-x-1/2 max-md:after:size-10/12 after:size-full after:bg-red-500 after:rounded-full after:bg-gradient-to-tr after:from-primary-300 after:to-primary-900 after:blur-md">
        <slot />
    </span>
</template>
