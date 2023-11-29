<?php include('partials/menu.php') ?>

<?php 
            // Check whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                // Add the category to the database
                // echo "Clicked";
                // 1. Get the Data from Form
                $title = $_POST['title'];
                $description = $_POST['description'];
                // 2. Upload the Image if add
                $image_name = $_POST['image'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //  Check whether radio button for featured and active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; 
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; 
                }

                // 3. Insert into database
                // For numerical we do not need to pass the value inside quotes '' 
                $sql2 = "INSERT INTO tbl_cosmetic (title, description, image_name, category_id, featured, active) 
                VALUES ('$title', '$description', '$image_name', '$category', '$featured', '$active')";

                // Execute the query
                $res2 = mysqli_query($conn, $sql2);
                // Check whether data is inserted or not
                if($res2==true)
                {
                    // Data inserted successfully
                    $_SESSION['add'] = "<div class='success'>Product Added Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-cosmetic.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to add product.</div>";
                    header('location:'.SITEURL.'admin/manage-cosmetic.php');
                }
                

                // 4. Redirect with message to manage cosmetic page
            }
        ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Cosmetic</h1>
        <br><br>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="10" placeholder="Description of the cosmetic"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" placeholder="" min="0">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="text" name="image" id="">
                    </td>
                </tr>

                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" id="">
                            <?php 
                                // Create PHP code to display categories from Database
                                // 1. Create SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='YES'";
                                // Executing the Query
                                $res = mysqli_query($conn, $sql) ;
                                // Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                // If count is greater than zero, we have categories else we do not have categories
                                if($count > 0)
                                {
                                    // We have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        // get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    // We do not have category
                                    ?>
                                        <option value="0">No category found.</option>
                                    <?php
                                }

                                // 2. Display on Dropdown 
                                
                            ?>
                            <!-- <option value="1">Cosmetic</option>
                            <option value="2">Kem nền</option> -->
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Cosmetic" name="submit" class="btn btn-primary" >
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php') ?>