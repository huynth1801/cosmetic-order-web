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

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['unauthorized']))
                {
                    echo $_SESSION['unauthorized'];
                    unset($_SESSION['unauthorized']);
                }

                if(isset($_SESSION['no-product-found']))
                {
                    echo $_SESSION['no-product-found'];
                    unset($_SESSION['no-product-found']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <a href="<?php echo SITEURL; ?>admin/add-cosmetic.php" class="btn btn-primary">Add Product</a>
            <br><br>
            <table class="tbl-full">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <tbody class="table-group-divider table-divider-color ">
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
                                        <a href="<?php echo SITEURL;?>admin/update-cosmetic.php?id=<?php echo $id; ?>" class="btn-update">Update Product</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-cosmetic.php?id=<?php echo $id; ?>&image_name=<?php echo basename($image_name); ?>"  class="btn btn-danger">Delete Product</a>
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