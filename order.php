<?php include('./partials-front/menu.php'); ?>
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
<?php include('./partials-front/footer.php'); ?>

