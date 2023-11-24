<?php
    session_start();


    // Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/cosmetic-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'cosmetics-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); // Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); // Selecting Database

    
?>