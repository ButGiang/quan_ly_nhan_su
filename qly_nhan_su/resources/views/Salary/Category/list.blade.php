@extends('layout')

@section('content')     
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Ký hiệu</th>
                <th>Loại lương</th>
                <th>
                    <a href="category/add" class="btn btn-primary" style="color: white; border: 1px solid black; border-radius: 5px;">
                        <i class="fas fa-plus-circle" style="margin-right: 5px"></i>
                        Thêm mới
                    </a>
                </th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::Salary_category($salarys) !!}
        </tbody>
    </table>
@endsection
