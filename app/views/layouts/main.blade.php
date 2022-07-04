<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('layouts.style')
    @include('layouts.script')
    <link rel="stylesheet" href="{{PUBLIC_URL}}css.css">
</head>
<body>
    <div class="container-fluid p-0">
        <header id="header" class="row col-12 m-0 p-0">
            <img src="https://i.imgur.com/5EK1lFm.png" class="col-2 p-2 ml-3" alt="">
            <div class="col-7 row"></div>
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
        </header>
        <div class="row col-12 m-0 p-0">
            @yield('content')   
        </div>
    </div>
    
</body>
</html>