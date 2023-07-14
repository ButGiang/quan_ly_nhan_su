@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên phòng ban</label>
                <input type="text" name="name" class="form-control"  value="{{ $department->ten }}" placeholder="Enter name">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>

        @csrf
    </form>
@endsection

@section('footer')

@endsection
