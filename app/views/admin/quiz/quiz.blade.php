@extends('layouts.navbar')
@section('title', $title)
@section('content')
<?php 
use App\Models\Subject;
?>
                <h2 class="mt-5 ml-2 text-center">Danh sách Quiz</h2>
                <form id="search_form" action="" method="get">
                        <div class="row col-11 m-auto">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Lọc quiz theo môn học</label>
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
                <a href="{{BASE_URL . 'admin/quiz/tao-moi'}}" class="btn btn-danger mb-2">Tạo quiz mới</a>
                <table class="table table-hover col-12">
                        <thead>
                          <tr>
                            <th scope="col" class="col-1 text-center">STT</th>
                            <th scope="col" class="col-1 text-center">Tên</th>
                            <th scope="col" class="col-2 text-center">Môn học</th>
                            <th scope="col" class="col-2 text-center">Thời gian làm bài</th>
                            <th scope="col" class="col-2 text-center">Thời gian mở</th>
                            <th scope="col" class="col-2 text-center">Thời gian đóng</th>
                            <th scope="col" class="col-2 text-center">Trạng thái</th>
                            <th scope="col" rowspan="2" class="col-1 text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($quizs as $key=>$quiz)
                                @foreach(Subject::where('id',$quiz["subject_id"])->get() as $subject)
                                    <tr>
                                        <th scope="row" class="text-center">{{$key+1}}</th>
                                        <td class="text-center">{{$quiz["name"]}}</td>
                                        <td class="text-center">{{$subject["name"]}}</td>
                                        <td class="text-center">{{$quiz["duration_minutes"]}} phút</td>
                                        <td class="text-center">{{$quiz["start_time"]}}</td>
                                        <td class="text-center">{{$quiz["end_time"]}}</td>
                                        <td class="text-center">{{$quiz["status"]==0?"Được làm":"Chưa được làm"}}</td>
                                        <td><a href="{{ BASE_URL . 'admin/quiz/' . $quiz['id'] .'/cap-nhat'}}"><i class="bi bi-eraser"></i></a></td>
                                        <td><a href="{{ BASE_URL . 'admin/quiz/' . $quiz['id'] }}"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                      </table>
@endsection
@section('script')
<script>
    $('#select_subject').on('change', function(){
        $('form#search_form').trigger('submit');
    })
</script>
@endsection