let currentSlide = 0;

function moveSlide(direction) {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const totalSlides = slides.length;

    currentSlide += direction;

    if (currentSlide < 0) {
        currentSlide = totalSlides - 1; // Loop to the last slide
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0; // Loop back to the first slide
    }

    const slideWidth = slides[0].getBoundingClientRect().width;
    track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

// Toggle the drawer menu
function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    const mainContent = document.getElementById('main-content');
    drawer.classList.toggle('open');
    mainContent.classList.toggle('drawer-open');
}

// Close the drawer when a link is clicked
document.querySelectorAll('.drawer nav a').forEach(link => {
    link.addEventListener('click', () => {
        const drawer = document.getElementById('drawer');
        const mainContent = document.getElementById('main-content');
        drawer.classList.remove('open');
        mainContent.classList.remove('drawer-open');
    });
});