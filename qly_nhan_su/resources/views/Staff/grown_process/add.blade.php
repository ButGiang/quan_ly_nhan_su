@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Trình độ học vấn</label>
                    <select name="tdhv" class="form-control">
                        <option value='0' >Cấp 3</option>
                        <option value='1'>Cao đẳng</option>
                        <option value='2' >Đại học</option>
                        <option value='3'>Cao học</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Ảnh của TĐHV</label>
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
                <div class="form-group col-md-12">
                    <label>Mô tả kinh nghiệm làm việc</label>
                    <textarea name="exp" class="form-control"></textarea>
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
