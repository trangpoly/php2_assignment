@extends('layouts.main')
@section('title', 'Trang chủ')
@section('content')
<?php
use App\Models\Answer;
?>
        <div class="content col-10 m-auto pt-5">
        <div class="col-2 m-auto text-center p-2" style="height:50px;">
            <span id="hidden" hidden>{{$quiz["duration_minutes"]}}</span>
            <span id="time" class="hours"></span>
        </div>
            <h1 class="col-12 m-0 p-0">{{$quiz["name"]}}</h1>
                <span class="col-12 m-0 pl-2 text-secondary" style="font-size: 15pt;">{{isset($score_Quiz["score"])?$score_Quiz["score"]:"0"}} / 100 điểm</span>
            <form action="" method="POST">
                @foreach($question_All as $index => $question)
                    <div class="col-12 mt-3 p-0">
                    <h4 class="question text-danger border-bottom border-danger">Câu {{($index+1)}}:</h4>
                    <p class="border p-2">{{$question["name"]}}</p>
                    <div class="answers mt-3">
                        
                     @foreach(Answer::where('question_id',$question["id"])->get() as $key=>$answer)
                        
                        <div class="form-check border mt-2 p-2 pl-4">
                            <input class="form-check-input" type="radio" name="exampleRadios_{{$index}}" id="exampleRadios{{$index}}_{{$key}}" value="{{$answer['content']}}">
                            <label class="form-check-label" for="exampleRadios{{$index}}_{{$key}}">
                                {{$answer["content"]}}
                            </label>
                        </div>
                        
                    @endforeach 
                    </div>
                </div>
    
                @endforeach
                @if(isset($_SESSION['error']))
                    <p class="error text-danger font-weight-bolder mt-3">{{$_SESSION['error']}}</p>
                    @unset($_SESSION['error'])
                @endif 
                <button name="submit_quiz" class="mt-3 mb-3 col-2 btn btn-success">Kết thúc</button>
            </form>
        </div>
        
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            let timerID = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    alert('Bài Quiz đã kết thúc!');
                }
            }, 1000);
            setTimeout(() => { clearInterval(timerId); alert('Bài Quiz đã kết thúc'); }, 1000);
        }

        window.onload = function () {
            // console.log(document.querySelector('#time').innerHTML);
            // var duration_minutes = 10,
            var duration_minutes = 60 * document.querySelector('#hidden').innerHTML ,
                display = document.querySelector('#time');
            startTimer(duration_minutes, display);
        };
    </script>
@endsection