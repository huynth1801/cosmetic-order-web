<?php include('partials/menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>
                <div class="cols-4 text-center ">
                    <?php 
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);
                        // Count Rows
                        $count = mysqli_num_rows($res);
                    ?>
                    <h1><?php echo $count ?></h1>
                    <br />
                    Categories
                </div>

                <div class="cols-4 text-center ">
                    <?php 
                        $sql1 = "SELECT * FROM tbl_cosmetic";
                        $res1 = mysqli_query($conn, $sql1);
                        // Count Rows
                        $count1 = mysqli_num_rows($res1);
                    ?>
                    <h1><?php echo $count1; ?></h1>
                    <br />
                    Cosmetic
                </div>

                <div class="cols-4 text-center ">
                    <?php 
                        $sql2 = "SELECT * FROM tbl_order";
                        $res2 = mysqli_query($conn, $sql2);
                        // Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>
                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="cols-4 text-center ">
                    <?php 
                        $sql3 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Deliveried'";
                        $res3 = mysqli_query($conn, $sql3);
                        // Count Rows
                        $row3 = mysqli_fetch_assoc($res3);

                        $total_revenue = $row3['Total'];
                        $total_revenue_display = ($total_revenue == 0) ? '0' : $total_revenue;
                    ?>
                    <h1>$<?php echo $total_revenue_display;  ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main Content Section Ends -->
<?php include('partials/footer.php') ?>