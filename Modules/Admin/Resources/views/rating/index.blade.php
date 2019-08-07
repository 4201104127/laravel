@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="active">Đánh giá</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý đánh giá</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên thành viên</th>
                <th>Tên sản phẩm</th>
                <th>Đánh giá</th>
                <th>Nội dung</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($ratings))
                @foreach($ratings as $rating)
                    <tr>
                        <td>{{ $rating->id }}</td>
                        <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}</td>
                        <td>{{ $rating->product->p_name }}</td>
                        <td class="rating-inactive">
                            @for($i = 1; $i <=5; $i++)
                                <i class="fa fa-star {{ $i <= $rating->ra_number ? 'rating-active' : '' }} "></i>
                            @endfor
                        </td>
                        <td>{{ $rating->ra_content }}</td>
                        <td></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@stop