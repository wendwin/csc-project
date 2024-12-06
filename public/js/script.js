document.addEventListener("alpine:init", () => {
    Alpine.store("navbar", {
        isExpanded: false,
        toggle() {
            this.isExpanded = !this.isExpanded;
        },
    });
});
