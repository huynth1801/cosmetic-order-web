<?php 
    include('../config/constants.php'); 
?>
<?php
    // Process the value from Form and Save it in the database
    // Check whether the submit button is clicked or not 
        if (isset($_POST['submit'])) 
        {
            // Button Clicked
            // echo "Button Clicked";
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            // SQL Query to Save the data into database
            $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
            ";

            // 3. Executing Query and Saving Data into Database
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            // 4. Check whether the Query is Executed data is inserted or not and display appopriate message
            if ($res==true) {
                // Data inserted
                // Redirect Page to Manage Admin
                header("Location:".SITEURL.'admin/login.php');
                exit();
            } else {
                // Failed to insert data
                // Redirect Page to Add Admin
                header("Location:".SITEURL.'admin/register.php');
                exit();
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
</head>
<body>
    <!-- Section: Design Block -->
    <form action="" method="post" class="vh-100">
        <section class="background-radial-gradient overflow-hidden min-vh-100 ">
          <style>
            .background-radial-gradient {
              background-color: hsl(218, 41%, 15%);
              background-image: radial-gradient(650px circle at 0% 0%,
                  hsl(218, 41%, 35%) 15%,
                  hsl(218, 41%, 30%) 35%,
                  hsl(218, 41%, 20%) 75%,
                  hsl(218, 41%, 19%) 80%,
                  transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                  hsl(218, 41%, 45%) 15%,
                  hsl(218, 41%, 30%) 35%,
                  hsl(218, 41%, 20%) 75%,
                  hsl(218, 41%, 19%) 80%,
                  transparent 100%);
            }
        
            #radius-shape-1 {
              height: 220px;
              width: 220px;
              top: -60px;
              left: -130px;
              background: radial-gradient(#44006b, #ad1fff);
              overflow: hidden;
            }
        
            #radius-shape-2 {
              border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
              bottom: -60px;
              right: -110px;
              width: 300px;
              height: 300px;
              background: radial-gradient(#44006b, #ad1fff);
              overflow: hidden;
            }
        
            .bg-glass {
              background-color: hsla(0, 0%, 100%, 0.9) !important;
              backdrop-filter: saturate(200%) blur(25px);
            }
          </style>
        
          <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
              <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                  The best offer <br />
                  <span style="color: hsl(218, 81%, 75%)">for your business</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                Chào mừng bạn đến với trang web Mỹ phẩm của chúng tôi! Nếu bạn muốn trở thành một Admin để quản lý và kiểm soát các chức năng quan trọng của trang web, đăng ký Admin là bước quan trọng.
                </p>
              </div>
        
              <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        
                <div class="card bg-glass">
                  <div class="card-body px-4 py-5 px-md-5">
                    <form>
                      <!-- 2 column grid layout with text inputs for the first and last names -->
                      <div class="row">
                        <div class="col-md-12 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1">Full name</label>
                            <input type="text" id="form3Example1" name="full_name" class="form-control" />
                          </div>
                        </div>
                      </div>
        
                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3">Username</label>
                        <input type="text" id="form3Example3" name="username" class="form-control" />
                      </div>
        
                      <!-- Password input -->
                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4">Password</label>
                        <input type="password" id="form3Example4" name="password" class="form-control" />
                      </div>
        
                      <!-- Checkbox -->
                      <!-- <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                        <label class="form-check-label" for="form2Example33">
                          Subscribe to our newsletter
                        </label>
                      </div> -->
        
                      <!-- Submit button -->
                      <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 w-100" value="Sign up" />
        
                      <!-- Register buttons -->
                      <!-- <div class="text-center">
                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-facebook-f"></i>
                        </button>
        
                        <button type="button" class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-google"></i>
                        </button>
        
                        <button type="button" class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-twitter"></i>
                        </button>
        
                        <button type="button" class="btn btn-link btn-floating mx-1">
                          <i class="fab fa-github"></i>
                        </button>
                      </div> -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </form>
    <!-- Section: Design Block -->
    
</body>
</html>
    