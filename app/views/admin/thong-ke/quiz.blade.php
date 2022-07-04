@extends('layouts.navbar')
@section('title', $title)
@section('content')
<?php
use App\Models\Quiz;
use App\Models\StudentQuiz;
?>
                <h2 class="mt-5 ml-2 text-center">Thống kê Quiz</h2>
                <div class="col-11 m-auto">
                <table class="table table-hover col-12">
                        <thead>
                          <tr>
                            <th scope="col" class="col-1 text-center">STT</th>
                            <th scope="col" class="col-3 text-center">Quiz</th>
                            <th scope="col" class="col-3 text-center">Điểm trung bình</th>
                            <th scope="col" class="col-3 text-center">Điểm cao nhất</th>
                            <th scope="col" class="col-3 text-center">Điểm thấp nhất</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($getQuiz as $key=>$quiz)
                                <tr>
                                    <th scope="row" class="text-center">{{$key+1}}</th>
                                    <td class="text-center">{{$quiz["name"]}}</td>
                                    <td class="text-center"> 
                                        {{$max_score = StudentQuiz::where('quiz_id',$quiz["id"])->max('score')}}
                                        @if(isset($max_score))
                                            <!-- {{$max_score}} -->
                                        @else
                                            {{"Chưa có question"}}
                                        @endif
                                    </td>
                                    <td class="text-center"> Avg</td>
                                    <td class="text-center">
                                        {{$min_score = StudentQuiz::where('quiz_id',$quiz["id"])->min('score')}}
                                        @if(isset($min_score))
                                            <!-- {{$min_score}} -->
                                        @else
                                            {{"Chưa có question"}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
@endsection