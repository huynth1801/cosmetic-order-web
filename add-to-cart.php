<?php
// Khởi động phiên làm việc hoặc kiểm tra cookie
session_start();

// Kiểm tra xem giỏ hàng đã tồn tại trong session hay chưa
if (!isset($_SESSION['cart'])) {
    // Nếu giỏ hàng chưa tồn tại, tạo một mảng rỗng để lưu trữ thông tin sản phẩm
    $_SESSION['cart'] = array();
}

// Lấy cosmetic_id từ yêu cầu Ajax
$cosmetic_id = $_POST['cosmetic_id'];
// Thêm thông tin sản phẩm vào mảng giỏ hàng trong session
$_SESSION['cart'][] = $cosmetic_id;

// Phản hồi thành công về máy khách
echo 'success';

?>