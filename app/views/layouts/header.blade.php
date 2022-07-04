<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>
<style>
body {
    font-family: 'Dongle', sans-serif;
    font-family: 'Work Sans', sans-serif;
}
.header {
    background-color: black;
}
.title {
    font-weight: bolder;
}
.list_quiz a{
    color: black;
}
.list_quiz a:hover {
    /* color: rgb(153, 25, 68); */
    text-decoration: none;
}
.list_quiz a:hover .row {
    background-color: rgb(223, 223, 223);
}
#time {
    font-size: 30pt;
    font-weight: 500;
}
</style>
<body>
    <div class="container-fluid p-0">
        <div class="row header col-12 m-0 p-0">
            <img src="https://i.imgur.com/5EK1lFm.png" class="col-1 p-2 ml-3" alt="">
            <div class="col-8 row"></div>
            <a href="#" class="col-1 pl-5" style="color: white; font-size:25pt; margin:auto 0;"><i class="bi bi-envelope-fill"></i></a>
            <a href="#" class=" ml-2 mr-5" style="color: white; font-size:25pt; margin:auto 0;"><i class="bi bi-person-fill"></i></a>
            <div class="col-1 dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="true">
                    <img src="{{$_SESSION['student_avatar']}}" class="img-fluid" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-danger" href="#">Xin chào {{$_SESSION['student_name']}}!</a>
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Account</a>
                    <a class="dropdown-item" href="{{ BASE_URL . 'logout'}}">Đăng xuất</a>
                </div>
            </div>
        </div>