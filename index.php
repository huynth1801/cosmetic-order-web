<?php include("./partials-front/menu.php"); ?>

    <!-- Search section START-->
    <section class="search text-center pt-4">
    <?php 
      if(isset($_SESSION['confirm-order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
      }
    ?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="">
            <form action="<?php echo SITEURL; ?>items-search.php" method="POST">
              <div class="input-group mb-3 col-lg-12 col-md-9 me-4">
                <input
                  type="search"
                  name="search"
                  placeholder="Nhập sản phẩm cần tìm.."
                  class="form-control"
                />
                <button
                  type="submit"
                  name="submit"
                  class="btn btn-primary col-lg-3 col-md-3"
                >
                  Tìm kiếm
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Search section END-->

    <!-- Banner section START-->
    <section class="banner">
      <div class="container">
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

    <!-- Categories section START-->
    <section class="categories">
      <div class="container">
        <br />
        <h2 class="text-center pb-3 ">
          Khuyến mãi mùa giáng sinh
        </h2>
        <div class="row row-cols-lg-4 row-cols-1">
          <?php 
            // Create SQL Query to display categories from db
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
            // Execute the query
            $res = mysqli_query($conn, $sql);
            // Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if($count > 0)
            {
              // Categories available
              while($row = mysqli_fetch_assoc($res))
              {
                // Get the values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                  <a href="<?php echo SITEURL ?>category-items.php?category_id=<?php echo $id; ?>" class="text-decoration-none d-flex justify-content-center ">
                    <div class="col-7 col-md-8 col-lg-10">
                      <!--box for item 1-->
                      <?php 
                        // Check whether image is available or not
                        if($image_name=="") {
                          echo "<div class='error'>Image not Available</div>";
                        }
                        else {
                          ?>
                            <img
                              src="<?php echo $image_name ?>"
                              alt="Item1"
                              class="img-responsive rounded-3 "
                            />
                        <?php 
                        }
                      ?>

                      <h3 class="text-center text-decoration-none pt-4"><?php echo $title ?></h3>
                    </div>
                  </a>
                <?php
              }
            }
            else
            {
              // Categories is not available
              echo "<div class='error'>Category not Added</div>";
            }
          ?>
        </div>
        
        <br style="clear: both" />
      </div>
    </section>
    <!-- Categories section END-->

    <!-- Menu section START-->
    <section class="item-menu ">
      <div class="container">
        <h2 class="text-center">Sản phẩm bán chạy</h2>
        
        <?php 
          $sql1 = "SELECT * FROM tbl_cosmetic WHERE active='Yes' AND featured='Yes' LIMIT 6";

          $res1 = mysqli_query($conn, $sql1);

          $count1 = mysqli_num_rows($res1);
          if($count1 > 0) {
            while($row1=mysqli_fetch_assoc($res1))
            {
              $id = $row1['id'];
              $title = $row1['title'];
              $price = $row1['price'];
              $image_name = $row1['image_name'];
              ?>
                 <div class="item-menu-box">
                    <!--menu for item 1-->
                    <div class="item-menu-img">
                      <img
                        src="<?php echo $image_name ?>"
                        alt="item1"
                        class="img-responsive img-fluid rounded-3"
                      />
                    </div>

                    <div class="item-menu-desc">
                      <div class="d-flex justify-content-between align-items-center items-info">
                        <h4><?php echo $title ?></h4>
                        <h4 class="price ">$ <?php echo $price ?></h4>
                      </div>
                      <div>
                        <a href="<?php echo SITEURL ?>cart.php?cosmetic_id=<?php echo $id; ?>" class="add-to-cart" data-cosmetic-id="<?php echo $id; ?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
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
        ?>
        
        </div>
        <br style="clear: both" />
      </div>
    </section>
    <!-- Menu section END-->

<?php include('./partials-front/footer.php'); ?>
