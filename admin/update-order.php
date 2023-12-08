<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="container">
        <h1>Update Order</h1>
        <br><br>

        <?php 
            if(isset($_GET['id'])) {
                $id = $_GET['id'];

                // Get all other details based on this id
                // SQL query to get the order details
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                // Execute query
                $res = mysqli_query($conn, $sql);
                // Count rows
                $count = mysqli_num_rows($res);

                if($count == 1){
                    // Detail update
                    $row = mysqli_fetch_assoc($res);

                    $cosmetic = $row['cosmetic'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                }
                else {
                    // Detail not available
                }
            }
            else {
                header('location:'.SITEURL.'admin/manage-order.php');
                exit();
            }
        ?>

        <?php 
            // Check whether update button is clicked or not
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                // Update the values
                $sql2 = "UPDATE tbl_order SET
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id = $id
                ";
                // Execute the query
                $res2 = mysqli_query($conn, $sql2);
                // Check whether update or not
                if($res2) {
                    // Updated
                    $_SESSION['update'] = "<div class='alert alert-success'>Order updated successfully</div>";
                    header('Location:'.SITEURL.'admin/manage-order.php');
                    exit();
                }
                else {
                    $_SESSION['update'] = "<div class='alert alert-danger'>Failed to update order!</div>";
                    header('Location:'.SITEURL.'admin/manage-order.php');
                    exit();
                }
            }
        ?>

        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cosmetic">Product Name:</label>
                        <input type="text" class="form-control" id="cosmetic" value="<?php echo $cosmetic ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" value="<?php echo $price; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="qty">Qty:</label>
                        <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $qty; ?>">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Ordered" <?php if($status=="Ordered"){echo "selected";} ?>>Ordered</option>
                            <option value="On Delivery" <?php if($status=="On Delivery"){echo "selected";} ?>>On Delivery</option>
                            <option value="Deliveried" <?php if($status=="Deliveried"){echo "selected";} ?>>Deliveried</option>
                            <option value="Canceled" <?php if($status=="Canceled"){echo "selected";} ?>>Canceled</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $customer_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="customer_contact">Customer Contact:</label>
                        <input type="text" class="form-control" id="customer_contact" name="customer_contact" value="<?php echo $customer_contact ?>">
                    </div>

                    <div class="form-group">
                        <label for="customer_email">Customer Email:</label>
                        <input type="text" class="form-control" id="customer_email" name="customer_email" value="<?php echo $customer_email ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="customer_address">Customer Address:</label>
                        <input type="text" class="form-control" id="customer_address" name="customer_address" value="<?php echo $customer_address ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="price" value="<?php echo $price ?>">

            <div class="form-group">
                <input type="submit" value="Update Order" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>