<?php
namespace App\Controllers;

use App\Models\Subject;
use App\Models\Quiz;
class SubjectController{
    public function allSubj(){
        $subject_All = Subject::all();
        $title = "Dashboard - Môn học";
        // include_once "./app/views/admin/mon-hoc/mon-hoc.php";
        return view('admin.mon-hoc.mon-hoc',[
            'subject_All' => $subject_All,
            'title' => $title
        ]);
    }
    public function get($subjectId){
        
        $subject_detail = Subject::where('id',$subjectId)
                        ->first();
        $title = $subject_detail['name'];
        // var_dump($subject_detail);
        $quiz_All = Quiz::where('subject_id',$subjectId)
                        ->where('status',0)
                        ->get();
        // include_once "./app/views/student/mon-hoc/detail.php";
        return view('student.mon-hoc.detail',[
            'subject_detail' => $subject_detail,
            'title' => $title,
            'quiz_All' => $quiz_All
        ]);
    }

    public function addSubj(){
        // include_once "./app/views/admin/mon-hoc/add.php";
        return view('admin.mon-hoc.add',[
            'title' => 'Thêm môn học'
        ]);
    }
    public function saveSubj(){
        if($_POST['name']=="" || $_POST['image']=="" || $_POST['desc']==""){
            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
            // include "./app/views/admin/mon-hoc/add.php";
            return view('admin.mon-hoc.add',[]);
        }
        else {
            $model = new Subject();
            $model->name = $_POST["name"];
            $model->image = $_POST["image"];
            $model->detail = $_POST["desc"];
            $model->author_id = $_SESSION['teacher_id'];
            $model->save();
            // header('Location: '.view('admin.mon-hoc',[])) ;

            header('location: ' . BASE_URL . 'admin/mon-hoc');
            die;
        }
        
    }
    public function updateSubj($subjectId){
        $subject_update = Subject::where('id',$subjectId)
                        ->first();        
        // var_dump($subject_update);
        // include_once "./app/views/admin/mon-hoc/update.php";
        return view('admin.mon-hoc.update',[
            'subject_update' => $subject_update
        ]);
    }
    public function saveUpdateSubj($subjectId){
        $model= Subject::where('id',$subjectId)
                        ->first();
        if($_POST['name']=="" || $_POST['image']=="" || $_POST['desc']==""){
            $_SESSION['error'] = "Bạn chưa nhập đủ thông tin";
            header('location: ' . BASE_URL . 'mon-hoc/cap-nhat?id='.$subjectId);
        }
        else {
            $model->name = $_POST["name"];
            $model->image = $_POST["image"];
            $model->detail = $_POST["desc"];
            $model->author_id = $_SESSION['teacher_id'];
            $model->save();
            header('location: ' . BASE_URL . 'admin/mon-hoc');

            die;
        }
        }
        
    public function removeSubj($subjectId){
        $id = $subjectId;
        Subject::destroy($id);
        header('location: ' . BASE_URL . 'admin/mon-hoc');
        die;
    }
    
}
?>