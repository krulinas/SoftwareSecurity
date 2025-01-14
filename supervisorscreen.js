function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    drawer.classList.toggle('open');
}

// Close the drawer when a link is clicked
document.querySelectorAll('.drawer-menu a').forEach(link => {
    link.addEventListener('click', () => {
        const drawer = document.getElementById('drawer');
        const mainContent = document.getElementById('main-content');
        drawer.classList.remove('open');
        mainContent.classList.remove('drawer-open');
    });
});