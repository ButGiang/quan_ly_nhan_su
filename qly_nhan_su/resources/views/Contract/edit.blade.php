@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Ngày kí</label>
                <input type="date" name="signing_day" class="form-control" value="{{ $contract->ngayki }}">
            </div>

            <div class="form-group">
                <label>Ngày bắt đầu theo hợp đồng</label>
                <input type="date" name="start_day" class="form-control" value="{{ $contract->ngaybatdau }}">
            </div>
            
            <div class="form-group">
                <label>Ngày kết thúc theo hợp đồng</label>
                <input type="date" name="end_day" class="form-control" value="{{ $contract->ngayketthuc }}">
            </div>

            <div class="form-group">
                <label>Nội dung hợp đồng</label>
                <textarea name="content" class="form-control">{{ $contract->noidung }}</textarea>
            </div>

            <div class="form-group">
                <label>Hệ số lương</label>
                <input type="number" name="salary" class="form-control" value="{{ $contract->hesoluong }}" step="0.01" min="0">
            </div>

            <div class="form-group">
                <label>Nhân viên</label>
                <select name="staff" class="form-control">
                    <option value='{{ $contract->id }}'>{{ $contract->nhanvien->ho. ' '. $contract->nhanvien->ten}}</option>
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
