@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Ngày kí</label>
                <input type="date" name="signing_day" class="form-control" value="{{ $contract->ngayki }}">
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Ngày bắt đầu theo hợp đồng</label>
                    <input type="date" name="start_day" class="form-control" value="{{ $contract->ngaybatdau }}">
                </div>
                
                <div class="form-group col-md-6">
                    <label>Ngày kết thúc theo hợp đồng</label>
                    <input type="date" name="end_day" class="form-control" value="{{ $contract->ngayketthuc }}">
                </div>
            </div>

            <div class="form-group">
                <label>Nội dung hợp đồng</label>
                <textarea name="content" class="form-control">{{ $contract->noidung }}</textarea>
            </div>

            <div class="form-group">
                <label>Chủ hợp đồng:</label>
                <div>{{ $contract->nhanvien->ho. ' '. $contract->nhanvien->ten}}</div>
            </div>

            <div class="form-group float-right">
                <label>Người tạo hợp đồng:</label>
                <div>{{ $contract->nguoitaohopdong->ho. ' '. $contract->nguoitaohopdong->ten }}</div>
            </div>
        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
        </div>

        @csrf
    </form>
@endsection

@section('footer')

@endsection
