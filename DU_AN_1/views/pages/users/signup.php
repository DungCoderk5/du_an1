<link rel="stylesheet" href="../DU_AN_1/views/assets/css/sign.css">
<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Sign-Up">Đăng ký</a>
    </div>
</div>
<section class="form-sign-in">
    <form action="index.php?page=Sign-Up" method="POST">
        <label for="">
            <div class="text-section">
                <h2 class="mt-3">Đăng ký</h2>
                <img class="img2" src="./public/upload/imgs/Tym.jpg" alt="">
            </div>
        </label>
        <div class="input-group">
            <div class="icon-2">
                <i class="fa-solid fa-user"></i>
                <i class="fa-solid fa-eye-slash"></i>
                <i class="fa-solid fa-eye-slash"></i>
                <i class="fa-solid fa-phone"></i>
            </div>
            <input type="text" class="sign-name" name="username" id="sign-name" placeholder="Tên đăng nhập" 
                autocomplete="on">
            <input type="password" class="sign-pw" name="password" id="sign-pw" placeholder="Mật khẩu" >
            <input type="password" class="sign-cfpw" name="cf-password" id="sign-cfpw" placeholder="Nhập lại mật khẩu"
                >
            <input type="text" class="number-phone" name="phone" id="number-phone" placeholder="Nhập số điện thoại"
                >
        </div>
        <div class="remember-forget">
            <div class="remember">
                <input type="checkbox" >
                <p>Tôi đồng ý với điều khoản và dịch vụ</p>
            </div>
        </div>
        <div class="button-group">
            <button type="submit" onclick="return kiemtra()" class="button-text" name="register">Đăng ký</button>
            <p>Hoặc</p>
            <div class="social">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-google-plus-g"></i>
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-x-twitter"></i>
            </div>
            <p>Đã có tài khoản? <a href="index.php?page=Sign-In">Đăng nhập</a></p>
        </div>
    </form>
</section>
<script src="../DU_AN_1/views/assets/js/sign.js"></script>
<!-- INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `address`, `phone`, `account_status`, `role`) VALUES ('3', 'kecu', 'nguyencu5x01@gmail.com', '123', '', NULL, '0', '0'); -->


<script>
// document.addEventListener("DOMContentLoaded", () => {
function kiemtra(){
    const usernameInput = document.querySelector("#sign-name");
    const passwordInput = document.querySelector("#sign-pw");
    const confirmPasswordInput = document.querySelector("#sign-cfpw");
    const phoneInput = document.querySelector("#number-phone");
    const termsCheckbox = document.querySelector(".remember input");
    const form = document.querySelector("form");

    // Tạo các thông báo lỗi
    const createError = (input, message) => {
        const parent = input.parentElement;
        let error = parent.querySelector(".error-message");
        if (!error) {
            error = document.createElement("p");
            error.style.color = "red";
            error.className = "error-message";
            parent.appendChild(error);
        }
        error.textContent = message;
    };

    const removeError = (input) => {
        const parent = input.parentElement;
        const error = parent.querySelector(".error-message");
        if (error) {
            parent.removeChild(error);
        }
    };

    if(usernameInput.value==""){
        // alert('Nhập đi ...');
        createError(usernameInput, "Tên đăng nhập không được để trống!");
        return false;
    }
    if(usernameInput.value.length < 4){
        createError(usernameInput, "Tên đăng nhập phải dài ít nhất 4 ký tự!");
        return false;
    }
    if (passwordInput.value==""){
        createError(passwordInput, "Mật khẩu không được để trống!");
        return false;
    }
    if (passwordInput.value.length < 6){
        createError(passwordInput, "Mật khẩu phải dài ít nhất 6 ký tự!");
        return false;
    }
    if (confirmPasswordInput.value !== passwordInput.value){
        createError(confirmPasswordInput, "Mật khẩu xác nhận không khớp!");
        return false;
    }
    if (phoneInput.value== ""){
        createError(phoneInput, "Số điện thoại không được để trống");
        return false;
    }
    if (phoneInput.value.length < 10 ){
        createError(phoneInput, "Số điện thoại phải 10 số!");
        return false;
    }
    if (!termsCheckbox.checked) {
    createError(termsCheckbox, "Vui lòng đồng ý điều khoản và dịch vụ!");
    return false;
}
    return true;
}
</script>