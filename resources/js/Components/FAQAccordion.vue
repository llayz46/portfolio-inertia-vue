<script setup>
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from '@/Components/ui/accordion'
</script>

<template>
    <Accordion
        type="single"
        class="flex items-center justify-between relative z-30 overflow-hidden rounded-lg bg-gradient-to-r from-[#0D0F11] to-[#17191B] border border-[#24292F] shadow-md shadow-white/[0.02]
               before:absolute before:w-44 before:h-8 before:bg-white/60 before:left-1/2 before:-translate-x-1/2 before:-top-5 before:-translate-y-full before:blur-2xl before:-z-10
               after:absolute after:inset-0 after:bg-[url('/images/landing/pattern/accordion-noise-pattern.webp')] after:opacity-70 after:bg-repeat after:-z-10 faq-collapse"
        collapsible>
        <AccordionItem value="item-1" class="w-full">
            <AccordionTrigger class="py-3 px-6 font-dm-sans text-left text-sm md:text-base w-full flex gap-2 justify-between items-center">
                <slot name="question" />
                <span class="pointer-events-none absolute -z-10 top-0 left-1/2 -translate-x-1/2 w-44 h-full bg-[url('/images/landing/pattern/square-pattern.svg')] opacity-80 bg-[size:65px_65px] mix-blend-plus-lighter [mask-image:radial-gradient(45%_90%_at_50%_0%,#ffffff4D_10%,transparent_85%)]" aria-hidden="true" />
            </AccordionTrigger>
            <AccordionContent class="px-6 pb-3 [&>strong]:text-gray-300">
                <slot name="answer" />
            </AccordionContent>
        </AccordionItem>
    </Accordion>
</template>
