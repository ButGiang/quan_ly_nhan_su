@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Loại thành tựu</label>
                    <select name="ach_type" class="form-control">
                        <option value='0' >Bằng cấp</option>
                        <option value='1'>Chứng chỉ</option>
                        <option value='2' >Thành tích</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>Tên thành tựu</label>
                    <input type='text' name="name" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label>Ảnh xác thực</label>
                    <input type="file" class="form-control" id="upload" name='avatar'>
                    <div id="image_show">
                        <a href="{{ $avatar }}">
                            <img src="{{ $avatar }}" width="100px" height="120px" style="margin-top: 5px">
                        </a>
                    </div>
                    <input type="hidden" name="avatar" id="file" value="{{ $avatar }}">
                </div>
    
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ngày cấp</label>
                    <input type="date" class="form-control" name='degree_day'>
                </div>

                <div class="form-group col-md-6">
                    <label>Mô tả (không bắt buộc)</label>
                    <textarea name="desc" class="form-control"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6"></div>
                <div class="form-group col-md-6">
                    <label>Nhân viên</label>
                    <select name="staff" class="form-control">
                        @foreach($staffs as $staff) 
                            <option value='{{ $staff->id }}'>{{ $staff->ho. ' '. $staff->ten }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Thêm</button>
        </div>
        
        @csrf
    </form>
@endsection
