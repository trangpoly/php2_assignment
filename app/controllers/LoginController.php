<?php
namespace App\Controllers;

use App\Models\User;
class LoginController{
    public function index(){
        return view('login.login',[]);
    }
    public function checkLogin(){
        if(isset($_POST['login'])){
            $user = User::where('email',$_POST['email'])
                            ->where('password',$_POST['password'])
                            ->first();
            var_dump($user['password']);
            if($user){
                if($user["role_id"] == 1){
                    // echo "Giáo viên";
                    $_SESSION['teacher_id'] = $user["id"];
                    $_SESSION['teacher_name'] = $user["name"];
                    $_SESSION['teacher_avatar'] = $user["avatar"];
                    // $sessionUser = $user -> toArray();
                    // unset($sessionUser['password']);
                    // $_SESSION = $sessionUser;
                    return view('admin.dashboard',[
                        'user' => $user,
                        'title' => 'Trang chủ',
                        // '_session' => $_SESSION
                    ]);
                    die();
                }
                if($user["role_id"] == 0){
                    // echo "Sinh viên";
                    $_SESSION['student_id']=$user["id"];
                    $_SESSION['student_name']=$user["name"];
                    $_SESSION['student_avatar']=$user["avatar"];
                    // include "./app/views/student/dashbroad/dashbroad.php";--
                    header('location: ' . BASE_URL . 'dashboard');
                    // header('Location: '.view('student.dashboard.index',[
                    //     'user' => $user
                    // ]));
                    die();
                }
            } else {
                $_SESSION['error'] = "Sai thông tin đăng nhập. Vui lòng kiểm tra lại email và password";
                // include "./app/views/login/login.php";
                return view('login.login');
                session_unset();
                die();
            }

        }
}
    public function logout(){
        session_destroy();
        return view('login.login',[]);
    }
}
?>