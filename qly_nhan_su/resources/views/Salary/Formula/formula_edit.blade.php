@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-5">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ $formula->ten }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label>Nội dung công thức</label>
                    <textarea name="formula" class="form-control">{{ $formula->congthuc }}</textarea>
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

@section('footer')

@endsection
