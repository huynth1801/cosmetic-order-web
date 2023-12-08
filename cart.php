<?php include('./partials-front/menu.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-5">
    <h1>Giỏ hàng</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Sản phẩm</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Giá</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $cart = $_SESSION['cart'];
        $totalPrice = 0; // Khởi tạo biến tổng số tiền
        foreach ($cart as $cosmetic_id) {
          // Truy vấn thông tin sản phẩm từ cơ sở dữ liệu
          $sql = "SELECT * FROM tbl_cosmetic WHERE id = '$cosmetic_id'";
          $result = $conn->query($sql);

          // Kiểm tra và hiển thị thông tin sản phẩm
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              // Hiển thị thông tin sản phẩm
              echo "<tr>";
              echo "<td>" . $row["title"] . "</td>";
              echo "<td><input type='number' class='form-control quantity-input' value='1' min='1'></td>";
              echo "<td>" . $row["price"] . "</td>";
              echo "<td><button class='btn btn-danger btn-sm'>Xóa</button></td>";
              echo "</tr>";

              // Tính tổng số tiền
              $quantity = 1; // Giá trị mặc định cho số lượng
              if (isset($_POST['quantity'])) {
                $quantity = $_POST['quantity']; // Lấy giá trị số lượng từ form nếu có
              }
              $price = $row["price"]; // Giá của sản phẩm
              $subtotal = $price * $quantity; // Tính tổng tiền cho sản phẩm hiện tại
              $totalPrice += $subtotal; // Cộng tổng tiền vào biến tổng số tiền
            }
          } else {
            echo "<tr><td colspan='4'>Không tìm thấy thông tin sản phẩm.</td></tr>";
          }
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">Tổng cộng:</td>
          <td colspan="2" id="total-price"><?php echo "$" . number_format($totalPrice, 2); ?></td>
        </tr>
      </tfoot>
    </table>

    <div class="text-right">
      <a href="#" class="btn btn-primary">Tiếp tục mua hàng</a>
      <a href="#" class="btn btn-success">Thanh toán</a>
    </div>

  </div>

  <script>
    // Lắng nghe sự kiện thay đổi giá trị của input số lượng
    var quantityInputs = document.getElementsByClassName('quantity-input');
    for (var i = 0; i < quantityInputs.length; i++) {
      quantityInputs[i].addEventListener('change', updateTotalPrice);
    }

    // Cập nhật tổng tiền khi số lượng thay đổi
    function updateTotalPrice() {
      var total = 0;
      var quantityInputs = document.getElementsByClassName('quantity-input');
      var prices = document.getElementsByTagName('td');
      for (var i = 0; i < quantityInputs.length; i++) {
        var quantity = parseInt(quantityInputs[i].value);
        var price = parseFloat(prices[i * 4 + 2].innerText);
        var subtotal = quantity * price;
        if (!isNaN(subtotal)) {
          total += subtotal;
        }
      }
      document.getElementById('total-price').innerText= "$" + total.toFixed(2);
    }
  </script>

</body>

</html>

<?php include('./partials-front/footer.php') ?>