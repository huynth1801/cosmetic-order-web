<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br /> <br />

        <?php 
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
                  
        <table class="tbl-full">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <tbody class="table-group-divider table-divider-color ">
            <?php 
                $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // Display the latest order at first

                // Execute the query
                $res = mysqli_query($conn, $sql);
                // Count rows
                $count = mysqli_num_rows($res);

                $sn = 1;

                if($count > 0){
                    // We have cosmetics
                    // Get the cosmetic from database and display
                    while($row=mysqli_fetch_assoc($res)) {
                        // get the values from invidual columns
                        $id = $row['id'];
                        $title = $row['cosmetic'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td>
                                    <?php 
                                        // Ordered, On Delivery
                                        // Ordered, On Delivery
                                        if ($status == "Ordered") {
                                            echo "<label>$status</label>";
                                        } elseif ($status == "On Delivery") {
                                            echo "<label style='color: orange;'>$status</label>";
                                        } elseif ($status == "Deliveried") {
                                            echo "<label style='color: green'>$status</label>";
                                        } elseif ($status == "Canceled") {
                                            echo "<label style='color: red'>$status</label>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-update">Update Order</a>
                                </td>
                            </tr>
                        <?php
                    }

                }
                else {
                    echo "<tr><td colspan='7' class='error'>Cosmetic not Added Yet.</td></tr>";
                }

            ?>
            </tbody>
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>