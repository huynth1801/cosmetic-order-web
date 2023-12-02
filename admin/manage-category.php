<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /> <br />

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

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <!-- Button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary">Add Category</a>
        <br><br>
        <table class="tbl-full">
            

            <?php 
                // Query tp get all Categories from Database
                $sql = "SELECT * FROM tbl_category";

                // Execute Query
                $res = mysqli_query($conn, $sql);

                // Count rows
                $rows = mysqli_num_rows($res);

                // Create Serial Number variable and assgin value 1
                $sn = 1;

                // Check whether we have data in database or not
                if($rows>0){
                   // Get the data and display
                   while($rows=mysqli_fetch_assoc($res))
                   {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                        ?>
                            <tr>
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Featured</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td>
                                    <img src="<?php echo $image_name; ?>" alt="" width="100px">
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td class="">
                                    <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Category</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo basename($image_name); ?>" class="btn btn-danger">Delete Category</a>
                                </td>
                            </tr>
                        <?php 
                        
                   }
                }
                else {
                    // We do not have data
                    // We will display the message inside table
                    ?>
                        <tr>
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>
                    <?php
                }
            ?>

        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>