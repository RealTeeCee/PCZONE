@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">FAQ / CREATE</div>
<h2 class="text-center">CREATE FAQ</h1>
        <?php
            $i = 1;
        ?>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_FAQ')}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:30px">
            <label>Question</label>
            <input type="text" name="question" value="{{old('question')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Answer</label>
            <textarea name="answer" class="form-control" style="width:650px;height:10%;" rows="4" cols="50" value="{{old('answer')}}">
            </textarea>
            </div>
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection