<?php 
    include('partials/menu.php');
?>

<?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $image_url = $_POST['image_url'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // Tạo câu truy vấn để chèn dữ liệu vào cơ sở dữ liệu
        $sql = "INSERT INTO tbl_category (title, image_name, featured, active) VALUES ('$title', '$image_url', '$featured', '$active')";
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
            $_SESSION['add'] = "<div class='error'>Failed to add category</div>";
            // Redirect to Manage Category Page
            header('location:'.SITEURL.'admin/add-category.php');
        }
    }

    // mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h1>Add Category</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Category Title" required>
                </td>
            </tr>

            <tr>
                <td>Select Image:</td>
                <td>
                    <input type="text" name="image_url" placeholder="Image URL" required>
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
</body>
</html>

<?php include('partials/footer.php');?>