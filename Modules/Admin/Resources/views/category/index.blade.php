@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
			<li class="active">Danh mục</li>
		</ol>
	</div>
	<div class="table-responsive">
		<h2>Quản lý danh mục <a href="{{ route('admin.get.create.category') }}"><i class="fas fa-plus-circle pull-right"></i></a></h2>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tên danh mục</th>
	                <th>Title Seo</th>
					<th>Trang chủ</th>
	                <th>Trạng thái</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@if (isset($categories))
	        		@foreach ($categories as $category)
			            <tr>
			                <td>{{ $category->id }}</td>
			                <td>{{ $category->c_name }}</td>
			                <td>{{ $category->c_title_seo }}</td>
							<td>
								<a class="btn {{ $category->getHome($category->c_home)['class'] }}" href="{{ route('admin.get.action.category',['home',$category->id]) }}">{{ $category->getHome($category->c_home)['name'] }}</a>
							</td>
			                <td>
			                	<a class="btn {{ $category->getStatus($category->c_status)['class'] }}" href="{{ route('admin.get.action.category',['status',$category->id]) }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
			                </td>
			                <td>
			                	<a class="btn btn-primary btn-xs" href="{{ route('admin.get.edit.category', $category->id) }}"> Edit</a>
								<a class="btn btn-danger btn-xs" href="{{ route('admin.get.action.category', ['delete',$category]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
							</td>
			            </tr>
	            	@endforeach
	            @endif
	        </tbody>
	    </table>
	</div>

@stop