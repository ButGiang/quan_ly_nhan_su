@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Phân loại</label>
                <input type="number" name="phanloai" class="form-control" min="0" max="1" value="{{ $re_pu->phanloai }}">
            </div>

            <div class="form-group">
                <label>Ngày</label>
                <input type="date" name="day" class="form-control" value="{{ $re_pu->ngay }}">
            </div>
            
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control">{{ $re_pu->noidung }}</textarea>
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    @if($re_pu->trangthai==1)
                        <option value='1' >Đã xử lý</option>
                        <option value='0'>Đang xử lý</option>
                    @else
                    <option value='0'>Đang xử lý</option>
                        <option value='1' >Đã xử lý</option>
                    @endif       
                </select>
            </div>

            <div class="form-group">
                <label>Nhân viên</label>
                <select name="staff" class="form-control">
                    <option value='{{ $re_pu->id }}'>{{ $re_pu->nhanvien->ho. ' '. $re_pu->nhanvien->ten}}</option>
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
