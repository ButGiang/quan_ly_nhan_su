@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Mã bảo hiểm</label>
                    <input type="text" name="insurance_number" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label>Nơi đăng ký</label>
                    <input type="text" name="place" class="form-control">
                </div>

                <div class="form-group col-md-4">
                    <label>Ngày đăng ký</label>
                    <input type="date" name="day" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nơi khám bệnh</label>
                    <input type="text" name="hospital_place" class="form-control">
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
