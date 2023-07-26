@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Tên công thức</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>
            </div>
                
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Chi tiết cách tính</label>
                    <textarea name="formula" class="form-control" placeholder="Enter formula"></textarea>
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
