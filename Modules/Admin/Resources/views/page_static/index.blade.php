@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
			<li class="active">Page static</li>
		</ol>
	</div>
	<div class="table-responsive">
		<h2>Page static<a href="{{ route('admin.get.create.page_static') }}"><i class="fas fa-plus-circle pull-right"></i></a></h2>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tiêu đề</th>
	                <th>Nội dung</th>
					<th>Ngày tạo</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
				@if(isset($pages))
					@foreach($pages as $page)
						<tr>
							<td>{{ $page->id }}</td>
							<td>{{ $page->ps_name }}</td>
							<td>{!! $page->ps_content !!}</td>
							<td>{{ $page->created_at }}</td>
							<td>
								<a class="btn btn-primary btn-xs" href="{{ route('admin.get.edit.page_static', $page->id) }}"><i class="fas fa-pen"></i> Edit</a>
								<a class="btn btn-danger btn-xs" href="{{ route('admin.get.action.page_static', ['delete',$page]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
							</td>
						</tr>
					@endforeach
				@endif
	        </tbody>
	    </table>
	</div>

@stop