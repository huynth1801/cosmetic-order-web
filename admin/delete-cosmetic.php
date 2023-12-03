<?php
// Include constants file
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    // Get the value and delete
    echo $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Remove the physical image file if available
    if($image_name != "")
    {
        // Image is available. So remove it!
        $path = "../images/category/".$image_name;
        if(file_exists($path))
        {
            // Remove the image file
            $remove = unlink($path);
            if($remove == false)
            {
                // Failed to remove image file
                $_SESSION['remove'] = "<div class='error'>Failed to remove category image.</div>";
                header('location:'.SITEURL.'admin/manage-cosmetic.php');
                exit();
            }
        }
    }

    // Delete Data From Database
    $sql = "DELETE FROM tbl_cosmetic WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    
    if($res == true)
    {
        // Category deleted successfully
        $_SESSION['delete'] = "<div id='popup' class='alert alert-success alert-dismissible fade show' role='alert'>
                        Product was deleted Successfully
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                        // Thêm đoạn mã JavaScript vào sau thông báo
                        $_SESSION['delete'] .= "
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
        header('location:'.SITEURL.'admin/manage-cosmetic.php');
    }
    else
    {
        // Failed to delete category
        $_SESSION['delete'] = "<div id='popup' class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Failed to Delete Category
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";

                        // Thêm đoạn mã JavaScript vào sau thông báo
                        $_SESSION['delete'] .= "
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
        header('location:'.SITEURL.'admin/manage-cosmetic.php');
    }
}
else
{
    // Redirect to Manage Category Page
    $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-cosmetic.php');
}
?>