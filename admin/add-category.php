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
            $_SESSION['add'] = "<div id='popup' class='alert alert-success alert-dismissible fade show' role='alert'>
            Category Added Successfully
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            // Thêm đoạn mã JavaScript vào sau thông báo
            $_SESSION['add'] .= "
            <script>
                // Lấy tham chiếu đến phần tử popup
                const popup = document.getElementById('popup');

                // Tự động đóng popup sau 3 giây
                setTimeout(function() {
                    popup.classList.remove('show');
                    popup.classList.add('fade');
                }, 3000);
            </script>
            ";
            // Redirect to Manage Category Page
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //. Failed to Add category
            $_SESSION['add'] = "<div id='popup' class='alert alert-danger alert-dismissible fade show' role='alert'>
            Failed to add category.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            // Thêm đoạn mã JavaScript vào sau thông báo
            $_SESSION['add'] .= "
            <script>
                // Lấy tham chiếu đến phần tử popup
                const popup = document.getElementById('popup');

                // Tự động đóng popup sau 3 giây
                setTimeout(function() {
                    popup.classList.remove('show');
                    popup.classList.add('fade');
                }, 3000);
            </script>
            ";
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
    <div class="container">

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
    </div>
</body>
</html>

<?php include('partials/footer.php');?>