<?php
namespace App\Controllers;
use App\Models\Subject;
class DashboardController{
    public function index(){
        if(isset($_SESSION['student_id'])||isset($_SESSION['teacher_id'])){
            $subjectDashboard = Subject::all();
            if(isset($_SESSION['student_id'])){
                $title = "Trang chủ";
                // include "./app/views/student/dashbroad/index.php";
                return view('student.dashboard.index',[
                    'subjectDashboard' => $subjectDashboard,
                    'title' => $title
                ]);
            }
            if(isset($_SESSION['teacher_id'])){
                // include "./app/views/admin/dashboard.php";
                return view('admin.dashboard', []);
            }
            
        }
        else {
            // include "./app/views/login/login.php";
            return view('login.login',[]);
        }
        
    }
    
    
}
?>