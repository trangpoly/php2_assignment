@extends('layouts.navbar')
@section('title', $title)
@section('content')
<?php 
use App\Models\Quiz;
use App\Models\Subject;
?>
                <h2 class="mt-5 ml-2 text-center">Danh sách câu hỏi</h2>
                <form id="search_form" action="" method="get">
                    <div class="row col-11 m-auto">
                      <label for="" class="col-12">Lọc câu hỏi</label>
                        <div class="col-4">
                            <div class="form-group">
                                <select id="select_subject" name="subject_id" class="form-control">
                                    <option value="0">Tất cả</option>
                                    @foreach ($subjects as $item)
                                        <option {{$item->id == $subjectId ? "selected" : "" }} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select id="select_subject" name="subject_id" class="form-control">
                                    <option value="0">Tất cả</option>
                                    @foreach ($subjects as $item)
                                        <option {{$item->id == $subjectId ? "selected" : "" }} value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-11 m-auto">
                <a href="{{BASE_URL . 'admin/question/tao-moi'}}" class="btn btn-danger mb-2">Tạo câu hỏi mới</a>
                <table class="table table-hover col-12">
                        <thead>
                          <tr>
                            <th scope="col" class="col-1 text-center">STT</th>
                            <th scope="col" class="col-3 text-center">Tên</th>
                            <th scope="col" class="col-2 text-center">Ảnh mô tả (nếu có)</th>
                            <th scope="col" class="col-3 text-center">Tên Quiz - Môn học</th>
                            <th scope="col" rowspan="2" class="col-1 text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($question_All as $key=>$question)
                                @foreach(Quiz::where('id',$question["quiz_id"])->get() as $quiz)
                                    @foreach(Subject::where('id',$quiz["subject_id"])->get() as $subject)
                                        <tr>
                                            <th scope="row" class="text-center">{{$key+1}}</th>
                                            <td class="text-center">{{$question["name"]}}</td>
                                            <td class="text-center"><img src="{{$question['image']}}" class="col-10" alt=""></td>
                                            <td class="text-center">{{$quiz["name"]}} - {{$subject["name"]}}</td>
                                            <td><a href="{{BASE_URL . 'admin/question/' . $question['id'] .'/info'}}"><i class="bi bi-eye"></i></a></td>
                                            <td><a href="{{BASE_URL . 'admin/question/'. $question['id'] .'/cap-nhat'}}"><i class="bi bi-eraser"></i></a></td>
                                            <td><a href="{{BASE_URL . 'admin/question/' . $question['id']}}"><i class="bi bi-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endforeach 
                            @endforeach
                        </tbody>
                      </table>
@endsection