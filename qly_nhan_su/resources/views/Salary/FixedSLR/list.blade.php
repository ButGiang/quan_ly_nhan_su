@extends('layout')

@section('content')     
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Họ & tên</th>
                <th>Danh mục lương</th>
                <th>Số tiền</th>
                <th>
                    <a href="fixed/select" class="btn btn-primary" style="color: white; border: 1px solid black; border-radius: 5px;">
                        <i class="fas fa-plus-circle" style="margin-right: 5px"></i>
                        Thêm mới
                    </a>
                </th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::Salary_fixedSLR($LCD) !!}
        </tbody>
    </table>
@endsection
