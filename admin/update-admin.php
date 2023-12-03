<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>

        <?php 
            // 1. Get the ID of Selected Admin
            $id = $_GET['id'];

            // 2. Create SQL Query to Get the Details
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Check whether the query is executed or not
            if($res == true) {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                // Check whether we have admin data or not
                if($count == 1)
                {
                    // Get the Details
                    echo "Admin Available";
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    // Redirect to Manage Admin Page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>
        <br><br>
        <form action=" " method="POST" class="mt-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" value="<?php echo $full_name; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn btn-info mt-2">
        </form>
    </div>
</div>

<?php 
    // Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // echo "Button Clicked";
        // Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Create a SQL Query to Update Admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        // Execute the Query
        $res = mysqli_query($conn, $sql);

        // Check whether the query executed successfully or not
        if($res == true)
        {
            // Query Executed and Admin Updated
            $_SESSION['update'] = "<div id='popup' class='alert alert-success alert-dismissible fade show' role='alert'>
                        Admin Updated Successfully
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                        // Thêm đoạn mã JavaScript vào sau thông báo
                        $_SESSION['update'] .= "
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
            // Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // Failed to Update Admin
            $_SESSION['update'] = "<div id='popup' class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Failed to Update Admin
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";

                        // Thêm đoạn mã JavaScript vào sau thông báo
                        $_SESSION['update'] .= "
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
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
     }
?>

<?php include('partials/footer.php') ?>