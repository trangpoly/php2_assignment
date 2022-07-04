<?php
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\QuestionController;
use App\Controllers\QuizController;
use App\Controllers\SubjectController;
use App\Controllers\ThongKeController;
use App\Models\User;

function applyRouting($url){
    $router = new RouteCollector();
    //Định nghĩa các url trong đây
    //C1:
    // $router->get('login', function(){
    //     $ctr = new LoginController();
    //     return $ctr->index();
    // });

    $router->get('/vardump', function(){
        $ids = [17, 19];
        $sub = User::whereIn('id', $ids)->get();
        echo "<pre>";
        var_dump($sub);
    });
    $router->get('/test', function(){
        return view('layouts.main',[]);
    });

    //C2:
    $router->get('login', [LoginController::class, 'index']);
    $router->post('login', [LoginController::class, 'checkLogin']);
    $router->get('logout', [LoginController::class, 'logout']);
    $router->get('dashboard', [DashboardController::class, 'index']);
    $router->group(['prefix' => 'admin'], function($router){
        $router->get('dashboard', [DashboardController::class, 'index']);
        $router->group(['prefix'=>'mon-hoc'], function($router){
            $router->get('/', [SubjectController::class, 'allSubj']);
            $router->get('tao-moi', [SubjectController::class, 'addSubj']);
            $router->post('tao-moi', [SubjectController::class, 'saveSubj']);
            $router->get('{subjectId}', [SubjectController::class, 'removeSubj']);
            $router->get('{subjectId}/cap-nhat', [SubjectController::class, 'updateSubj']);
            $router->post('{subjectId}/cap-nhat', [SubjectController::class, 'saveUpdateSubj']);
        });
        $router->group(['prefix'=>'quiz'], function($router){
            $router->get('/', [QuizController::class, 'quiz_All']);
            $router->get('tao-moi', [QuizController::class, 'addQuiz']);
            $router->post('tao-moi', [QuizController::class, 'saveQuiz']);
            $router->get('{quizId}', [QuizController::class, 'removeQuiz']);
            $router->get('{quizId}/cap-nhat', [QuizController::class, 'updateQuiz']);
            $router->post('{quizId}/cap-nhat', [QuizController::class, 'saveUpdateQuiz']);
        });
        $router->group(['prefix'=>'question'], function($router){
            $router->get('/', [QuestionController::class, 'question_All']);
            $router->get('tao-moi', [QuestionController::class, 'addQuestion']);
            $router->post('tao-moi', [QuestionController::class, 'saveQuestion']);
            $router->get('{questionId}/info', [QuestionController::class, 'question_Info']);
            $router->get('{questionId}', [QuestionController::class, 'removeQuestion']);
            $router->get('{questionId}/cap-nhat', [QuestionController::class, 'updateQuestion']);
            $router->post('{questionId}/cap-nhat', [QuestionController::class, 'saveUpdateQuestion']);
        });
        $router->group(['prefix'=>'thong-ke'], function($router){
            $router->get('/', [ThongKeController::class, 'thongKeMonHoc']);
            $router->get('/list_teacher', [ThongKeController::class, 'listTeacher']);
            $router->get('/list_student', [ThongKeController::class, 'listStudent']);
            $router->get('/quiz/{quizId}', [ThongKeController::class, 'getQuiz']);
            // $router->get('{questionId}', [QuestionController::class, 'removeQuestion']);
            // $router->get('{questionId}/cap-nhat', [QuestionController::class, 'updateQuestion']);
            // $router->post('{questionId}/cap-nhat', [QuestionController::class, 'saveUpdateQuestion']);
        });
    });

    $router->get('mon-hoc/{subjectId}/chi-tiet', [SubjectController::class, 'get']);
    $router->get('quiz/{quizId}', [QuizController::class, 'quizDetail']);
    $router->post('quiz/{quizId}', [QuizController::class, 'quizResult']);
    $dispatcher = new Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
        
    // Print out the value returned from the dispatched function
    echo $response;


//Bài mới


}
?>