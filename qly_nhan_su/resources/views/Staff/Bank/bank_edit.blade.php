@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Tên ngân hàng:</label>
                    <input type="text" name="bank_name" class="form-control" value="{{ $bank->tennganhang }}">
                </div>
                
                <div class="form-group col-md-6">
                    <label>Số tài khoản:</label>
                    <input type="number" name="stk" class="form-control" value="{{ $bank->sotaikhoan }}">
                </div>
            </div>
            
            <div class="form-group float-right">
                <label>Chủ tài khoản:</label>
                <div>{{ $bank->nhanvien->ho. ' '. $bank->nhanvien->ten }}</div>
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
