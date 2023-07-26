@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Họ & tên</label>
                    <select name="staff" id="name" class="form-control">
                        @foreach($staffs as $staff)
                            <option value='{{ $staff->id }}'>{{ $staff->ho }} {{ $staff->ten }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
            <button type="submit" class="btn btn-primary float-right">Next</button>
        </div>
        
        @csrf
    </form>
@endsection
