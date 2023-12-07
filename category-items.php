<?php include('./partials-front/menu.php') ?>

  <?php 
    // Check whether id is passed or not
    if(isset($_GET['category_id'])) {
      // Category id is set and get the id
      $category_id = $_GET['category_id'];
      // Get the category title based on category id
      $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

      // Execute the query
      $res = mysqli_query($conn, $sql);
      // Get the value from database
      $row = mysqli_fetch_assoc($res);
      // Get the title 
      $category_title = $row['title'];

    }
    else {
      // Category not passed
      // Redirect to home page
      header('location:'.SITEURL);
    }
  ?>
    <!-- Navbar section END-->

    <!-- Search section START-->
    <section class="search text-center">
      <div class="container">
        <div class="container">
          <h2>Category on <a href="" class="text-decoration-none text-black-50 font-weight-bold">"<?php echo $category_title; ?>"</a></h2>
        </div>
      </div>
    </section>
    <!-- Search section END-->

    <!-- Banner section START-->
    <section class="banner pt-4">
      <div class="container bd">
        <a href="#">
          <img
            src="images/sale-banner.png"
            alt="sale-banner"
            class="img-responsive"
          />
        </a>
      </div>
    </section>
    <!-- Banner section END-->

    <!-- Menu section START-->
    <section class="item-menu pt-2">
      <div class="container">
        <h2 class="text-center">Cosmetic Lists</h2>
        <div class="row">
          <?php 
            // Create SQL qiuery to get foods based on selected category
            $sql2 = "SELECT * FROM tbl_cosmetic WHERE category_id=$category_id";
            // Execute the Query 
            $res2 = mysqli_query($conn, $sql2);
            // Count the rows
            $count2 = mysqli_num_rows($res2);
            // Check whether cosmetic is available or not
            if($count2 > 0) {
              // Cosmetic is available
              while($row2=mysqli_fetch_assoc($res2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $desc_cosmetic = $row2['desc_cosmetic'];
                $image_name = $row2['image_name'];
                ?>
                  <div class="item-menu-box">
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
                        <!-- <p class="desc">lux lipstick set</p> -->
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
              echo "<div class-'error'>Cosmetic not Available</div>";
            }
          ?>

        </div>
      </div>
    </section>
    <!-- Menu section END-->

    <!-- Socialmedia section START-->
<?php include('./partials-front/footer.php') ?>