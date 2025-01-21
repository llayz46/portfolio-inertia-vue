import { ref, onMounted, onUnmounted } from 'vue'

export function useWindowSize() {
    const windowHeight = ref(window.innerHeight)
    const windowWidth = ref(window.innerWidth)

    const updateSize = () => {
        windowHeight.value = window.innerHeight
        windowWidth.value = window.innerWidth
    }

    onMounted(() => {
        window.addEventListener('resize', updateSize)
    })

    onUnmounted(() => {
        window.removeEventListener('resize', updateSize)
    })

    return { windowHeight, windowWidth }
}
