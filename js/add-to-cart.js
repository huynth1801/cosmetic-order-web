$(document).ready(function() {
    // Lắng nghe sự kiện khi người dùng nhấp vào nút "Thêm vào giỏ hàng"
    $('.add-to-cart').click(function(e) {
      e.preventDefault();
      var cosmetic_id = $(this).data('cosmetic-id');
      
      // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
      $.ajax({
        url: 'add-to-cart.php',
        method: 'POST',
        data: { cosmetic_id: cosmetic_id },
        success: function(response) {
          // Xử lý phản hồi từ máy chủ
          if (response == 'success') {
            // Thông báo thành công
            alert('Sản phẩm đã được thêm vào giỏ hàng!');
          } else {
            // Thông báo lỗi
            alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
          }
        }
      });
    });
});