<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id'])) 
            {
                $id = $_GET['id'];
            }
        ?>

        <?php 
            // Check whether the Submit Button is Clicked or 
            if(isset($_POST['submit']))
            {
                // echo "Clicked";

                // 1. Get the Data from Form
                $id = $_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                // 2. Check whether the user with current id and current password exists or not
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                // Execute the Query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    // Check whether data is available or not
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        // User Exists and Password can be changed
                        // echo "User Found";
                        if($new_password==$confirm_password)
                        {
                            // Update the password
                            $sql2 = "UPDATE tbl_admin SET
                                password='$new_password'
                                WHERE id=$id
                            ";
                            // Execute the Query
                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true)
                            {
                                // Display success message
                                $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                                // Redirect the user
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                            else
                            {
                                // Display error message
                                $_SESSION['change-pwd'] = "<div class='error'>Failed to change Password.</div>";
                                // Redirect the user
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                        else
                        {
                            // Redirect to Manage Admin Page with Error Message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Password did not patch.</div>";
                            // Redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        // User Does Not exist set message and redirect
                        $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                        // Redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                // 3. Check whether the new password and confirm password match or not

                // 4. Change Password if all above is true
            }
        ?>

        <div class="container">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="current_password">Current Password:</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Current Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="row pt-4 ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>