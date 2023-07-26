@extends('layout')

@section('content')     
    <!-- form start -->
    <form action="/salary/fixed/add" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Số tiền</label>
                    <input type="number" name="money" class="form-control" value="100000" step="100000">
                </div>
            </div>
                
                <div class="form-group">
                    <input type="hidden" name="staff" class="form-control" value="{{ $staff }}">
                </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label>Danh mục lương</label>
                    <select name="category" class="form-control">
                        @foreach($category as $item)
                            <option value='{{ $item->id_dml }}'>{{ $item->ten }}</option>
                        @endforeach
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
