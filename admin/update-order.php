<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Order</h1>
            <br><br>

            <?php 
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];

                    // Get all other details based on this id
                    // SQL query to get the order details
                    $sql = "SELECT * FROM tbl_order WHERE id=$id";
                    // Exceute query
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
                        // Detail not avaible
                    }
                }
                else {
                    header('location:'.SITEURL.'admin/manage-order.php');
                    exit();
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Product Name</td>
                        <td><?php echo $cosmetic ?></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><?php echo $price; ?></td>
                    </tr>

                    <tr>
                        <td>Qty</td>
                        <td>
                            <input type="number" name="qty" id="" value="<?php echo $qty; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" id="">
                                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered" class="text-warning">Ordered</option>
                                <option   value="On delivery" class="text-primary">On delivery</option>
                                <option <?php if($status=="Deliveried"){echo "selected";} ?>  value="Deliveried" class="text-success">Deliveried</option>
                                <option <?php if($status=="Canceld"){echo "selected";} ?> value="Canceled" class="text-danger">Canceled</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Name:</td>
                        <td>
                            <input type="text" name="customer_name" id="" value="<?php echo $customer_name ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Contact:</td>
                        <td>
                            <input type="text" name="customer_name" id="" value="<?php echo $customer_contact ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Email:</td>
                        <td>
                            <input type="text" name="customer_name" id="" value="<?php echo $customer_email ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Customer Address:</td>
                        <td>
                            <input type="text" name="customer_name" id="" value="<?php echo $customer_address ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <input type="submit" value="Update Order" name="submit" class=" btn-update">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>

<?php include('partials/footer.php') ?>