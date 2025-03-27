<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a href="index.php?page=Product">Sản phẩm</a>
        <p>/</p>
        <a href="index.php?page=Products-Details">Chi tiết sản phẩm</a>
        <p>/</p>
        <a href="index.php?page=Cart">Giỏ hàng</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Pay">Thanh toán</a>
    </div>
</div>
<div class="container-pay">
    <div class="step-indicator">
        <span class="active">1</span> Giỏ hàng
        <span>2</span> Thanh toán
        <span class="active">3</span> Hoàn thành
    </div>
    <div class="order">
        <div class="order-1">
            <h2>Địa chỉ thanh toán</h2>
            <input type="text" placeholder="Tên">
            <input type="text" placeholder="Email">
            <input type="text" placeholder="Số điện thoại">
            <input type="text" placeholder="Địa chỉ">
            <textarea placeholder="Ghi chú đơn hàng"></textarea>
            <a href="index.php?page=Pay-Complete"><button>Thanh toán</button></a>
        </div>
        <div class="order-2">
            <h3>Tóm tắt đơn hàng</h3>
            <hr>
            <div class="list-product">
                <div class="product">
                    <p>Áo nỉ tay dài chống nước thoáng mát X 2</p>
                    <p>100000VNĐ</p>
                </div>

            </div>
            <hr>
            <div class="voucher">
                <p>Mã giảm giá</p>
                <input type="text" placeholder="Mã giảm giá nếu có">
            </div>
            <hr>
            <div class="Ship">
                <p>Vận chuyển</p>
                <p>Miễn phí</p>
            </div>
            <hr>
            <div class="total">
                <p style="font-weight: 700;">Tổng tiền</p>
                <p style="font-weight: 700;">200000VNĐ</p>
            </div>
            <hr>
            <div class="method">
                <h4>Phương thức thanh toán</h4>
                <label for="cod">
                    <input type="radio" id="cod" name="payment" value="cod">
                    <p>Thanh toán khi nhận hàng</p>
                </label>
                <label for="paypal">
                    <input type="radio" id="paypal" name="payment" value="paypal">
                    <p>PayPal</p>
                </label>
                <label for="bank">
                    <input type="radio" id="bank" name="payment" value="bank">
                    <p>Chuyển khoản ngân hàng</p>
                </label>
            </div>
        </div>
    </div>
</div>
<script src="./views/assets/js/pay.js"></script>