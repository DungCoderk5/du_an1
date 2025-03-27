<link rel="stylesheet" href="../DU_AN_1/views/assets/css/sign.css">
<div class="site-map">
    <div class="row-1">
        <a href="./">Trang chủ</a>
        <p>/</p>
        <a id="sign-in" href="index.php?page=Sign-In">Đăng Nhập</a>
    </div>
</div>
<section class="form-sign-in">
    <form action="index.php?page=Sign-In" method="POST">
        <label for="">
            <div class="text-section">
                <h2 class="mt-3">Đăng nhập</h2>
                <img src="./public/upload/imgs/Tym.jpg" alt="">
            </div>
        </label>
        <div class="input-group">
            <div class="icon">
                <i class="fa-solid fa-user"></i>
                <i class="fa-solid fa-eye-slash"></i>
            </div>
            <input type="text" name="username" class="sign-name" id="sign-name" placeholder="Tên đăng nhập"
                autocomplete="on">
            <input type="password" name="password" class="sign-pw" id="sign-pw" placeholder="Mật khẩu">
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        </div>
        <div class="remember-forget">
            <div class="remember">
                <input type="checkbox">
                <p>Ghi nhớ</p>
            </div>
            <div class="forget">
                <a href="index.php?action=Forgot-Password">
                    <p>Quên mật khẩu ?</p>
                </a>
            </div>
        </div>
        <div class="button-group">
            <button type="submit" onclick="return kiemtra()" name="login" class="button-text">Đăng nhập</button>
            <p>Hoặc</p>
            <div class="social">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-google-plus-g"></i>
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-brands fa-tiktok"></i>
                <i class="fa-brands fa-x-twitter"></i>
            </div>
            <p>Chưa có tài khoản? <a href="index.php?page=Sign-Up">Đăng ký</a></p>
        </div>
    </form>
</section>
<script src="../DU_AN_1/views/assets/js/sign.js"></script>

<script>
function kiemtra(){
    const usernameInput = document.querySelector("#sign-name");
    const passwordInput = document.querySelector("#sign-pw");

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
    if (!termsCheckbox.checked) {
    createError(termsCheckbox, "Vui lòng đồng ý điều khoản và dịch vụ!");
    return false;
}
    return true;
}

</script>