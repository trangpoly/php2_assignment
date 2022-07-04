<?php
namespace App\Controllers;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\StudentQuiz;
use App\Models\Subject;

class QuizController{
    public function quiz_All(){
        $subjects = Subject::all();
        $subjectId = isset($_GET['subject_id']) ? $_GET['subject_id'] : "Tất cả";
        $quizs = Quiz::where('subject_id', $subjectId)->get();
        if($subjectId == 0){
            $quizs = Quiz::all();
        }
        else {
            $quizs = Quiz::where('subject_id', $subjectId)->get();
        }
        
        
        $title = "Dashboard - Quiz";
        // include_once "./app/views/admin/quiz/quiz.php";
        return view('admin.quiz.quiz',[
            // 'quiz_All' => $quiz_All,
            'title' => $title,
            'subjects' => $subjects,
            'subjectId' => $subjectId,
            'quizs' => $quizs
        ]);
    }
    public function addQuiz(){
        $subject_All = Subject::all();
        // include_once "./app/views/admin/quiz/add.php";
        return view('admin.quiz.add',[
            'subject_All' => $subject_All
        ]);
    }
    public function saveQuiz(){
        $model = new Quiz();
        if($_POST['name']=="" || $_POST['duration_minutes']=="" || $_POST['time_start']=="" || $_POST['time_end']==""|| $_POST['status']==""){
            $_SESSION['error'] = "Vui lòng kiểm tra lại thông tin!";
            // var_dump($_GET['id']) ;
            header('location: '. BASE_URL.'quiz/tao-moi?id='.$_GET['id']);
        }
        else {
            $check_name = Quiz::where('name',$_POST['name'])
                                ->where('subject_id',$_POST['subject_id'])
                                ->first();
            if(isset($check_name["name"])){
                $_SESSION['error'] = "Tên quiz đã tồn tại!";
                header('location: '. BASE_URL.'quiz/tao-moi?id='.$_GET['id']);
                die;
            }
            $model->name = $_POST["name"];
            $model->subject_id = $_POST["subject_id"];
            $model->duration_minutes = $_POST["duration_minutes"];
            $model->start_time = $_POST["time_start"];
            $model->end_time = $_POST["time_end"];
            $model->status = $_POST["status"];
            $model->save();

            header('location: ' . BASE_URL . 'admin/quiz');

        }
        
    }
    public function removeQuiz($quizId){
        $id = $quizId;
        $sub = Quiz::where('id',$id)
                    ->first();
        Quiz::destroy($id);
        header('location: ' . BASE_URL . 'admin/quiz');
        die;
    }
    public function updateQuiz($quizId){
        $subject_All = Subject::all();
        $quiz_detail = Quiz::where('id',$quizId)
                            ->first();
        $subject_detail = Subject::where('id',$quiz_detail["subject_id"])
                                 ->first();
        include_once "./app/views/admin/quiz/update.php";
    }
    public function saveUpdateQuiz($quizId){
        $model= Quiz::find($quizId);
        if($_POST['name']=="" || $_POST['duration_minutes']=="" || $_POST['time_start']=="" || $_POST['time_end']==""|| $_POST['status']==""){
            $_SESSION['error'] = "Vui lòng kiểm tra lại thông tin!";
            // var_dump($_GET['id']) ;
            header('location: '. BASE_URL.'admin/quiz/'.$quizId.'/cap-nhat');
        }
        else {
            $check_name = Quiz::where('name',$_POST['name'])
                                ->where('subject_id',$_POST['subject_id'])
                                ->where('id','!=',$_GET['id'])
                                ->first();
            if(isset($check_name["name"])){
                $_SESSION['error'] = "Tên quiz đã tồn tại!";
                header('location: '. BASE_URL.'admin/quiz/'.$quizId.'/cap-nhat');
                die;
            }

            $model->name = $_POST["name"];
            $model->subject_id = $_POST["subject_id"];
            $model->duration_minutes = $_POST["duration_minutes"];
            $model->start_time = $_POST["time_start"];
            $model->end_time = $_POST["time_end"];
            $model->status = $_POST["status"];
            $model->save();
            // var_dump($model);
            $sub = Quiz::where('id',$_GET['id'])
                            ->first();
            header('location: ' . BASE_URL . 'admin/quiz');
            die;

        }
        
    }
    public function quizDetail ($quizId){
        $quiz = Quiz::where('id',$quizId)
                    ->first();
        $subject_detail = Subject::where('id',$quiz["subject_id"])
                                ->first();
        $title = $subject_detail["name"] ." - ". $quiz->name;
        $question_All = Question::where('quiz_id',$quizId)
                                ->get();
        $score_Quiz = StudentQuiz::where('student_id',$_SESSION['student_id'])
                                ->where('quiz_id',$quizId)
                                ->orderByDesc('id')
                                ->first();
        // include_once "./app/views/student/quiz/detail.php";
        return view('student.quiz.detail',[
            'quiz' => $quiz,
            'subject_detail' => $subject_detail,
            'title' => $title,
            'question_All' => $question_All,
            'score_Quiz' => $score_Quiz
        ]);
    }

    public function quizResult($quizId){
        $question_All = Question::where('quiz_id',$quizId)
                        ->get();
        $score_sum = count($question_All);
        $data = array();
        foreach($question_All as $index=>$question){
            if(isset($_POST["exampleRadios_".$index.""])){
                foreach(Answer::where('question_id',$question["id"])->where('is_correct',0)->get() as $answer){
                    if($_POST["exampleRadios_".$index.""]==$answer["content"]){
                        $data[] = $_POST["exampleRadios_".$index.""];    
                    }
                }
            }
            else {
                $_SESSION['error']="Bạn chưa điền hết đáp án!";
                header('location: '. BASE_URL.'quiz/'.$quizId);
                die;
            }
            

        }
        $score_real =100 / $score_sum * count($data);
        $model = new StudentQuiz();
        $db = [
            'student_id' => $_SESSION['student_id'],
            'quiz_id' => $quizId,
            'start_time' => "",
            'end_time' => "",
            'score' => $score_real,
            "old" => "",
        ];
        $model->insert($db);
        $quiz = Quiz::where('id',$quizId)->first();
        $subject_detail = Subject::where('id',$quiz->subject_id)->first();
        header('location: ' . BASE_URL . 'mon-hoc/'. $subject_detail["id"] . '/chi-tiet');
        die;
    }
}
?>