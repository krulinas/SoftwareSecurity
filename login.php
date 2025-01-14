<?php
session_start();
error_reporting(0);
include('dbconnect.php'); // Ensure database connection works

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    if (empty($email) || empty($password) || empty($role)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: accountscreen.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT user_id, user_name, user_password, user_type FROM users WHERE user_email = ? AND user_type = ?");
    if (!$stmt) {
        die("Database error: " . $conn->error);
    }
    $stmt->bind_param('ss', $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['user_role'] = $user['user_type'];

            if ($role === 'clerk') {
                header("Location: clerkscreen.php");
            } elseif ($role === 'Supervisor') {
                header("Location: supervisorscreen.php");
            } else {
                $_SESSION['error'] = "Role mismatch.";
                header("Location: accountscreen.php");
            }
            exit;
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "No user found with this email and role.";
    }

    header("Location: accountscreen.php");
    exit;
}
?>
