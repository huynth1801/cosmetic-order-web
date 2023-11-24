<?php 

    // Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];
    // 2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res == TRUE) 
    {
        // Query Executed Successfully and Admin Deleted
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        // Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }   
    else
    {
        $_SESSION['delete'] = "<div class='error'>Fail to Delete Admin. Try Again Later</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    // 3. Redirect to Manage Admin Page with Message (success/error)

?>