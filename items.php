<?php include('./partials-front/menu.php') ?>
    <!-- Navbar section END-->

    <!-- Search section START-->
    <section class="search text-center">
      <div class="container">
        <div class="container">
          <h2>Tất cả sản phẩm</h2>
        </div>
      </div>
    </section>
    <!-- Search section END-->

    <!-- Menu section START-->
    <section class="item-menu pt-3">
      <div class="container">
        <h2 class="text-center"></h2>
        <?php 
            // Create SQL qiuery to get foods based on selected category
            $sql = "SELECT * FROM tbl_cosmetic WHERE active='Yes' AND featured='Yes'";
            // Execute the Query 
            $res = mysqli_query($conn, $sql);
            // Count the rows
            $count = mysqli_num_rows($res);
            // Check whether cosmetic is available or not
            if($count > 0) {
              // Cosmetic is available
              while($row=mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $desc_cosmetic = $row['desc_cosmetic'];
                $image_name = $row['image_name'];
                ?>
                  <div class="item-menu-box mb-3">
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
                                class="img-responsive img-fluid "
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
    </section>
    <!-- Menu section END-->

    <!-- Socialmedia section START-->
<?php include('./partials-front/footer.php') ?>