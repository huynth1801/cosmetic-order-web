<?php
// Include constants file
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    // Get the value and delete
    $id = $_GET['id'];
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
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }
    }

    // Delete Data From Database
    $sql = "DELETE FROM tbl_category WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    
    if($res == true)
    {
        // Category deleted successfully
        $_SESSION['delete'] = "<div class='success'>Category deleted successfully.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else
    {
        // Failed to delete category
        $_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
}
else
{
    // Redirect to Manage Category Page
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>