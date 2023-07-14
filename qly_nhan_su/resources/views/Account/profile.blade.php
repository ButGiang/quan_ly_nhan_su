@extends('layout')

@section('content')
    <?php 
        $avatar = Auth::user()->avatar;
    ?>

    <!-- form start -->
    <form action="/profile" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">    
                <label>Họ & tên đệm</label>
                <input type="text" name="first_name" value="{{ $nhanvien->value('ho') }}" class="form-control" placeholder="Nhập Họ và tên đệm">
            </div>

            <div class="form-group">    
                <label>Tên</label>
                <input type="text" name="last_name" value="{{ $nhanvien->value('ten') }}" class="form-control" placeholder="Nhập Tên">
            </div>

            <div class="form-group">    
                <label>Ngày sinh</label>
                <input type="text" name="birthday" value="{{ $nhanvien->value('ngaysinh') }}" class="form-control" placeholder="Nhập Ngày sinh">
            </div>

            <div class="form-group">    
                <label>CCCD</label>
                <input type="text" name="CCCD" value="{{ $nhanvien->value('CCCD') }}" class="form-control" placeholder="Nhập CCCD">
            </div>

            <div class="form-group">    
                <label>Email</label>
                <input type="email" name="email" value="{{ $nhanvien->value('email') }}" class="form-control" placeholder="Nhập email">
            </div>

            <div class="form-group">    
                <label>Địa chỉ</label>
                <input type="text" name="address" value="{{ $nhanvien->value('diachi') }}" class="form-control" placeholder="Nhập địa chỉ">
            </div>

            <div class="form-group">    
                <label>Số điện thoại</label>
                <input type="text" name="phone" value="{{ $nhanvien->value('sdt') }}" class="form-control" placeholder="Nhập số điện thoại">
            </div>

            <div class="form-group">
                <label>Avatar</label>
                <input type="file" class="form-control" id="upload" name='avatar'>
                <div id="image_show">
                    <a href="{{ $avatar }}">
                        <img src="{{ $avatar }}" width="100px" height="120px" style="margin-top: 5px">
                    </a>
                </div>
                <input type="hidden" name="avatar" id="file" value="{{ $avatar }}">
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection
<div class="form-group">

    
    </div>