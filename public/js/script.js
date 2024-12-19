// document.addEventListener("alpine:init", () => {
//     Alpine.store("navbar", {
//         isExpanded: false,
//         toggle() {
//             this.isExpanded = !this.isExpanded;
//         },
//     });
// });

window.addEventListener('scroll', () => {
    Alpine.store('navbar').updateVisibility();
});

document.addEventListener("alpine:init", () => {
    Alpine.store("navbar", {
        isExpanded: false,
        lastScrollY: 0,
        isVisible: true,

        toggleNavbar() {
            this.isExpanded = !this.isExpanded;
        },
        updateVisibility() {
            const currentScrollY = window.scrollY;
            if (currentScrollY === 0) {
                this.isVisible = true;
                this.isExpanded = false; 
            } else if (currentScrollY > this.lastScrollY) {
                this.isVisible = false; 
            } else {
                this.isVisible = true; 
                this.isExpanded = true; 
            }
            this.lastScrollY = currentScrollY;
        },
    });
});


document.addEventListener("alpine:init", () => {
    Alpine.store("carousel", {
        currentSlide: 0,
        setActiveSlide(slideIndex) {
            this.currentSlide = slideIndex;
        }
    });
});
