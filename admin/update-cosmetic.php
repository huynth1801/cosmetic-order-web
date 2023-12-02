<?php 
    session_start();
    include('partials/menu.php') 
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>

        <br><br>

        <?php
        // Kiểm tra xem id đã được đặt hay chưa
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_cosmetic WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count == 1) {
                    $row2 = mysqli_fetch_assoc($res);
                    $title = $row2['title'];
                    $description = $row2['desc_cosmetic'];
                    $price = $row2['price'];
                    $current_image = $row2['image_name'];
                    echo $current_category = $row2['category_id'];
                    $featured = $row2['featured'];
                    $active = $row2['active'];
                }
                else {
                    $_SESSION['no-product-found'] = "<div class='error'>Product not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-cosmetic.php');
                    exit(); // Thêm lệnh exit() để dừng việc thực hiện code tiếp theo
                }
            }
            else {
                header('location:'.SITEURL.'admin/manage-cosmetic.php');
                exit(); // Thêm lệnh exit() để dừng việc thực hiện code tiếp theo
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="10" placeholder="Description of the cosmetic"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" placeholder="" min="0" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php 
                        if($current_image != "")
                        {
                            // Display the Image
                            ?>
                            <img src="<?php echo $current_image ?>" alt="" width="150px">
                            <?php
                        }
                        else
                        {
                            echo "<div class='error'>Image not Added.</div>";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image's URL: </td>
                    <td>
                        <input type="text" name="image" placeholder="Image URL">
                    </td>
                </tr>

                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <?php 
                            $sql_1 = "SELECT * FROM tbl_category WHERE active='YES'";
                            $res_1 = mysqli_query($conn, $sql_1);
                            $count_1 = mysqli_num_rows($res_1);

                            if($count_1 > 0)
                            {
                                while($row_1=mysqli_fetch_assoc($res_1))
                                {
                                    $category_id = $row_1['id'];
                                    $category_title = $row_1['title'];
                                    ?>
                                    <option <?php if($current_category==$category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <option value="0">No category found.</option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" id="" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" id="" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" id="" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" id="" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Update Product" name="submit" class="btn btn-primary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $current_category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
            
                if(isset($_POST['image']) && !empty($_POST['image'])) {
                    $new_image = $_POST['image'];
                    $sql3 = "UPDATE tbl_cosmetic SET image_name='$new_image' WHERE id=$id";
                    $res_3 = mysqli_query($conn, $sql3);
                }
                else {
                    $new_image = $current_image;
                }
            
                $sql4 = "UPDATE tbl_cosmetic SET 
                            title = '$title', 
                            desc_cosmetic = '$description', 
                            price = $price, 
                            category_id = $current_category, 
                            featured = '$featured', 
                            active = '$active', 
                            image_name = '$new_image'
                        WHERE id = $id";
            
                $res4 = mysqli_query($conn, $sql4);
            
                if($res4) {
                    // Category Updated
                    $_SESSION['update'] = "<div id='popup' class='alert alert-success alert-dismissible fade show' role='alert'>
                    Product Updated Successfully
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
                    header('location:'.SITEURL.'admin/manage-cosmetic.php');
                    exit(); // Thêm lệnh exit() để dừng việc thực hiện code tiếp theo
                }
                else {
                    $_SESSION['update'] = "<div id='popup' class='alert alert-danger alert-dismissible fade show' role='alert'>
                        Failed to Update Product
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
                    header('location:'.SITEURL.'admin/manage-cosmetic.php');
                    exit(); // Thêm lệnh exit() để dừng việc thực hiện code tiếp theo
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>
