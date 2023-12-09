<?php include('./partials-front/menu.php') ?>
    <!-- Navbar section END-->

    <!-- Search section START-->
    <section class="search text-center">
      <div class="container">
        <div class="container">
          <?php 
            // $search = $_POST['search'];
            $search = mysqli_real_escape_string($conn, ($_POST['search']));

          ?>
          <h2>Sản phẩm tìm kiếm <a href="#" class="text-decoration-none text-black-50 font-weight-bold">"<?php echo $search; ?>"</a></h2>
        </div>
      </div>
    </section>
    <!-- Search section END-->

    <!-- Menu section START-->
    <section class="item-menu">
      <div class="container">
        <h2 class="text-center"></h2>

        <?php 
          // Get the search keyword
          $search = $_POST['search'];

          // SQl Query to get foods based on keyword
          $sql = "SELECT * FROM tbl_cosmetic WHERE title LIKE '%$search%' OR desc_cosmetic LIKE '%$search%'";

          // Execute the query
          $res = mysqli_query($conn, $sql);

          // Count Row
          $count = mysqli_num_rows($res);

          if ($count > 0) {
            // Cosmetic available
            while($row=mysqli_fetch_assoc($res))
            {
              // get the details
              $id = $row['id'];
              $title  = $row['title'];
              $price = $row['price'];
              $desc_cosmetic = $row['desc_cosmetic'];
              $image_name = $row['image_name'];
              ?>
                <div class="item-menu-box p-4">
                  <!--menu for item 4-->
                  <div class="item-menu-img">
                    <?php 
                        // Check whether image is available or not
                        if($image_name=="") {
                          echo "<div class='error'>Image not Available</div>";
                        }
                        else {
                          ?>
                            <img
                              src="<?php echo $image_name ?>"
                              alt="Item <?php echo $id ?>"
                              class="img-responsive"
                            />
                          <?php 
                        }
                      ?>
                  </div>

                  <div class="item-menu-desc">
                    <div class="d-flex justify-content-between align-items-center items-info">
                      <h4><?php echo $title ?></h4>
                      <h4 class="price">$<?php echo $price ?></h4>
                    </div>
                    <div>
                        <a href="<?php echo SITEURL ?>cart.php?cosmetic_id=<?php echo $id; ?>" class="add-to-cart" data-cosmetic-id="<?php echo $id; ?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                          </svg>
                        </a>
                    </div>
                    <div class="button__order">
                      <a href="<?php echo SITEURL ?>order.php?cosmetic_id=<?php echo $id; ?>" class="btn btn-order">Đặt ngay</a>
                    </div>
                  </div>
                </div>
              <?php
            }
          }
          else {
            // Cosmetic not available
            echo "<div class='error'>Cosmetic not found</div>";
          }
        ?>
        <br style="clear: both" />
      </div>
    </section>
    <!-- Menu section END-->

    <!-- Socialmedia section START-->
<?php include('./partials-front/footer.php') ?>
