@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Tên nghiệp vụ</label>
                <input type="text" name="name" class="form-control" placeholder="Enter surname">
            </div>

            <div class="form-group">
                <label>Chuyên ngành</label>
                <select name="parent_id" class="form-control">
                    <option value='0'>Chuyên ngành chính</option>
                    @foreach($majors as $major) 
                        <option value='{{ $major->id }}'>{{ $major->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
            
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
        
        @csrf
    </form>
@endsection
