<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Account">Thông tin tài khoản</a>
    </div>
</div>
<div class="account-info">
    <div class="avatar">
    <img src="<?php echo !empty($_SESSION['user']['img']) ? './public/upload/imgs/' . $_SESSION['user']['img'] : './public/upload/imgs/avatar1.jpg'; ?>" alt="Ảnh đại diện">
        <p><?=$_SESSION['user']['username']?></p>
        <a href="index.php?page=Change-Password"><button>Thay đổi mật khẩu</button></a>
    </div>
    <div class="info">
        <h3>Thông tin tài khoản</h3>
        <form action="./views/pages/users/update_profile.php" method="POST" enctype="multipart/form-data">
            <label for="name">Họ và Tên</label>
            <input type="text" id="name" name="name" placeholder="Họ và Tên" value="<?=$_SESSION['user']['username']?>">

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email" value="<?=$_SESSION['user']['email']?>">

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" placeholder="Số điện thoại"
                value="<?=$_SESSION['user']['phone']?>">

            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" placeholder="Địa chỉ"
                value="<?=$_SESSION['user']['address']?>">

            <label for="img">Ảnh</label>
            <input type="file" id="img" name="img" accept="imgs">

            <button type="submit">Cập nhật tài khoản</button>
        </form>
    </div>
</div>

<script src="../DU_AN_1/views/assets/js/account.js"></script>