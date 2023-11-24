<html>
    <head>
        <title>Login - Cosmetic Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <!-- Login Form Starts Here -->
            <form action="" method="POST" class="text-center">
                Username:
                <input type="text" name="username" placeholder="Enter Username"><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br>

                <input type="submit" name="submit" value="Login" class="btn btn-primary">
                <br><br>
            </form>


            <p class="text-center">Created By - <a href="www.haha.com">Huu Huy</a></p>
        </div>
    </body>
</html>

<?php 
    // Check whether the submit button is clicked or not
    if(isset($_POST['submit'])) 
    {
        // Process for Login
        // 1. Get the Data from Login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 2. SQL to check whether the user with username and password exists
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    }
?>