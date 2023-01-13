<!-- Lưu tại resources/views/product/index.blade.php -->
@extends('admin.admin_layout')
@section('title', 'Feedback')
@section('admin-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>FEEDBACK MESSAGE</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Feedback</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<input type="text" id="success" value="{{ (Session::has('success'))?(Session::get('success')):'false'}}" hidden>
<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
							<th>Action</th>

                        </tr>
                      </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            ?>
                            @foreach($contacts as $key=>$contact)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$contact->contact_name}}</td>
                                <td>{{$contact->contact_phone}}</td>
								<td><a href="{{ url('admin/feedback/detail/'.$contact->id) }}">{{ $contact->contact_mail }}</a></td>
                                <td>{{$contact->contact_message}}</td>
								<td class="text-left">
                                    <a class="btn btn-danger btn-sm" href="{{ url('admin/feedback/delete/'.$contact->id) }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                      </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
@endsection
@section('script-section')
<script>
    $(function() {
        $('#categories').DataTable({
            "pageLength" : 5,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
    window.onload = function(){
        var a = document.getElementById('success').value;
        if(a != 'false'){
            alertify.success(a);
        }
    }
</script>
@endsection