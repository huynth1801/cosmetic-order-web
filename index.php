<?php include("./partials-front/menu.php"); ?>

    <!-- Search section START-->
    <section class="search text-center">
      <div class="container">
        <div class="">
          <form action="">
            <!--search bar-->
            <input
              type="search"
              name="search"
              placeholder="Nhập sản phẩm cần tìm.."
            />
            <input
              type="submit"
              name="submit"
              value="Tìm kiếm"
              class="btn btn-primary"
            />
          </form>

          <br style="clear: both" />
        </div>
      </div>
    </section>
    <!-- Search section END-->

    <!-- Banner section START-->
    <section class="banner">
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

    <!-- Categories section START-->
    <section class="categories">
      <div class="container">
        <br />
        <h2 class="text-center">
          Khuyến mãi mùa giáng sinh
        </h2>

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
                <a href="#">
                  <div class="box-3 float-container">
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
                            class="img-responsive"
                          />
                      <?php 
                      }
                    ?>

                    <h4 class="text-center"><?php echo $title ?></h4>
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
        
        <br style="clear: both" />
      </div>
    </section>
    <!-- Categories section END-->

    <!-- Menu section START-->
    <section class="item-menu">
      <div class="container">
        <h2 class="text-center">Sản phẩm bán chạy</h2>
        <br />

        <div class="item-menu-box">
          <!--menu for item 1-->
          <div class="item-menu-img">
            <img
              src="images/item-1.png"
              alt="item1"
              class="img-responsive"
            />
          </div>

          <div class="item-menu-desc">
            <h4>so delux</h4>
            <p class="desc">lux lipstick set</p>

            <p class="price">$20.00</p>
            <br style="clear: both" />
            <br />
            <a href="#" class="btn btn-secondary"
              >Đặt ngay</a
            >
            <br />
            <br style="clear: both" />
          </div>
        </div>

        <div class="item-menu-box">
          <!--menu for item 2-->
          <div class="item-menu-img">
            <img
              src="images/item-2.png"
              alt="item2"
              class="img-responsive"
            />
          </div>

          <div class="item-menu-desc">
            <h4>hunny pot</h4>
            <p class="desc">lux lipstick set</p>

            <p class="price">$20.00</p>
            <br style="clear: both" />
            <br />
            <a href="#" class="btn btn-secondary"
              >Đặt ngay</a
            >
            <br />
            <br style="clear: both" />
          </div>
        </div>

        <div class="item-menu-box">
          <!--menu for item 3-->
          <div class="item-menu-img">
            <img
              src="images/item-3.png"
              alt="item2"
              class="img-responsive"
            />
          </div>

          <div class="item-menu-desc">
            <h4>hunny pot</h4>
            <p class="desc">lux lipstick set</p>

            <p class="price">$20.00</p>
            <br style="clear: both" />
            <br />
            <a href="#" class="btn btn-secondary"
              >Đặt ngay</a
            >
            <br />
            <br style="clear: both" />
          </div>
        </div>

        <div class="item-menu-box">
          <!--menu for item 4-->
          <div class="item-menu-img">
            <img
              src="images/item-4.png"
              alt="item2"
              class="img-responsive"
            />
          </div>

          <div class="item-menu-desc">
            <h4>hunny pot</h4>
            <p class="desc">lux lipstick set</p>

            <p class="price">$20.00</p>
            <br style="clear: both" />
            <br />
            <a href="#" class="btn btn-secondary"
              >Đặt ngay</a
            >
            <br />
            <br style="clear: both" />
          </div>
        </div>

        <div class="item-menu-box">
          <!--menu for item 5-->
          <div class="item-menu-img">
            <img
              src="images/item-5.png"
              alt="item2"
              class="img-responsive"
            />
          </div>

          <div class="item-menu-desc">
            <h4>hunny pot</h4>
            <p class="desc">lux lipstick set</p>

            <p class="price">$20.00</p>
            <br style="clear: both" />
            <br />
            <a href="#" class="btn btn-secondary"
              >Đặt ngay</a
            >
            <br />
            <br style="clear: both" />
          </div>
        </div>

        <div class="item-menu-box">
          <!--menu for item 6-->
          <div class="item-menu-img">
            <img
              src="images/item-6.png"
              alt="item2"
              class="img-responsive"
            />
          </div>

          <div class="item-menu-desc">
            <h4>hunny pot</h4>
            <p class="desc">lux lipstick set</p>

            <p class="price">$20.00</p>
            <br style="clear: both" />
            <br />
            <a href="#" class="btn btn-secondary"
              >Đặt ngay</a
            >
            <br />
            <br style="clear: both" />
          </div>
        </div>
        <br style="clear: both" />
      </div>
    </section>
    <!-- Menu section END-->

<?php include('./partials-front/footer.php'); ?>
