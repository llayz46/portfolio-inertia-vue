<template>
    <span class="relative flex justify-center items-center z-20 size-[50px] rounded-full bg-gradient-to-tr from-primary-300 to-primary-900 text-2xl font-medium workflow-step-badge-inset-shadow before:pointer-events-none before:absolute before:inset-0 before:size-full before:rounded-full before:bg-white/10 after:pointer-events-none after:-z-10 after:absolute after:inset-0 after:size-full after:bg-red-500 after:rounded-full after:bg-gradient-to-tr after:from-primary-300 after:to-primary-900 after:blur-md">
        <slot />
    </span>
</template>
