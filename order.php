<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- to make the web reponsive-->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />

    <title>Đặt hàng</title>

    <!-- link css file-->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- Navbar section START-->
    <section class="navbar">
      <div class="container bd">
        <div class="logo">
          <a href="index.html">
            <img
              src="images/logo.png"
              alt="logo"
              class="img-responsive"
            />
          </a>
        </div>

        <div class="menu text-right">
          <ul>
            <li>
              <a href="index.html">Trang chủ</a>
            </li>

            <li>
              <a href="categories.html">Khuyến mãi</a>
            </li>

            <li>
              <a href="items.html">Sản phẩm</a>
            </li>

            <li>
              <a href="#">F Q&A</a>
            </li>
          </ul>
        </div>
        <br style="clear: both" />
      </div>
    </section>
    <!-- Navbar section END-->

    <!-- item ordered Section Starts Here -->
    <section class="food">
      <div class="container">
        <h2 class="text-center">Đặt hàng</h2>

        <form action="#" class="order">
          <fieldset class="item-ordered">
            <legend>Sản phẩm đã chọn</legend>

            <div class="item-menu-img">
              <img
                src="images/item-2.png"
                alt="item2"
                class="img-responsive"
              />
            </div>

            <div class="item-menu-desc">
              <h4>hunny pot</h4>
              <p class="desc">lux lipstick set</p>

              <p class="price">$20.00</p>
            </div>
          </fieldset>

          <fieldset class="item-ordered">
            <legend>Thông tin thanh toán</legend>
            <div class="order-label">Tên</div>
            <input
              type="text"
              name="full-name"
              placeholder="Trà My"
              class="input-responsive"
              required
            />

            <div class="order-label">Số điện thoại</div>
            <input
              type="tel"
              name="contact"
              placeholder="098xxxxxxx"
              class="input-responsive"
              required
            />

            <div class="order-label">Email</div>
            <input
              type="email"
              name="email"
              placeholder="@gmail.com"
              class="input-responsive"
              required
            />

            <div class="order-label">Địa chỉ</div>
            <textarea
              name="address"
              rows="10"
              placeholder="ueh cơ sở B, Đào Duy Từ"
              class="input-responsive"
              required
            ></textarea>

            <input
              type="submit"
              name="submit"
              value="Thanh toán"
              class="btn btn-secondary"
            />
          </fieldset>
        </form>
        <br style="clear: both" />
      </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- Socialmedia section START-->
    <section class="socialmedia">
      <div class="container">
        <ul class="text-center">
          <!--ul: unordered list-->
          <li>
            <!--li: list | list item 1-->
            <a href="#">Shopee</a>
          </li>

          <li>
            <!--list item 2-->
            <a href="#">Lazada</a>
          </li>

          <li>
            <!--list item 3-->
            <a href="#">Instagram</a>
          </li>
        </ul>
      </div>
    </section>
    <!-- Socialmedia section END-->

    <!-- Footer section START-->
    <section class="footer">
      <div class="container">
        <p class="ftext text-center">
          Đồ án phát triển website
        </p>
      </div>
    </section>
    <!-- Footer section END-->
  </body>
</html>
