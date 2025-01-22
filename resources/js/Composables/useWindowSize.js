import { ref, onMounted, onUnmounted } from 'vue'

export function useWindowSize() {
    const windowHeight = ref(0)
    const windowWidth = ref(0)

    const updateSize = () => {
        windowHeight.value = window.innerHeight
        windowWidth.value = window.innerWidth
    }

    onMounted(() => {
        updateSize()
        window.addEventListener('resize', updateSize)
    })

    onUnmounted(() => {
        window.removeEventListener('resize', updateSize)
    })

    return { windowHeight, windowWidth }
}
