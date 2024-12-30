document.addEventListener("DOMContentLoaded", function() {
    const fadeElements = document.querySelectorAll(".fade-in");

    function handleScroll() {
        fadeElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight) {
                element.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", handleScroll);
    handleScroll(); // Kích hoạt ngay khi tải trang
});
