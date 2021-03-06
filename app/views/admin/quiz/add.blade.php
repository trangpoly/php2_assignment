<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo quiz</title>
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
    margin-top: 50px;
    padding: 30px 50px;
    background-color: white;
    width: 100%;
    max-width: 700px;
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
.quiz_create {
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
.quiz_create:hover {
    background-color: rgb(182, 67, 105);
}
.error {
    color: red;
    font-size: 16px;
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
.footer {
    text-align: center;
    margin-top: 15px;
}
    </style>
</head>
<body>
    <div class="signup">
        <h1 class="title">TẠO MỚI QUIZ</h1>
        <form action="" method="POST" class="form-group" enctype="multipart/form-data">
            <label for="name" class="signup-label">Tên quiz:</label>
            <input type="text" name="name" class="sign-input" placeholder="Quiz 1">
            <label for="inputState">Môn học</label>
            <select id="inputState" name= "subject_id" class="form-control sign-input">
                <option selected></option>
                @foreach($subject_All as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
            <label for="duration_minutes" class="signup-label">Thời gian làm quiz:</label>
            <input type="number" min="10" max = "60" name="duration_minutes" class="sign-input">
            <label for="exampleFormControlFile">Thời gian mở quiz:</label><br>
            <input type="datetime-local" name="time_start" class="sign-input" placeholder="image.png">
            <label for="exampleFormControlFile">Thời gian đóng quiz:</label><br>
            <input type="datetime-local" name="time_end" class="sign-input" placeholder="image.png">
            <label for="exampleFormControlFile">Trạng thái:</label><br>
            <select id="inputState" name= "status" class="form-control sign-input">
                <option value="0">Được làm</option>
                <option value="1">Không được làm</option>
            </select>
            @if(isset($_SESSION['error']))
                <span class="error">{{$_SESSION['error']}}</span>
            @unset($_SESSION['error'])
            @endif 
            <button class="quiz_create" name="login">Tạo quiz</button>
            <a href="{{BASE_URL. 'admin/quiz'}}" class="signup-cancel" name="exist">Quay lại</a>
        </form>
    </div>
</body>
</html>