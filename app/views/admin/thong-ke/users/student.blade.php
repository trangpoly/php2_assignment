@extends('layouts.navbar')
@section('title', $title)
@section('content')
<?php
use App\Models\User;
?>
                <h2 class="mt-5 ml-2 text-center">Danh sách sinh viên</h2>
                <div class="col-11 m-auto">
                <table class="table table-hover col-12">
                        <thead>
                          <tr>
                            <th scope="col" class="col-1 text-center">STT</th>
                            <th scope="col" class="col-3 text-center">Tên giáo viên</th>
                            <th scope="col" class="col-1 text-center">Ảnh</th>
                            <th scope="col" class="col-3 text-center">Email</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($listStudent as $key=>$student)
                                <tr>
                                    <th scope="row" class="text-center">{{$key+1}}</th>
                                    <td class="text-center">{{$student["name"]}}</td>
                                    <td class="text-center"><img src="{{$student['avatar']}}" class="col-10" alt=""></td>
                                    <td class="text-center">{{$student["email"]}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
@endsection