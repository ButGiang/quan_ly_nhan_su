@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Số tiền (đồng)</label>
                        <input type="number" name="money" class="form-control" min="1000000" value="1000000" step="100000">
                    </div>
        
                    <div class="form-group">
                        <label>Ngày</label>
                        <input type="date" name="day" class="form-control" value="{{ $date }}">
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
                <div class="col-md-6">              
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="content" class="form-control" style="min-height: 210px;"></textarea>
                    </div>
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
