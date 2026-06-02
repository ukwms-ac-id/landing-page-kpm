import { ref, onMounted, onUnmounted } from "vue";

/**
 * Composable untuk logika slider/carousel
 * Menangani navigasi, timer, dan swipe gestures
 */
export function useSlider(totalSlides, delay = 6000) {
    const currentSlide = ref(0);
    const isPaused = ref(false);
    const progressBar = ref(null);
    let timer = null;

    const resetProgress = () => {
        if (progressBar.value) {
            progressBar.value.style.animation = "none";
            void progressBar.value.offsetHeight; // Trigger reflow
            progressBar.value.style.animation = `progress-run ${delay}ms linear`;
        }
    };

    const goTo = (index) => {
        currentSlide.value = (index + totalSlides) % totalSlides;
        resetProgress();
    };

    const nextSlide = () => {
        goTo(currentSlide.value + 1);
        resetTimer();
    };

    const prevSlide = () => {
        goTo(currentSlide.value - 1);
        resetTimer();
    };

    const resetTimer = () => {
        clearInterval(timer);
        startTimer();
    };

    const startTimer = () => {
        timer = setInterval(() => {
            if (!isPaused.value) goTo(currentSlide.value + 1);
        }, delay);
    };

    // Touch/Swipe Logic
    let touchStartX = 0;
    const touchStart = (e) => (touchStartX = e.touches[0].clientX);
    const touchEnd = (e) => {
        const dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 50) {
            dx < 0 ? nextSlide() : prevSlide();
        }
    };

    onMounted(() => {
        goTo(0);
        startTimer();
    });

    onUnmounted(() => {
        clearInterval(timer);
    });

    return {
        currentSlide,
        isPaused,
        progressBar,
        nextSlide,
        prevSlide,
        goTo,
        touchStart,
        touchEnd,
    };
}
