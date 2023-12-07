<?php include('./partials-front/menu.php'); ?>
<!-- Navbar section END-->

<!-- Search section START-->
<section class="search text-center">
  <div class="container">
    <div class="container">
      <h2>Tất cả sản phẩm</h2>
    </div>
  </div>
</section>
<!-- Search section END-->

<!-- Menu section START-->
<section class="item-menu pt-3">
  <div class="container">
    <h2 class="text-center"></h2>
    <?php
    // Define the number of items per page
    $itemsPerPage = 6;

    // Get the current page number from the URL
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset for the query
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Create SQL query to get a limited number of cosmetic items based on the current page
    $sql = "SELECT * FROM tbl_cosmetic WHERE active='Yes' AND featured='Yes' LIMIT $offset, $itemsPerPage";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check whether cosmetic items are available or not
    if (mysqli_num_rows($res) > 0) {
      // Cosmetic items are available
      while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $desc_cosmetic = $row['desc_cosmetic'];
        $image_name = $row['image_name'];
        ?>
        <div class="item-menu-box">
          <!--menu for item 4-->
          <div class="item-menu-img">
            <?php
            // Check whether image is available or not
            if ($image_name == "") {
              echo "<div class='error'>Image not Available</div>";
            } else {
              ?>
              <img
                src="<?php echo $image_name; ?>"
                alt="Item <?php echo $id; ?>"
                class="img-responsive img-fluid"
              />
              <?php
            }
            ?>
              </div>

              <div class="item-menu-desc">
                <div class="d-flex justify-content-between align-items-center items-info">
                  <h4><?php echo $title; ?></h4>
                  <h4 class="price">$<?php echo $price; ?></h4>
                </div>
                <div class="button__order">
                  <a href="<?php echo SITEURL; ?>order.php?cosmetic_id=<?php echo $id; ?>" class="btn btn-order">Đặt ngay</a>
                </div>
              </div>
            </div>
        <?php
      }

      // Create SQL query to get the total number of cosmetic items
      $totalItemsSql = "SELECT COUNT(*) AS total FROM tbl_cosmetic WHERE active='Yes' AND featured='Yes'";
      $totalItemsResult = mysqli_query($conn, $totalItemsSql);
      $totalItemsRow = mysqli_fetch_assoc($totalItemsResult);
      $totalItems = $totalItemsRow['total'];

      // Calculate the total number of pages
      $totalPages = ceil($totalItems / $itemsPerPage);
    } else {
      echo "<div class-'error'>Cosmetic not Available</div>";
    }
    ?>
  </div>
  <!-- Pagination section START -->
</section>

<section class="container d-flex jutify-content-center page">
  <div class="container">
      <nav aria-label="Page navigation example" class="">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <?php
            if ($currentPage > 1) {
              echo '<a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a>';
            } else {
              echo '<a class="page-link" href="#" disabled>Previous</a>';
            }
            ?>
          </li>
          <?php
          for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
          }
          ?>
          <li class="page-item">
            <?php
            if ($currentPage < $totalPages) {
              echo '<a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a>';
            } else {
              echo '<a class="page-link" href="#" disabled>Next</a>';
            }
            ?>
          </li>
        </ul>
      </nav>
  </div>
</section>

<?php include('./partials-front/footer.php') ?>