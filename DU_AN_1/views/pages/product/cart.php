 <div class="site-map">
     <div class="row-1">
         <a href="./">Trang chủ</a>
         <p>/</p>
         <a href="index.php?page=Product">Sản phẩm</a>
         <p>/</p>
         <a href="index.php?page=Products-Details">Chi tiết sản phẩm</a>
         <p>/</p>
         <a id="sign-in" href="index.php?page=Cart">Giỏ hàng</a>
     </div>
 </div>
 <div class="container-cart">
     <div class="step-indicator">
         <span>1</span> Giỏ hàng
         <span class="active">2</span> Thanh toán
         <span class="active">3</span> Hoàn thành
     </div>
     <?php
     extract($cart);
     $saleoff = ($price - ($price * $discount / 100)); 
     $cartShow = '
     <div class="cart-container">
         <table class="cart-table">
             <thead>
                 <tr>
                     <th>Sản phẩm</th>
                     <th>Giá</th>
                     <th>Số lượng</th>
                     <th>Tạm tính</th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>
                         <div class="product">
                             <img src="./public/upload/imgs/Products/' . htmlspecialchars($img_url) . '" alt="' . htmlspecialchars($description_img) . '">
                             <a href="#" class="product-name">' . htmlspecialchars($name_pro) . '</a>
                         </div>
                     </td>
                     <td class="price">' . number_format($saleoff) . 'đ</td>
                     <td>
                         <div class="quantity-control">
                             <button onclick="updateQuantity(this, -1)">-</button>
                             <input type="text" value="1" class="quantity" onchange="calculateSubtotal(this)">
                             <button onclick="updateQuantity(this, 1)">+</button>
                         </div>
                     </td>
                     <td class="subtotal">' . number_format($saleoff) . 'đ</td>
                     <td><button class="remove-button"><i class="fa-solid fa-trash-can"></i></button></td>
                 </tr>
             </tbody>
         </table>

         <div class="summary">
             <h3>Cộng giỏ hàng</h3>
             <div class="tamtinh">
                 <p>Tạm tính</p>
                 <span class="total">' . number_format($saleoff) . 'đ</span>
             </div>
             <hr>
             <div class="tong">
                 <p>Tổng</p>
                 <span class="total">' . number_format($saleoff) . 'đ</span>
             </div>
             <a href="index.php?page=Pay" class="checkout-button">Tiến hành thanh toán</a>
         </div>
     </div>
 </div>

 <div class="cart-container2">


     <h4>Tóm tắt đơn hàng</h4>

     <!-- Order Item 1 -->
     <div class="mob-cart">
         <img class="img" src="../DU_AN_1/public/upload/imgs/Products/' . htmlspecialchars($img_url) . '" alt="' . htmlspecialchars($description_img) . '">
         <p class="name">' . htmlspecialchars($name_pro) . '</p>
         <p class="price">' . number_format($saleoff) . '</p>
         <p class="descrip">áo phông nam basic dáng regular cổ tròn, có chi tiết đồ họa là điểm....</p>
         <div class="quantity">
             <div class="quantity-control">
                 <button onclick="updateQuantity(this, -1)">-</button>
                 <input type="text" value="1" class="quantity" onchange="calculateSubtotal(this)">
                 <button onclick="updateQuantity(this, 1)">+</button>
             </div>
         </div>
         <p class="delete">xóa sản phẩm</p>
     </div>
     <div class="total">
         <div class="order-total">
             <span>Tạm tính</span>
             <span>' . number_format($saleoff) . '</span>
         </div>
         <div class="order-total">
             <span>Giao hàng</span>
             <span>Miễn phí</span>
         </div>
         <div class="grand-total">
             <span>Tổng</span>
             <span>' . number_format($saleoff) . '</span>
         </div>
     </div>
     <a href="index.php?page=Pay"><button class="checkout-button">Thanh Toán</button></a>
 </div>';
    echo $cartShow;
     ?>
     <script src="../DU_AN_1/views/assets/js/cart.js"></script>