<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>

            <br><br>

            <?php
                // Check whether the id is set or not
                if(isset($_GET['id']))
                {
                    // GEt the ID and all other details
                    // echo "Getting the data";
                    $id = $_GET['id'];
                    // Create SQL Query to get all other details
                    $sql = "SELECT * FROM tbl_category WHERE id=$id";

                    // Execute the Query
                    $res = mysqli_query($conn, $sql);

                    // Count the Rows to check whether the id is valid or not
                    $count = mysqli_num_rows($res);

                    if($count == 1)
                    {
                        // Get all the data
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else
                    {
                        // Redirect to manage category with session message
                        $_SESSION['no-category-found'] = "<div class-'error'>Category not Found.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }

                }
                else
                {
                    // Redirect to Manage Category
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            ?>


            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-full">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="title" name="title" value="<?php echo $title; ?>">
                        </td>
                    </tr>
    
                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php 
                                if($current_image != "")
                                {
                                    // Display the Image
                                    ?>
                                        <img src="<?php echo $current_image ?>" alt="" width="150px">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class='error'>Image not Added.</div>";
                                }
                            ?>
                        </td>
                    </tr>
    
                    <tr>
                        <td>New Image's URL: </td>
                        <td>
                            <input type="text" name="image" placeholder="Image URL">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" id="" value="Yes"> Yes
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" id="" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" id="" value="Yes"> Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" id="" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" value="Update Category" name="submit" class="btn btn-primary ">
                        </td>
                    </tr>

                </table>

            </form>

            <?php
                if(isset($_POST['submit']))
                {
                    // echo "Clicked";
                    // 1. Get all the values from our form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    // 2. Update new image if selected
                    // Check whether the image is selected or not
                     // Check if a new image URL is provided
                    if(isset($_POST['image']) && !empty($_POST['image']))
                    {
                        // Get the new image URL
                        $new_image = $_POST['image'];

                        // Update the image URL in the database
                        $sql_1 = "UPDATE tbl_category SET image_name='$new_image' WHERE id=$id";
                        $res = mysqli_query($conn, $sql_1);
                    }
                    else
                    {
                        $image_name = $current_image;
                    }

                    // 3. Update the database
                    $sql2 = "UPDATE tbl_category SET
                        title='$title',
                        featured='$featured',
                        active='$active'
                        WHERE id=$id
                    ";

                    // Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    // 4. Redirect to Manage category with message
                    // Check whether executed or not
                    if($res2)
                    {
                        // Category Updated
                        $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                    else
                    {
                        // Failed to update category
                        $_SESSION['update'] = "<div class='error'>Failed to update category!</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                }
            ?>

        </div>
    </div>


<?php include('partials/footer.php') ?>
