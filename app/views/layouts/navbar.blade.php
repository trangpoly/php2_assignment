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
            <div id="nav-left" class="col-2 m-0 p-0">
                <img src="https://i.imgur.com/5EK1lFm.png" class="img-fluid p-2" alt="">
                <div id="menu" class="col-12 p-0  m-0 d-flex flex-column bd-highlight mb-3 border-top">
                    <a href="{{ BASE_URL . 'admin/dashboard'}}" class="bd-highlight"><i class="bi bi-speedometer2"></i> Dashboard</a>
                    <a href="{{ BASE_URL . 'admin/mon-hoc'}}" class="bd-highlight"><i class="bi bi-book-half"></i> Subjects</a>
                    <a href="{{ BASE_URL . 'admin/quiz?subject_id=0'}}" class="bd-highlight"><i class="bi bi-puzzle"></i> Quizs</a>
                    <a href="{{ BASE_URL . 'admin/question'}}" class="bd-highlight"><i class="bi bi-patch-question"></i> Questions</a>
                    <a href="{{ BASE_URL . 'admin/thong-ke'}}" class="bd-highlight"><i class="bi bi-card-checklist"></i> Thống kê</a>
                </div>
            </div>
            <div id="nav-right" class="col-10 m-0 p-0">
                <div id="nav" class="col-12 row m-0">
                    <div class="col-4"></div>
                    <input type="text" class="col-4 border border-secondary rounded-pill mt-2 p-2 ps-4 mb-2"
                        placeholder="Search...">
                    <div class="col-2"></div>
                    <div class="icon col-2 pt-2">
                        <a href=""><i class="bi bi-gear-fill "></i></a>
                        <span class="dropdown">
                            <i class="bi bi-person dropdown-toggle" data-toggle="dropdown" aria-expanded="true"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a href="#" class="dropdown-item">Chào {{$_SESSION['teacher_name']}}!</a>
                                <a href="#" class="dropdown-item">Cập nhật tài khoản</a>
                                <a href="{{ BASE_URL . 'logout'}}" class="dropdown-item">Đăng xuất</a>
                            </div>
                    </span>
                    </div>

                </div>
                <div class="col-12 m-0 p-0">
                    @yield('content')
                </div>
            </div>
        </div>
@yield('script')
</body>
</html>
