<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo mới môn học</title>
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
.signup-cancel {
    text-decoration: none;
    padding: 15px;
    font-size: 20px;
    background-color: #41444B;
    color: white;
    border: 0;
    border-radius: 16px;
    text-align: center;
    outline: none;
    display: block;
    width: 100%;
    margin-top: 10px;
    box-shadow: 0 5px 20px 0 rgb(241, 203, 216);
}
.signup-cancel:hover {
    background-color: black;
}
.error {
    color: red;
    font-size: 16px;
}
.footer {
    text-align: center;
    margin-top: 15px;
}
    </style>
</head>
<body>
    <div class="signup">
        <h1 class="title">TẠO MỚI MÔN HỌC</h1>
        <form action="" method="POST" class="form-group" enctype="multipart/form-data">
            <label for="name" class="signup-label">Tên môn học:</label>
            <input type="text" name="name" class="sign-input" placeholder="Nhập môn lập trình">
            <label for="desc" class="signup-label">Mô tả môn học:</label>
            <textarea name="desc" id="" class="sign-input" cols="30" rows="10" placeholder="Chào mừng bạn đến với khóa học Lập trình PHP Online của FPT Polytechnic. Chúc bạn học tập trung thực, đạt kết quả online tốt để thi cuối môn học với kết quả cao!"></textarea>
            <label for="exampleFormControlFile1">Ảnh đại diện:</label><br>
            <input type="text" name="image" class="sign-input" placeholder="image.png">
            @if(isset($_SESSION['error']))
                <span class="error">{{$_SESSION['error']}}</span>          
                @unset($_SESSION['error'])
            @endif
            <button class="signup-submit" name="login">Thêm mới</button>
            <a href="{{BASE_URL. 'admin/mon-hoc'}}" class="signup-cancel" name="exist">Quay lại</a>
        </form>
    </div>
</body>
</html>