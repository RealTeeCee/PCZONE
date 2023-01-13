@extends('admin.admin_layout')
@section('admin-content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-center">Thêm Nhân Viên</h3>
                        </div>
                        <!-- /.card-header -->
                        @if (Session::has('success'))
                            <p>{{ Session::get('success') }}</p>
                        @endif
                        <!-- form start -->
                        <form role="form" action="{{ Route('admin_postCreate') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="Tên nhân viên">Tên nhân viên</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên nhân viên">
                                        @error('name')
                                        <div style="font-size:15px; color:red">{{ $message }}</div>
                                         @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Chức vụ">Chức Vụ</label>
                                    <input type="text" class="form-control" name="chucvu" value="Nhân viên" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email nhân viên" >
                                    @error('email')
                                    <div style="font-size:15px; color:red">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Mật khẩu">Mật khẩu</label>
                                    <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu nhân viên" >
                                    @error('password')
                                    <div style="font-size:15px; color:red">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Xác nhận mật khẩu">Xác nhận mật khẩu</label>
                                    <input type="text" class="form-control" name="repeat_password" placeholder="Nhập lại mật khẩu nhân viên để xác nhận" >
                                    @error('repeat_password')
                                    <div style="font-size:15px; color:red">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="txtPrice">Số điện thoại</label>
                                    <input type="text" class="form-control"  name="phone"
                                        placeholder="Nhập số điện thoại">
                                        @error('phone')
                                        <div style="font-size:15px; color:red">{{ $message }}</div>
                                         @enderror
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <textarea class="form-control" rows="5" name="address" placeholder="Nhập địa chỉ"></textarea>
                                    @error('address')
                                    <div style="font-size:15px; color:red">{{ $message }}</div>
                                     @enderror
                                </div>
                                <input type="hidden" name="boss" value="3">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary ">Thêm nhân viên</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
