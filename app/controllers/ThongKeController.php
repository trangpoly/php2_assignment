<?php 
namespace App\Controllers;

use App\Models\Subject;
use App\Models\User;
use App\Models\Quiz;

class ThongKeController {
    public function thongKeMonHoc(){
        $title = "Thống kê";
        $count_User = User::count();
        $count_Subject = Subject::count();
        $subject_All = Subject::all();
        // include_once "./app/views/admin/thong-ke/mon-hoc.php";
        return view('admin.thong-ke.mon-hoc',[
            'title' => $title,
            'count_User' => $count_User,
            'count_Subject' => $count_Subject,
            'subject_All' =>$subject_All
        ]);
    }
    public function listTeacher(){
        $title = "Danh sách giáo viên";
        $listTeacher = User::where('role_id',1)
                    ->get();
        // include_once "./app/views/admin/thong-ke/users/teacher.php";
        return view('admin.thong-ke.users.teacher',[
            'title' => $title,
            'listTeacher' => $listTeacher
        ]);
    }
    public function listStudent(){
        $title = "Danh sách sinh viên";
        $listStudent = User::where('role_id',0)
                    ->get();
        // include_once "./app/views/admin/thong-ke/users/student.php";
        return view('admin.thong-ke.users.student',[
            'title' => $title,
            'listStudent' => $listStudent
        ]);
    }
    public function getQuiz($quizId){
        $title = "Thống kê Quiz";
        $getQuiz = Quiz::where('subject_id',$quizId)
                        ->get();
        // include_once "./app/views/admin/thong-ke/quiz.php";
        return view('admin.thong-ke.quiz',[
            'title' => $title,
            'getQuiz' => $getQuiz
        ]);
    }
}
?>