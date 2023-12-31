<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br />
        <br />
        <?php
            if(isset($_SESSION['add'])) // Checking whether the session is set or not
            {
                // Display the session message 
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
         ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn btn-primary ">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php
    // Process the value from Form and Save it in the database
    // Check whether the submit button is clicked or not 
    if (isset($_POST['submit'])) 
    {
        // Button Clicked
        // echo "Button Clicked";
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
        ";

        // 3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // 4. Check whether the Query is Executed data is inserted or not and display appopriate message
        if ($res == TRUE) {
            // Data inserted
            $_SESSION['add'] = "<div id='popup' class='alert alert-success alert-dismissible fade show' role='alert'>
                Admin was added successfully
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
            // Redirect Page to Manage Admin
            header("Location:".SITEURL.'admin/manage-admin.php');
        } else {
            // Failed to insert data
            $_SESSION['add'] = "<div id='popup' class='alert alert-danger alert-dismissible fade show' role='alert'>
            Failed to add admin
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
            // Redirect Page to Add Admin
            header("Location:".SITEURL.'admin/manage-admin.php');
        }
    }
 ?>