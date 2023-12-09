<?php

// Lấy số lượng sản phẩm trong giỏ hàng
$cartCount = 5; // Thay bằng mã lấy số lượng sản phẩm trong giỏ hàng từ cơ sởdữ liệu hoặc nguồn dữ liệu của bạn

// Trả về số lượng sản phẩm dưới dạng JSON
echo json_encode(array("count" => $cartCount));
?>
