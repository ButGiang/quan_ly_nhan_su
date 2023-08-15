@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên chuyên ngành</label>
                <input type="text" name="name" class="form-control" placeholder="Enter major's name">
            </div> 

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="describe" class="form-control" ></textarea>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Thêm</button>
        </div>
        
        @csrf
    </form>
@endsection
