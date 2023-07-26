@extends('layout')

@section('content')
    <!-- form start -->
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-8">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->ten }}">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nội dung công thức</label>
                    <input type="text" name="symbol" class="form-control" value="{{ $category->kyhieu }}">
                </div>

                <div class="form-group col-md-6">
                    <label>Loại lương</label>
                    <select name="type" class="form-control">
                        @if($category->loailuong==0)
                            <option value='0'>Lương cố định</option>
                            <option value='1'>Lương theo tháng</option>
                        @else
                            <option value='1'>Lương theo tháng</option>
                            <option value='0'>Lương cố định</option>
                        @endif
                    </select>
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
