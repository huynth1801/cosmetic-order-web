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
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- Navbar section START-->
    <section class="navbar">
      <div class="container bd">
        <div class="logo">
          <a href="<?php echo SITEURL; ?>">
            <img
              src="images/logo.png"
              alt="logo"
              class="img-responsive"
            />
          </a>
        </div>

        <section id="overlay"></section>
        <div class="menu text-right" id="menu">
          <ul class="mobile-menu navbar__links">
            <li class="navbar_link">
              <a href="<?php echo SITEURL; ?>">Trang chủ</a>
            </li>

            <li class="navbar_link">
              <a href="<?php echo SITEURL; ?>categories.php">Khuyến mãi</a>
            </li>

            <li class="navbar_link">
              <a href="<?php echo SITEURL; ?>items.php">Sản phẩm</a>
            </li>

            <li class="navbar_link">
              <a href="<?php echo SITEURL; ?>order.php">Order</a>
            </li>
          </ul>
        </div>

        <!-- Hamburger menu -->
        <div class="hamburger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>

    </section>
    <!-- Navbar section END-->
    <script src="./js/main.js" type="text/javascript"></script>
