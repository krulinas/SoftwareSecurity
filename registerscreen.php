<?php
session_start();
error_reporting(0);
include('dbconnect.php'); // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);
    $role = trim($_POST['role']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($password) || empty($confirmpassword) || empty($role)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirmpassword) {
        $error = "Passwords do not match.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL query
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password, user_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $email, $hashedPassword, $role);

        // Execute the query
        if ($stmt->execute()) {
            $success = "Registration successful. You can now log in.";
        } else {
            $error = "Registration failed. Please try again.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="accountstyles.css">
</head>
<body>
    <!-- Drawer Toggle Button -->
    <button class="drawer-toggle" onclick="toggleDrawer()">&#127849;</button>

    <!-- Drawer Navigation -->
    <div class="drawer" id="drawer">
        <div class="drawer-spacer"></div>
        <div class="drawer-header"></div>
        <nav>
            <a href="homescreen.php">Home</a>
            <a href="accountscreen.php">My Account</a>
            <a href="productscreen.php">Products</a>
            <a href="promotionscreen.php">Special Offers</a>
            <a href="aboutscreen.php">About</a>
            <a href="contactscreen.php">Contact Us</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="container">
        <header>
            <h1>Roti Sri Bakery</h1>
            <p>Your Partner in Baking Excellence</p>
        </header>

        <!-- Registration Section -->
        <section id="signup" class="section">
            <h2>Create Your Account</h2>
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php elseif (!empty($success)): ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="signup-name">Name:</label>
                    <input type="text" id="signup-name" name="name" class="input-field" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="signup-email">Email:</label>
                    <input type="email" id="signup-email" name="email" class="input-field" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="signup-password">Password:</label>
                    <input type="password" id="signup-password" name="password" class="input-field" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="signup-confirmpassword">Confirm Password:</label>
                    <input type="password" id="signup-confirmpassword" name="confirmpassword" class="input-field" placeholder="Confirm your password" required>
                </div>
                <div class="form-group">
                    <label for="signup-role">Sign Up As:</label>
                    <select id="signup-role" name="role" class="input-field" required>
                        <option value="" disabled selected>Choose your role</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Clerk">Clerk</option>
                    </select>
                </div>
                <button type="submit" class="button">Sign Up</button>
            </form>
            <div class="helper-links">
                <p>
                    Already have an account? <a href="accountscreen.php" class="link">Login here</a>
                </p>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Roti Sri Bakery System. Freshly Baked with Love.</p>
        <p>Follow us: 
            <a href="#">Facebook</a> | 
            <a href="#">Instagram</a> | 
            <a href="#">Twitter</a>
        </p>
        <p><a href="terms.html">Terms & Conditions</a> | <a href="privacy.html">Privacy Policy</a></p>
    </footer>

    <!-- JavaScript -->
    <script>
        function toggleDrawer() {
            const drawer = document.getElementById('drawer');
            drawer.classList.toggle('open');
        }
    </script>
</body>
</html>
