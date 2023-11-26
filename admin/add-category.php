<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>

        <!-- Add Category From Start -->
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <!-- <label for="url">Image URL:</label> -->
                        <input type="file" name="image" required>
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
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add category" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add Category Form End -->
        <?php 
            // Check whether the Submit button is Clicked or Not
            if(isset($_POST['submit']))
            {
                // echo "Clicked";
                // 1. Get the Value from Category Form
                $title = $_POST['title'];

                // For Radio Input, we need to check whether the button is selected or not
                if(isset($_POST['featured']))
                {
                    // Get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    // Set the default value
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
                // Check whether the image is selected or not and set the value for image 
                // print_r($_FILES['image']);

                // die(); // Break the code here
                if(isset($_FILES['image']['name']))
                {
                    // Upload the Image
                    // To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    // Auto rename our image
                    // Get the extension of our image 
                    $ext = explode('.', $image_name);

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/".$image_name;

                    // Finally Upload the Image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    // Check whether the image is uploaded or not
                    // And if the image is not uploaded then we will stop the process and redirect withe error message
                    if(!$upload)
                    {                
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        // Redirect to Add Category
                        header('location:'.SITEURL.'admin/add-category.php');
                        // Stop the process
                        exit();
                    }
                }
                else
                {
                    // Don't Upload Image and set the image_name value as blank
                    $image_name = "";
                }


                // 2. Create SQL Query to Insert Category into Database
                $sql = "INSERT INTO tbl_category SET
                        title='$title',
                        featured='$featured',
                        active='$active'
                ";

                // 3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                // 4. Cheeck whether the query executed or not data added or not
                if($res == true)
                {
                    // Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    // Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //. Failed to Add category
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                    // Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>