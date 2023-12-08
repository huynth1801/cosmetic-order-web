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
