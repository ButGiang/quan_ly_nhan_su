@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Số tiền (đồng)</label>
                        <input type="number" name="money" class="form-control" min="1000000" value="{{ $advSalary->sotien }}" step="100000">
                    </div>
        
                    <div class="form-group">
                        <label>Ngày</label>
                        <input type="date" name="day" class="form-control" value="{{ $advSalary->ngay }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                            @if($advSalary->trangthai==1)
                                <option value='1' >Đã xử lý</option>
                                <option value='0'>Đang xử lý</option>
                                <option value='-1'>Đã hủy</option>
                            @elseif($advSalary->trangthai==0)
                                <option value='0'>Đang xử lý</option>
                                <option value='1' >Đã xử lý</option>
                                <option value='-1'>Đã hủy</option>
                            @else
                                <option value='-1'>Đã hủy</option>
                                <option value='0'>Đang xử lý</option>
                                <option value='1' >Đã xử lý</option>                        
                            @endif       
                        </select>
                    </div>
                </div>

                <div class="col-md-6">              
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="content" class="form-control" style="min-height: 210px;">{{ $advSalary->ghichu }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label>Người duyệt đơn:</label>
                    <div>{{ $advSalary->nguoiduyet->ho. ' '. $advSalary->nguoiduyet->ten }}</div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Cập nhật</button>
        </div>
        
        @csrf
    </form>
@endsection
