<script setup>
import { onMounted, onUnmounted, watch } from "vue"
import { generatePaths, appendPathsToSvg } from "@/Composables/svgPaths.js"
import { useWindowSize } from "@/Composables/useWindowSize.js"

const { windowHeight } = useWindowSize()

const updatePaths = () => {
    const paths = generatePaths(['#298C65', '#8E3BB4', '#F6C31B'], windowHeight.value, 24)

    const svgGroup = document.querySelector('#rays-g')
    svgGroup.innerHTML = ''
    appendPathsToSvg(svgGroup, paths)
}

const stop = watch(windowHeight, updatePaths)

onMounted(() => {
    updatePaths()
})

onUnmounted(() => {
    stop()
})
</script>

<template>
    <div class="ray-container">
        <div class="ray-svg-container">
            <svg id="rays" width="346" :height="windowHeight">
                <g id="rays-g"></g>
            </svg>
        </div>
    </div>
</template>

<style>
.ray-container {
    position: absolute;
    top: 0;
    height: 100%;
    width: clamp(22rem,18.65vw,27rem);
    transform: translate3d(-50%, 0, 0);

    @apply left-[68%] md:left-[57%] lg:left-[45%] xl:left-[38%];
}

.ray-svg-container {
    position: absolute;
    display: block;
    width: 100%;
    height: 100%;
    pointer-events: none;
    user-select: none;
    transform: skew(34deg);
}

#rays-g path {
    stroke-linecap: round;
    stroke-width: 1.4px;
    animation: rays var(--animation-duration) linear infinite;
    will-change: transform;
}

@keyframes rays {
    0% {
        transform: translateZ(0);
    }
    100% {
        transform: translate3d(0, -100%, 0);
    }
}
</style>
