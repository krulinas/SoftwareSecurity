// Function to handle login and redirect
function handleLogin(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Get the selected role from the dropdown
    const role = document.getElementById('login-role').value;

    if (role === "clerk") {
        // Redirect to clerkscreen.html
        window.location.href = "clerkscreen.php";
    } else {
        // Show an alert for other roles or invalid selections
        alert("This role is not supported yet or no role selected!");
    }
}

// Function to toggle the navigation drawer
function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    drawer.classList.toggle('open');
}