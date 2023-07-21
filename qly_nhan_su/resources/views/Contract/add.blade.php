@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Ngày kí</label>
                <input type="date" name="signing_day" class="form-control" value="{{ $date }}">
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ngày bắt đầu theo hợp đồng</label>
                    <input type="date" name="start_day" class="form-control">
                </div>
                
                <div class="form-group col-md-6">
                    <label>Ngày kết thúc theo hợp đồng</label>
                    <input type="date" name="end_day" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>Nội dung hợp đồng</label>
                <textarea name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Nhân viên</label>
                <select name="staff" class="form-control">
                    @foreach($staffs as $staff) 
                        <option value='{{ $staff->id }}'>{{ $staff->ho. ' '. $staff->ten }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Thêm</button>
        </div>
        
        @csrf
    </form>
@endsection
