@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên phòng ban</label>
                <input type="text" name="name" class="form-control" placeholder="Enter department's name">
            </div> 
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
        
        @csrf
    </form>
@endsection
