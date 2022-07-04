<?php 
namespace App\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;

class QuestionController {
    public function question_All(){
        $question_All = Question::all();
        $title = "Dashboard - Question";
        // include_once './app/views/admin/question/question.php';
        return view('admin.question.question',[
            'question_All' => $question_All,
            'title' => $title
        ]);
    }
    public function question_Info($questionId){
        $question_info = Question::where('id',$questionId)
                                    ->first();
        $quiz_All = Quiz::all();
        $quiz_detail = Quiz::where('id',$question_info["quiz_id"])
                            ->first();
        $subject_detail = Subject::where('id',$quiz_detail["subject_id"])
                                    ->first();
        $answer_All = Answer::where('question_id',$question_info["id"])
                            ->get();
        // include_once './app/views/admin/question/info.php';
        return view('admin.question.info', [
            'question_info' => $question_info,
            'quiz_All' => $quiz_All,
            'quiz_detail' => $quiz_detail,
            'subject_detail' => $subject_detail,
            'answer_All' => $answer_All
        ]);
    }
    public function addQuestion(){
        $quiz_All = Quiz::all();
        // include_once './app/views/admin/question/add.php';
        return view('admin.question.add',[
            'quiz_All' => $quiz_All
        ]);
    }
    public function saveQuestion(){
        $model1 = new Question();
        if($_POST['name']=="" || $_POST['quiz_id']=="" || $_POST['answer1']=="" || $_POST['answer2']=="" || $_POST['answer3']=="" || $_POST['answer4']==""){
            $_SESSION['error'] = "Vui lòng kiểm tra lại thông tin!";
            // var_dump($_GET['id']) ;
            header('location: '. BASE_URL.'question/tao-moi');
        }
        else {
            $model1->name = $_POST["name"];
            $model1->quiz_id = $_POST["quiz_id"];
            $model1->img = $_POST["img"];
            $model1->save();
            $question = Question::orderByDesc('id')
                                ->first();
            
            //0 là đúng 1 là sai
            $model2 = new Answer();
            if($_POST['is_correct']==1){
                $model2->content = $_POST["answer1"];
                $model2->question_id = $question["id"];
                $model2->is_correct= 0;
            }
            else {
                $model2->content = $_POST["answer1"];
                $model2->question_id = $question["id"];
                $model2->is_correct= 1;
            }
            $model2->save();
            //
            $model3 = new Answer();
            if($_POST['is_correct']==2){
                $model3->content = $_POST["answer2"];
                $model3->question_id = $question["id"];
                $model3->is_correct= 0;
            }
            else {
                $model3->content = $_POST["answer2"];
                $model3->question_id = $question["id"];
                $model3->is_correct= 1;    
            }

            $model3->save();
            //
            $model4 = new Answer();
            if($_POST['is_correct']==3){
                $model4->content = $_POST["answer3"];
                $model4->question_id = $question["id"];
                $model4->is_correct= 0;
            }
            else {
                $model4->content = $_POST["answer3"];
                $model4->question_id = $question["id"];
                $model4->is_correct= 1;
            }
            $model4->save();
            //
            $model5 = new Answer();
            if($_POST['is_correct']==4){
                $model5->content = $_POST["answer4"];
                $model5->question_id = $question["id"];
                $model5->is_correct= 0;
            }
            else {
                $model5->content = $_POST["answer4"];
                $model5->question_id = $question["id"]; 
                $model5->is_correct= 1;
            }
            $model5->save();
            
            header('location: ' . BASE_URL . 'admin/question');

        }
    }
    public function updateQuestion($questionId){
        $quiz_All = Quiz::all();
        $question_detail = Question::where('id',$questionId)
                        ->first();
        $quiz_detail = Quiz::where('id',$question_detail["quiz_id"])
                        ->first();
        $subject_detail = Subject::where('id',$quiz_detail["subject_id"])
                        ->first();
                        
        $answer_All = Answer::where('question_id',$question_detail["id"])
                            ->get();
        
        return view('admin.question.update',[
            'quiz_All' => $quiz_All,
            'question_detail' => $question_detail,
            'quiz_detail' => $quiz_detail,
            'subject_detail' => $subject_detail,
            'answer_All' => $answer_All
        ]);
    }
    public function saveUpdateQuestion($questionId){
        $model= Question::find($questionId);
        // echo "<pre>";
        var_dump($model['id']);
        if($_POST['name']=="" || $_POST['quiz_id']=="" || $_POST['answer1']=="" || $_POST['answer2']=="" || $_POST['answer3']=="" || $_POST['answer4']==""){
            $_SESSION['error'] = "Vui lòng kiểm tra lại thông tin!";
            // var_dump($_GET['id']) ;
            header('location: '. BASE_URL.'question/cap-nhat?id='.$questionId);
        }
        else {
            $model ->name = $_POST['name'];
            $model ->img = $_POST['img'];
            $model->save();
            // $question = Question::orderByDesc('id')
            //             ->first();
            // var_dump($question['id']);
            // echo $question->id;
            $model2= Answer::where('question_id',$model['id'])
                            ->get();
            // echo "<pre>";
            // var_dump($model2[1]);
            if($_POST['is_correct']==1){
                $model2[0]->content = $_POST["answer1"];
                $model2[0]->question_id = $model["id"];
                $model2[0]->is_correct= 0;
            }
            else {
                $model2[0]->content = $_POST["answer1"];
                $model2[0]->question_id = $model["id"];
                $model2[0]->is_correct= 1;
            }
            $model2[0]->save();
            
            if($_POST['is_correct']==2){
                $model2[1]->content = $_POST["answer2"];
                $model2[1]->question_id = $model["id"];
                $model2[1]->is_correct= 0;
            }
            else {
                $model2[1]->content = $_POST["answer2"];
                $model2[1]->question_id = $model["id"];
                $model2[1]->is_correct= 1;
            }
            $model2[1]->save();

            if($_POST['is_correct']==3){
                $model2[2]->content = $_POST["answer3"];
                $model2[2]->question_id = $model["id"];
                $model2[2]->is_correct= 0;
            }
            else {
                $model2[2]->content = $_POST["answer3"];
                $model2[2]->question_id = $model["id"];
                $model2[2]->is_correct= 1;
            }
            $model2[2]->save();

            if($_POST['is_correct']==4){
                $model2[3]->content = $_POST["answer4"];
                $model2[3]->question_id = $model["id"];
                $model2[3]->is_correct= 0;
            }
            else {
                $model2[3]->content = $_POST["answer4"];
                $model2[3]->question_id = $model["id"];
                $model2[3]->is_correct= 1;
            }
            $model2[3]->save();
            // echo "<pre>";
            // var_dump($data1);
            
            


            header('location: ' . BASE_URL . 'admin/question');
            die;

        }
        
    }
    public function removeQuestion($questionId){
        $id = $questionId;
        Question::destroy($id);
        header('location: ' . BASE_URL . 'admin/question');
        die;
    }
       
}

?>