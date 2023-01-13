@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">FAQ / CREATE</div>
<h2 class="text-center">UPDATE FAQ</h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_FAQ/'.$faq->id)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:30px">
            <label>Question</label>
            <input type="text" name="question" value="{{$faq->question}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Answer</label>
            <input type="text" name="answer" value="{{$faq->answer}}" class="form-control" style="width:650px">
        </div>
        <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection