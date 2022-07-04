@extends('layouts.main')
@section('title', 'Trang chủ')
@section('content')
        <div class="slide col-12 m-0 p-0">
            <img src="https://caodang.fpt.edu.vn/wp-content/uploads/Banner1-1.png" class="img-fluid col-12 p-0 m-0" alt="">
        </div>
        <div class="row col-10 m-auto">
            <h2 class="title col-5 ml-0 pl-0 mt-3">DANH SÁCH MÔN HỌC</h2>
            <div class="col-3"></div>
            <div class="input-group mb-3 col-3 mt-3">
                <input type="text" class="form-control" placeholder="Tìm kiếm..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </div>
        <div class="col-10 m-auto d-flex flex-column bd-highlight mb-3">
            @foreach($subjectDashboard as $sub )
                <div class="row p-2 bd-highlight border mt-2">
                    <img src="{{$sub->image}}" class="col-4" alt=""> 
                    <div class="content col-8">
                        <h3 class="nameSubj col-12 mt-4">{{$sub->name}}</h3>
                        <a href="{{BASE_URL . 'mon-hoc/'.$sub->id.'/chi-tiet'}}" class="ml-3 mt-3 btn btn-outline-dark">Xem khóa học</a>
                    </div>
                </div>
            @endforeach
        </div>
@endsection