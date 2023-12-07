<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- to make the web reponsive-->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />

    <title>Daily Cosmetic - Trang chủ</title>

    <!-- link css file-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />

  </head>
  <body>
    <!-- Navbar section START-->
      <!-- Navbar section START-->
    <section class="navbar navbar-expand-md">
      <div class="container-fluid d-flex">
        <div class="logo m-2">
          <a href="<?php echo SITEURL; ?>">
            <img
              src="images/logo.png"
              alt="logo"
              class="img-responsive"
            />
          </a>
        </div>

        <!-- <section id="overlay"></section> -->
        <div class="menu navbar-collapse justify-content-end" id="menu">
          <ul class="mobile-menu navbar__links navbar-nav">
            <li class="navbar_link p-4 ">
              <a href="<?php echo SITEURL; ?>">Home</a>
            </li>

            <li class="navbar_link p-4">
              <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
            </li>

            <li class="navbar_link p-4">
              <a href="<?php echo SITEURL; ?>items.php">Products</a>
            </li>

            <li class="navbar_link p-4">
              <a href="<?php echo SITEURL; ?>order.php">Order</a>
            </li>
            <li class="navbar_link p-4">
              <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag cart-icon" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                </svg>
              </a>
            </li>
          </ul>
      </div>
 
    </section>
      <!-- Hamburger menu -->
      <div class="hamburger-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    <!-- Navbar section END-->
    <script src="./js/main.js" type="text/javascript"></script>

