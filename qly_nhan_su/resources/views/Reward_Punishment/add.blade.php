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
                <label>Ngày</label>
                <input type="date" name="day" class="form-control">
            </div>
            
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option value='0'>Đang xử lý</option>
                    <option value='1' >Đã xử lý</option>
                </select>
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
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>

        @csrf
    </form>
@endsection

@section('footer')

@endsection
