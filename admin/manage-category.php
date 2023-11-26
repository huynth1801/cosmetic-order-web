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
        ?>

        <br><br>
                <!-- Button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary">Add Category</a>

        <br /><br /><br />
        
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
                        $id = $row['id'];
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
                                    <a href="#" class="btn btn-secondary">Update Category</a>
                                    <a href="#" class="btn btn-danger">Delete Category</a>
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