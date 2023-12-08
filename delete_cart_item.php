<?php
session_start();

if (isset($_POST['cosmetic_id'])) {
  $cosmeticId = $_POST['cosmetic_id'];
  
  // Xóa sản phẩm từ giỏ hàng
  $cart = $_SESSION['cart'];
  if (($key = array_search($cosmeticId, $cart)) !== false) {
    unset($cart[$key]);
    $_SESSION['cart'] = $cart;
  }
}

?>