<?php include('./partials-front/menu.php'); ?>
    <!-- Navbar section END-->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
      <div class="container">
        <h2 class="text-center pb-4">Explore Categories</h2>
        <div class="row row-cols-lg-4 row-cols-1 row-cols-md-2 ">
          <?php 
            // Display all the categories are active
            //  SQL query
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
            // Execute the Query
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            if($count > 0) {
              while($row=mysqli_fetch_assoc($res))
              {
                // Get the values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                  <a href="category-items.php" class="text-decoration-none d-flex justify-content-center">
                    <div class="col-7 col-md-8 col-lg-10 m-4">
                      <!--box for item 2-->
                      <?php  
                        if($image_name==""){
                          echo "<div class='error'>Image not Found</div>";
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
                      <h4 class="text-center mt-3"><?php echo $title ?></h4>
                    </div>
                  </a>
                <?php
              }
            }
            else {
              echo "<div class='error'>Category not found</div>";
            }
          ?>
        </div>

        <br style="clear: both" />
      </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Socialmedia section START-->
<?php include('./partials-front/footer.php') ?>
