<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&family=Work+Sans:wght@500&display=swap');
    </style>
    <style>
        *{margin: 0; padding: 0; box-sizing: border-box;}
body {
    font-family: 'Dongle', sans-serif;
    font-family: 'Work Sans', sans-serif;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    
}
.signup {
    padding: 40px 50px;
    background-color: white;
    width: 100%;
    max-width: 500px;
    border-radius: 16px;
    box-shadow: 0 5px 20px 0 #999;
}
.title {
    font-size: 36px;
    text-align: center;
    color: black;
    margin-bottom: 20px;
}
.button-social {
    margin: auto;
    font-size: 20px;
    padding: 10px;
    border-radius: 16px;
    display: flex;
    color: white;
    background-color: palevioletred;
    border: 0;
    cursor: pointer;
    outline: none;
    box-shadow: 0 5px 20px 0 rgb(241, 203, 216);
}
.button-social:hover {
    background-color: rgb(182, 67, 105);
}
.icon-social {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    color: palevioletred;
}
.text-sign {
    display: block;
    margin: auto 15px;
}
.sign-or {
    text-align: center;
    font-size: 18px;
    margin: 20px auto;
    position: relative;
    color: rgb(66, 62, 62);

}
.sign-or span {
    display: inline-block;
    background-color: white;
    padding: 10px 30px;
    position: relative;
    z-index: 1;
}
.sign-or:after {
    content: "";
    width: 100%;
    height: 1px;
    background-color: #999;
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}
.signup-label {
    color: black;
    font-size: 15px;
    margin-bottom: 10px;
    display: inline-block;
    cursor: pointer;
}
.sign-input {
    display: block;
    width: 100%;
    padding: 15px;
    border-radius: 8px;
    background-color: rgb(231, 209, 218);
    outline: none;
    border: 0;
    margin-bottom: 10px;
    font-size: 15px;
}
.signup-submit {
    padding: 15px;
    font-size: 20px;
    background-color: palevioletred;
    color: white;
    border: 0;
    border-radius: 16px;
    text-align: center;
    outline: none;
    display: block;
    width: 100%;
    margin-top: 30px;
    box-shadow: 0 5px 20px 0 rgb(241, 203, 216);
}
.signup-submit:hover {
    background-color: rgb(182, 67, 105);
}
.error {
    color: red;
    font-size: 16px;
}
.footer {
    text-align: center;
    margin-top: 15px;
}
.footer a {
    text-decoration: none;
    color:palevioletred;
}
.footer a:hover {
    color: black;
}
    </style>
</head>
<body>
    <div class="signup">
        <h1 class="title">Đăng nhập hệ thống</h1>
        <button class="button-social">
            <i class="fab fa-google icon-social"></i>
            <span class="text-sign">Đăng nhập bằng Google</span>
        </button>
        <div class="sign-or"><span>Or</span></div>
        <form action="{{ BASE_URL . 'login'}}" method="POST" class="form-group">
            <label for="email" class="signup-label">Email</label>
            <input type="email" name="email" class="sign-input" placeholder="abc@gmail.com">
            <label for="password" class="signup-label">Mật khẩu</label>
            <input type="text" name="password" class="sign-input" placeholder="*******">
            @if(isset($_SESSION['error']))
                <span class="error">{{$_SESSION['error']}}</span>
            @endif
            <button class="signup-submit" name="login">Đăng nhập</button>
        </form>
        <div class="footer"><a href="#" class="forget">Quên mật khẩu?</a> or <a href="#">Đăng kí tài khoản</a></div>
    </div>
</body>
</html>