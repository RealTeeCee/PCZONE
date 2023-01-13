@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">FAQ / VIEW</div>
<h2 class="text-center">VIEW FAQ</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
  <p class="float-right"><a href="{{URL::to('admin/create_FAQ')}}" class="btn btn-primary">Add coupon</a></p>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Question</th>
            <th>Answer</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            $message = Session::get('message');
            if($message){
                echo '<script>alert("'.$message.'");</script>';
                Session::put('message', null);
            }
        ?>

            @foreach($faqs as $key=>$faq)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$faq->question}}</td>
                <td>{{$faq->answer}}</td>
                <td>{{$faq->created_at}}</td>
                <td>
                    <a href="{{URL::to('admin/update_FAQ/'.$faq->id)}}" class="active" ui-toggle-class="" ><i  style="font-size:25px" class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{URL::to('admin/delete_FAQ/'.$faq->id)}}" class="active" ui-toggle-class="" onclick="return confirm('Do you wanna delete?')"><i style="font-size:25px')"><i style="font-size:25px" class="fa fa-trash text-danger text"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
  @endsection