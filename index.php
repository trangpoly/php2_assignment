<?php
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/utils.php';
require_once './commons/routing.php';

// use App\Controllers\DashboardController;
// use App\Controllers\LoginController;
// use App\Controllers\QuestionController;
// use App\Controllers\QuizController;
// use App\Controllers\SubjectController;
// use App\Controllers\ThongKeController;
// use App\Models\Question;
// use App\Models\Quiz;

session_start();
$url = isset($_GET['url']) ? $_GET['url'] : "/";
// var_dump($url);
// die;
applyRouting($url);
?>