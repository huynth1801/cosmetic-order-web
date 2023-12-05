const menu = document.querySelector('.menu');
const hamburgerMenu = document.querySelector('.hamburger-menu');

  // Thêm sự kiện click cho menu hamburger
if (hamburgerMenu) {
  hamburgerMenu.addEventListener('click', function() {
    // Toggle lớp "show" cho menu
    menu.classList.toggle('show');
  });
}

// document.getElementById('hamburger-menu').addEventListener('click', function() {
//   document.getElementById('menu').classList.toggle('show');
//   document.getElementById('overlay').classList.toggle('show');

//   // Tính toán chiều cao toàn màn hình và áp dụng nó cho menu
//   if (document.getElementById('menu').classList.contains('show')) {
//     var windowHeight = window.innerHeight;
//     document.getElementById('menu').style.height = windowHeight + 'px';
//   }
// });