<template>
    <button class="relative text-base font-semibold py-2 px-5 bg-gradient-to-r from-primary-800 to-primary-600 rounded-lg w-fit before:pointer-events-none before:absolute before:inset-0 before:bg-black/30 before:opacity-0 before:hover:opacity-100 before:rounded-lg before:transition-opacity after:pointer-events-none after:absolute after:-inset-[2px] after:bg-gradient-to-r after:from-primary-800/15 after:to-primary-600/15 after:rounded-[10px]">
        <slot/>
    </button>
</template>
