export function initCarousel({ slideClass, prevId, nextId, auto = true, interval = 5000 }) {
    const slides = document.querySelectorAll(`.${slideClass}`);
    if (!slides.length) return;

    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === index);
            slide.classList.toggle('pointer-events-auto', i === index);
            slide.classList.toggle('opacity-0', i !== index);
            slide.classList.toggle('pointer-events-none', i !== index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    const nextBtn = document.getElementById(nextId);
    const prevBtn = document.getElementById(prevId);

    if (nextBtn && prevBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });
    }

    let autoSlide;
    function resetAutoSlide() {
        if (!auto) return;
        clearInterval(autoSlide);
        autoSlide = setInterval(nextSlide, interval);
    }

    if (auto) {
        autoSlide = setInterval(nextSlide, interval);
    }

    showSlide(currentSlide);
}
