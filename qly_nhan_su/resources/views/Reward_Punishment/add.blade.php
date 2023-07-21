@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Phân loại</label>
                <select name="phanloai" class="form-control">
                    <option value='1'>Thưởng</option>
                    <option value='0' >Phạt</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control"></textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ngày</label>
                    <input type="date" name="day" class="form-control" value="{{ $day }}">
                </div>
    
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

@section('footer')

@endsection
