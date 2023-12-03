<?php
include('../config/constants.php');

if(isset($_SESSION['login']))
{
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}


// Check whether the submit button is clicked or not
if(isset($_POST['submit'])) 
{
    // Process for Login
    // 1. Get the Data from Login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 2. SQL to check whether the user with username and password exists
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // 3. Execute the Query
    $res = mysqli_query($conn, $sql);

    // 4. Count rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if($count == 1) 
    {
        // User Available and Login Success
        $_SESSION['login'] = "<div class='toast bg-success align-items-center' role='alert' aria-live='assertive' aria-atomic='true'>
            <div class='d-flex'>
            <div class='toast-body text-light '>
                Login successfully
            </div>
            <button type='button' class='btn-close me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
        </div>";
        $_SESSION['login'] .= "<script>
                    // Khởi tạo toast
                    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                    var toastList = toastElList.map(function (toastEl) {
                        return new bootstrap.Toast(toastEl);
                    });

                    // Hiển thị toast
                    toastList.forEach(function (toast) {
                        toast.show();
                    });
                </script>";
        $_SESSION['user'] = $username; // To check whether user is logged in or not and log out will unset it
        // Redirect to Home page / Dashboard
        header('location:'.SITEURL.'admin/');
        exit(); // Terminate the script after redirection
    }
    else
    {
        // User not Available and Login Fail
        // User not Available and Login Fail
        // $_SESSION['login'] = "<div class='toast bg-danger align-items-center' role='alert' aria-live='assertive' aria-atomic='true'>
        //     <div class='d-flex'>
        //     <div class='toast-body text-light '>
        //         User and password not match
        //     </div>
        //          <button type='button' class='btn-close me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
        //     </div>
        // </div>";
        // $_SESSION['login'] .= "<script>
        //     document.addEventListener('DOMContentLoaded', function() {
        //         // Khởi tạo toast
        //         var toastElement = document.querySelector('.toast');
        //         var toast = new bootstrap.Toast(toastElement);
        //         toast.show();
        //     });
        // </script>";

        $_SESSION['login'] = "<div id='popup' class='alert alert-danger alert-dismissible fade show' role='alert'>
            User and password did not match
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

        // Thêm đoạn mã JavaScript vào sau thông báo
        $_SESSION['login'] .= "
        <script>
        // Lấy tham chiếu đến phần tử popup
        const popup = document.getElementById('popup');

        // Tự động đóng popup sau 3 giây
        setTimeout(function() {
        popup.classList.remove('show');
        popup.classList.add('fade');
        }, 3000);

        // Kiểm tra xem popup có tồn tại hay không
        // Tự động đóng popup sau 3 giây
        setTimeout(function() {
            if (popup) {
                popup.remove();
            }
        }, 3000);
        </script>
        ";
        // Redirect
        header('location:'.SITEURL.'admin/login.php');
        exit(); // Terminate the script afte
    }   
}
?>

<html>
<head>
    <title>Login - Cosmetic Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Thêm tệp JavaScript của Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
    </style>
</head>
<body>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }

        ?>
        <form action="" method="POST">
            <section class="gradient-custom login">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">

                                    <div class="mb-md-5 mt-md-4 pb-5">

                                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                        <div class="form-outline form-white mb-4">
                                            <input type="text" name="username" id="typeEmailX" class="form-control form-control-lg" placeholder="Enter your username" />
                                            <!-- <label class="form-label" for="typeEmailX">Username</label> -->
                                        </div>

                                        <div class="form-outline form-white mb-4">
                                            <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Enter your password" />
                                            <!-- <label class="form-label" for="typePasswordX">Password</label> -->
                                        </div>

                                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                        <input class="btn btn-outline-light btn-lg px-5" type="submit" name="submit" value="Login" />

                                        <!-- <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                            <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                            <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                            <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                        </div> -->

                                    </div>

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    <!-- Login Form Ends Here -->
</body>
</html>