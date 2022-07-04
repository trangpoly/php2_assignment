@extends('layouts.main')
@section('title', $title)
@section('content')
        <div class="slide col-12 m-0 p-0">
            <img src="https://caodang.fpt.edu.vn/wp-content/uploads/Banner1-1.png" class="img-fluid col-12 p-0 m-0" alt="">
        </div>
        <div class="row col-10 m-auto pt-5">
            <div class="col-5">
                <img src="{{$subject_detail->image}}" class="img-fluid" alt="">
            </div>
            <div class="col-5">
                <h1 class="title ">{{$subject_detail->name}}</h1>
                <p class="desc">{{$subject_detail->detail}}</p>
            </div>
            <div class="col-12 mt-3 mb-5">
                <h2>Danh sách Quiz</h2>
                <div class="list_quiz col-12 m-auto d-flex flex-column bd-highlight">
                    @foreach($quiz_All as $quiz)
                        <div class="row pt-3 bd-highlight border mt-2">
                        <div class="col-12 row m-0 p-0">
                            <a href="{{BASE_URL . 'quiz/'.$quiz->id}}" class="col-9">
                                <h4>{{$quiz->name}}</h4>
                                <p class="col-12">Start: {{$quiz->start_time}} -- End: {{$quiz->end_time}}</p>
                            </a>
                            
                        </div>
                        
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection