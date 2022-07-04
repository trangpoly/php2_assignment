@extends('layouts.navbar')
@section('title', $title)
@section('content')
<?php
use App\Models\Quiz;
use App\Models\User;
?>
            <h2 class="mt-5 ml-2 text-center">Thống kê</h2>
                <div class="col-12 m-auto row">
                <p class="col-12 ml-5 font-weight-bold">Tổng số User: {{$count_User}}</p>
                    <div class="card mt-0 m-5 " style="width: 18rem;">
                        <img src="https://snipstock.com/assets/cdn/png/86fa6d139a1d18fb427a1c264dde84c6.png" class="card-img-top" alt="...">
                        <div class="card-body" style="min-height:100px; padding-bottom:10;">
                            <h5 class="card-title">Giáo viên</h5>
                            <p class="card-text">Tổng: {{$count_Teacher = User::where('role_id',1)->count()}}</p>
                            <a href="{{BASE_URL . 'admin/thong-ke/list_teacher'}}" class="btn btn-outline-dark">Xem chi tiết</a>
                        </div>
                    </div>
                    <div class="card mt-0 m-5 " style="width: 18rem;">
                        <img src="https://www.pngitem.com/pimgs/m/174-1746580_student-school-uniform-clip-art-student-png-clipart.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sinh viên</h5>
                            <p class="card-text">Tổng: {{$count_Student = User::where('role_id',0)->count()}}</p>
                            <a href="{{BASE_URL . 'admin/thong-ke/list_student'}}" class="btn btn-outline-dark">Xem chi tiết</a>
                        </div>
                    </div>
                <p class="col-12 ml-5 font-weight-bold">Tổng số Môn học: {{$count_Subject}}</p>
                        @foreach($subject_All as $subject)
                            <div class="card mt-0 m-5 " style="width: 18rem;">
                                <img src="{{$subject->image}}" class="card-img-top" alt="...">
                                <div class="card-body" style="min-height:100px; padding-bottom:10;">
                                    <h5 class="card-title">{{$subject["name"]}}</h5>
                                    <p class="card-text">Tổng: {{$count_Quiz = Quiz::where('subject_id',$subject["id"])->count()}} quiz</p>
                                    <a href="{{BASE_URL . 'admin/thong-ke/quiz/'. $subject['id']}}" class="btn btn-outline-dark">Xem chi tiết</a>
                                </div>
                            </div>
                        @endforeach
                </div>
@endsection