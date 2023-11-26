<?php
// if user session is not set
    if(!isset($_SESSION['user']))
    {
        // User is not logged in
        // Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel.</div>";
        // Redirect to Login Page
        header('location:'.SITEURL.'admin/login.php');
    }
?>