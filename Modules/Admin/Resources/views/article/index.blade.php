@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
			<li class="active">Bài viết</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-9">
			<form class="form-inline" action="">
				<div class="form-group">
					<label for="name">Search:</label>
					<input type="text" class="form-control" placeholder="Tìm kiếm..." name="name" value="{{ \Request::get('name') }}">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<h2>Quản lý bài viết <a href="{{ route('admin.get.create.article') }}"><i class="fas fa-plus-circle pull-right"></i></a></h2>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tên bài viết</th>
					<th>Hình ảnh</th>
	                <th>Mô tả</th>
	                <th>Trạng thái</th>
					<th>Nổi bật</th>
					<th>Ngày tạo</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@if (isset($articles))
	        		@foreach ($articles as $article)
			            <tr>
			                <td>{{ $article->id }}</td>
			                <td>{{ $article->a_name }}</td>
							<td>
								<img src="{{ pare_url_file($article->a_avatar) }}" class="img img-responsive" style="width: 100px; height: 69px;">
							</td>
			                <td>{{ $article->a_description }}</td>
			                <td>
								<a href="{{ route('admin.get.action.article',['active',$article->id]) }}" class="btn {{ $article->getStatus($article->a_active)['class'] }}">{{ $article->getStatus($article->a_active)['name'] }}</a>
							</td>
							<td>
								<a href="{{ route('admin.get.action.article',['hot',$article->id]) }}" class="btn {{ $article->getHot($article->a_hot)['class'] }}">{{ $article->getHot($article->a_hot)['name'] }}</a>
							</td>
							<td>{{ $article->created_at }}</td>
			                <td>
			                	<a class="btn btn-primary btn-xs" href="{{ route('admin.get.edit.article', $article->id) }}">Edit</a>
			                	<a class="btn btn-danger btn-xs" href="{{ route('admin.get.action.article', ['delete',$article]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Confirm</a>
			                </td>
			            </tr>
	            	@endforeach
	            @endif
	        </tbody>
	    </table>
	</div>

@stop