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
        $_SESSION['delete'] = "<div class='success'>Cosmetic deleted successfully.</div>";
        header('location:'.SITEURL.'admin/manage-cosmetic.php');
    }
    else
    {
        // Failed to delete category
        $_SESSION['delete'] = "<div class='error'>Failed to delete cosmetic.</div>";
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