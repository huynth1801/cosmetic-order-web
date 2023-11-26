<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /> <br />

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <br><br>
                <!-- Button to add admin -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary">Add Category</a>

        <br /><br /><br />
        
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>1.</td>
                <td>Team 4</td>
                <td>team4</td>
                <td>
                    <a href="#" class="btn btn-secondary">Update Admin</a>
                    <a href="#" class="btn btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>2.</td>
                <td>Team 4</td>
                <td>team4</td>
                <td>
                    <a href="#" class="btn btn-secondary ">Update Admin</a>
                    <a href="#" class="btn btn-danger">Delete Admin</a>
                </td>
            </tr>

            <tr>
                <td>3.</td>
                <td>Team 4</td>
                <td>team4</td>
                <td>
                    <a href="#" class="btn btn-secondary ">Update Admin</a>
                    <a href="#" class="btn btn-danger">Delete Admin</a>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>