<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Cosmetic</h1>
        <br /> <br />
            <!-- Button to add product -->
            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
            <br><br>
            <a href="<?php echo SITEURL; ?>admin/add-cosmetic.php" class="btn btn-primary">Add Product</a>
            <br><br><br>
            
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM tbl_cosmetic";

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
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td>
                                        <?php 
                                            if($image_name==""){
                                                echo "<div class='error'>Image is not Added</div>";
                                            }
                                            else {
                                                ?>
                                                    <img src="<?php echo $image_name ?>" alt="" srcset="" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-secondary">Update Admin</a>
                                        <a href="#" class="btn btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                            <?php
                        }

                    }
                    else {
                        echo "<tr><td colspan='7' class='error'>Cosmetic not Added Yet.</td></tr>";
                    }

                ?>

            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>