@extends('layout')

@section('content')
    <!-- form start -->
    <form>
        <div class="card-body">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Username: </label>
                    <label> {{ $taikhoan->value('email') }}</label>
                </div>

                <div class="form-group">
                    <label>Role: </label>
                    <label> 
                        @if($taikhoan->value('role')==1)
                            Admin
                        @else
                            Staff
                        @endif
                    </label>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type='button' class="btn btn-danger" onclick="history.back();">Thoát</button>
        </div>
        @csrf
    </form>
@endsection
<div class="form-group">

    
    </div>