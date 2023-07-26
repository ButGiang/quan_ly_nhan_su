@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Tên ngân hàng</label>
                    <input type="text" name="bank_name" class="form-control" placeholder="Bank's name">
                </div>

                <div class="form-group col-md-6">
                    <label>Số tài khoản</label>
                    <input type="number" name="stk" class="form-control">
                </div>
            </div>
            
            <div class="row">
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
