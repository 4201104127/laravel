@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
			<li class="active">Sản phẩm</li>
		</ol>
	</div>
    <div class="row">
        <div class="col-sm-9">
            <form class="form-inline" action="">
                <div class="form-group">
                    <label for="name">Search:</label>
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." name="name" value="{{ \Request::get('name') }}">
                </div>
				<div class="form-group">
					<select class="form-control" name="cate" id="">
						<option value="">Danh mục</option>
						@if (isset($categories))
							@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
							@endforeach
						@endif
					</select>
				</div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
	<div class="table-responsive">
		<h2>Quản lý sản phẩm <a href="{{ route('admin.get.create.product') }}"><i class="fas fa-plus-circle pull-right"></i></a></h2>
		@if (isset($products))
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tên sản phẩm</th>
	                <th>Loại sản phẩm</th>
					<th>Hình ảnh</th>
	                <th>Trạng thái</th>
					<th>Nổi bật</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
			@if(isset($products))
				@foreach ($products as $product)
					<?php $rating = 0;
					if ($product->p_total_rating)
					{
						$rating = round($product->p_total_number/$product->p_total_rating,1);
					}
					?>
					<tr>
						<td>{{ $product->id }}</td>
						<td>
							{{ $product->p_name }}
							<ul style="padding-left: 15px;">
								<li><span><i class="fas fa-dollar-sign"></i></span> {{ number_format($product->p_price,0,',','.') }} VNĐ</li>
								<li><span><i class="fas fa-percentage"></i></span> {{ $product->p_sale }} %</li>
								<li>{{ $rating }} <i class="fas fa-star" style="color: #ff9d00;"></i></li>
								<li><span><i class="fas fa-angle-double-up"></i></span> {{ $product->p_number }}</li>
							</ul>
						</td>
						<td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N/A]' }}</td>
						<td>
							<img src="{{ pare_url_file($product->p_avatar) }}" class="img img-responsive" style="width: 80px; height: 80px;">
						</td>
						<td>
							<a class="btn {{ $product->getStatus($product->p_active)['class'] }}" href="{{ route('admin.get.action.product', ['active',$product]) }}">{{ $product->getStatus($product->p_active)['name'] }}</a>
						</td>
						<td>
							<a class="btn {{ $product->getHot($product->p_hot)['class'] }}" href="{{ route('admin.get.action.product', ['hot',$product]) }}">{{ $product->getHot($product->p_hot)['name'] }}</a>
						</td>
						<td>
							<a class="btn btn-primary btn-xs" href="{{ route('admin.get.edit.product', $product->id) }}"><i class="fas fa-pen"></i> Edit</a>
							<a class="btn btn-danger btn-xs" href="{{ route('admin.get.action.product', ['delete',$product]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
						</td>
					</tr>
				@endforeach
			@endif
	        </tbody>
	    </table>
		@endif
		<div class="pull-right">
			{{ $products->links() }}
		</div>
	</div>

@stop