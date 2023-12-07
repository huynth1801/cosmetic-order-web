<?php include('./partials-front/menu.php'); ?>
    <!-- Navbar section END-->

    <!-- Navbar Section Ends Here -->
    <?php 
      if(isset($_GET['cosmetic_id'])) {
        $cosmetic_id = $_GET['cosmetic_id'];
        // Get the detail of selected product
        $sql = "SELECT * FROM tbl_cosmetic WHERE id=$cosmetic_id";
        // Execute the Query
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1) {
          // We have data
          $row = mysqli_fetch_assoc($res);
          $title = $row['title'];
          $price = $row['price'];
          $image_name = $row['image_name'];
        }
        else {
          header('location:'.SITEURL);
          exit();
        }
      }
      else {
        header('location:'.SITEURL);
        exit();
      }
    ?>

    <?php 
      if(isset($_POST['submit'])) {
        // Get all the details from forms
        $cosmetic = $_POST['cosmetic'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price * $qty;
        
        $order_date = date("Y-m-d h:i:sa");
        $status = "Ordered";
        $customer_name = $_POST['full-name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];

        // Save the order in database
        $sql2 = "INSERT INTO tbl_order (cosmetic, price, qty, total, 
        order_date, status, customer_name, customer_contact , customer_email, customer_address) VALUES 
                  ('$cosmetic',
                  $price,
                  $qty,
                  $total,
                  '$order_date',
                  '$status',
                  '$customer_name',
                  '$customer_contact',
                  '$customer_email',
                  '$customer_address')
        ";
        // echo $sql2;
        // Execute the query
        $res2 = mysqli_query($conn, $sql2);
        // Check whether query executed successfully or not
        if($res2 == true) {
          // Query executed and order save
          $_SESSION['order'] = "<div class='success text-success p-2 text-center '>Products ordered successfully !</div>";
          header('Location:'.SITEURL);
          exit();
        }
        else {
          echo "Lỗi: " . mysqli_error($conn);
          $_SESSION['order'] = "<div class='error text-danger p-2 text-center '>Failed to order product</div>";
          header('Location:'.SITEURL);
          exit();
        }
      }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="cosmetic p-3">
        <div class="container">

            <h2 class="text-center text-black pb-3">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="post">
                <fieldset class="item-ordered">
                    <h3>Selected Products</h3>

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
                              alt="Item1"
                              class="img-responsive rounded-3 img-fluid"
                            />
                        <?php 
                        }
                      ?>
                    </div>

                    <div class="item-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="cosmetic" value="<?php echo $title; ?>">
                        <p class="food-price">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="form-group">
                            <label for="qty" class="order-label">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control input-responsive" value="1" required min="0">
                        </div>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="form-group">
                        <label for="full-name" class="order-label">Full Name</label>
                        <input type="text" id="full-name" name="full-name" placeholder="Your full name" class="form-control input-responsive border border-dark border-1" required>
                    </div>

                    <div class="form-group">
                        <label for="contact" class="order-label">Phone Number</label>
                        <input type="tel" id="contact" name="contact" placeholder="E.g. 84123456" class="form-control input-responsive border border-dark border-1" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="order-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="E.g. abc@gmail.com" class="form-control input-responsive border border-dark border-1" required>
                    </div>

                    <div class="form-group">
                        <label for="address" class="order-label">Address</label>
                        <textarea id="address" name="address" rows="10" placeholder="E.g. Street, City, Country" class="form-control input-responsive border border-dark border-1" required></textarea>
                    </div>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary w-50 ">
                    <!-- <div class="d-flex justify-content-center pt-3">
                    </div> -->
                </fieldset>
            </form>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php include('./partials-front/footer.php'); ?>
