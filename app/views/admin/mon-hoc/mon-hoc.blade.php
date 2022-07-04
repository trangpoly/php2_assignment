@extends('layouts.navbar')
@section('title', $title)
@section('content')
<?php
use App\Models\User;
?>
                <h2 class="mt-5 ml-2 text-center">Danh sách môn học</h2>
                <div class="col-11 m-auto">
                <a href="{{BASE_URL . 'admin/mon-hoc/tao-moi'}}" class="btn btn-danger">Tạo khóa học mới</a>
                <table class="table table-hover col-12">
                        <thead>
                          <tr>
                            <th scope="col" class="col-1 text-center">STT</th>
                            <th scope="col" class="col-2 text-center">Tên</th>
                            <th scope="col" class="col-3 text-center">Ảnh</th>
                            <th scope="col" class="col-3 text-center">Mô tả</th>
                            <th scope="col" class="col-2 text-center">Giáo viên</th>
                            <th scope="col" rowspan="2" class="col-1 text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($subject_All as $key=>$subject)
                                <tr>
                                    <th scope="row" class="text-center">{{$key+1}}</th>
                                    <td class="text-center">{{$subject["name"]}}</td>
                                    <td><img src="{{$subject['image']}}" class="col-10" alt=""></td>
                                    <td>{{$subject["detail"]}}</td>
                                    <td class="text-center">{{ $author = User::where('id',$subject["author_id"])->first()["name"]}}</td>
                                    <td><a href="{{ BASE_URL . 'admin/mon-hoc/'. $subject['id']. '/cap-nhat' }}"><i class="bi bi-eraser"></i></a></td>
                                    <td><a href="{{ BASE_URL . 'admin/mon-hoc/' . $subject['id'] }}"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
@endsection