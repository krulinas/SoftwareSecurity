<?php
session_start();
if (!isset($_SESSION['login_id'])) {
    header('Location: http://localhost:8080/salesmanagement/customerscreen.php');
    exit();
}
?>
<h1>Welcome to Sales Management</h1>