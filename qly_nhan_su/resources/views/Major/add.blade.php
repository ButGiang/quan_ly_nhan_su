@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên chuyên ngành</label>
                <input type="text" name="name" class="form-control" placeholder="Enter major's name">
            </div> 
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
        
        @csrf
    </form>
@endsection
