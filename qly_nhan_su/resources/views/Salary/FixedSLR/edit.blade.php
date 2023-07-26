@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Số tiền</label>
                    <input type="number" name="money" class="form-control" value="{{ $LCD->sotien }}" step="100000">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label>Danh mục lương: </label><br>
                    <label>{{ $LCD->danhmucluong->ten }}</label>
                </div>
                                
                <div class="form-group col-md-12">
                    <label class="float-right">Nhân viên: {{ $LCD->nhanvien->ho. ' '. $LCD->nhanvien->ten }}</label>
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
