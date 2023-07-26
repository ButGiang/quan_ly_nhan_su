@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-8">
                    <label>Tên danh mục</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>
            </div>
                
            <div class="row">
                <div class="form-group col-md-6">
                    <label>ký hiệu viết tắt</label>
                    <input type="text" name="symbol" class="form-control" placeholder="Enter acronym">
                </div>

                <div class="form-group col-md-6">
                    <label>Loại lương</label>
                    <select name="type" class="form-control">
                        <option value='0'>Lương cố định</option>
                        <option value='1'>Lương theo tháng</option>
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
