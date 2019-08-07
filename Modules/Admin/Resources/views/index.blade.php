@extends('admin::layouts.master')
@section('content')
	<h1 class="page-header">Trang tổng</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6">
				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
			<div class="col-md-6">
				<div id="chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
			</div>
		</div>
	</div>
    <div class="row placeholders">
	    <div class="col-xs-6 col-sm-3 placeholder">
	        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
	        <h4>Label</h4>
	        <span class="text-muted">Something else</span>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2 class="sub-header">Liên hệ</h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Tên</th>
						<th>Nội dung</th>
						<th>Email</th>
						<th>SĐT</th>
					</tr>
					</thead>
					<tbody>
					@foreach($contacts as $contact)
						<tr>
							<td>{{ $contact->co_name }}</td>
							<td>{{ $contact->co_content }}</td>
							<td>{{ $contact->co_email }}</td>
							<td>{{ $contact->co_phone }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<h2 class="sub-header">Đơn hàng</h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Tên</th>
						<th>Tổng cộng</th>
						<th>Địa chỉ</th>
						<th>SĐT</th>
					</tr>
					</thead>
					<tbody>
					@foreach($transactions as $transaction)
						<tr>
							<td>{{ $transaction->user->name }}</td>
							<td>{{ $transaction->tr_total }}</td>
							<td>{{ $transaction->tr_address }}</td>
							<td>{{ $transaction->tr_phone }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2 class="sub-header">Thành viên</h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Tên</th>
						<th>Email</th>
						<th>SĐT</th>
					</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->phone }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<h2 class="sub-header">Đánh giá</h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Tên</th>
						<th>Tên sản phẩm</th>
						<th>Đánh giá</th>
						<th>Nội dung</th>
					</tr>
					</thead>
					<tbody>
						@foreach($ratings as $rating)
							<tr>
								<td>{{ $rating->user->name }}</td>
								<td>{{ $rating->product->p_name }}</td>
								<td>{{ $rating->ra_number }} <i class="fas fa-star"></i></td>
								<td>{{ $rating->ra_content }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
@section('script')
	<script>
		var moneyDay = parseInt("{{$moneyDay}}", 10);
		var moneyMonth = parseInt("{{$moneyMonth}}", 10);
		// test json
		let data = "{{ $dataMoney }}";
		dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
		// Column chart
		Highcharts.chart('container', {
			colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
				return {
					linearGradient: { x1: 0, x2: 0, y1: 0, y2: 1 },
					stops: [
						[0, color],
						[1, Highcharts.Color(color).brighten(-0.3).get()] // darken
					]
				};
			}),
			fillOpacity: 0.1,
			chart: {
				type: 'column'
			},
			title: {
				text: 'Doanh thu'
			},
			subtitle: {
				text: 'Chi tiết doanh thu'
			},
			xAxis: {
				type: 'category'
			},
			yAxis: {
				title: {
					text: 'Total'
				}

			},
			legend: {
				enabled: false
			},
			plotOptions: {
				series: {
					borderWidth: 0,
					dataLabels: {
						enabled: true,
						format: '{point.y:,.0f} VNĐ'
					}
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} VNĐ</b> of total<br/>'
			},
			series: [
				{
					name: "",
					colorByPoint: true,
					data: [
						{
							name: "Doanh thu ngày",
							y: moneyDay,
							drilldown: "Doanh thu ngày"
						},
						{
							name: "Doanh thu tháng",
							y: moneyMonth,
							drilldown: "Doanh thu tháng"
						},
						{
							name: "Doanh thu Năm",
							y: 1000000,
							drilldown: null
						},
					]
				}
			],
			drilldown: {
				series: [
					{
						name: "Doanh thu ngày",
						id: "Doanh thu ngày",
						data: [
							[
								"v65.0",
								0.1
							],
							[
								"v64.0",
								1.3
							],
							[
								"v63.0",
								3.02
							],
							[
								"v62.0",
								1.4
							],
						]
					},
					{
						name: "Doanh thu tháng",
						id: "Doanh thu tháng",
						data: [
							[
								"total",
								10
							],
							[
								"1",
								1.02
							],
							[
								"2",
								3.36
							],
						]
					},
				]
			}
		});
		// Pie chart
		Highcharts.chart('chart', {
			colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
				return {
					radialGradient: {
						cx: 0.5,
						cy: 0.3,
						r: 0.5
					},
					stops: [
						[0, color],
						[1, Highcharts.Color(color).brighten(-0.3).get('rgba')] // darken
					]
				};
			}),
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: 'Browser market shares in January, 2018'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: false
					},
					showInLegend: true
				}
			},
			series: [{
				name: 'Brands',
				colorByPoint: true,
				data: [{
					name: 'Chrome',
					y: 61.41,
					sliced: true,
					selected: true
				}, {
					name: 'Internet Explorer',
					y: 11.84
				}, {
					name: 'Firefox',
					y: 10.85
				}, {
					name: 'Edge',
					y: 4.67
				}, {
					name: 'Safari',
					y: 4.18
				}, {
					name: 'Other',
					y: 7.05
				}]
			}]
		});
	</script>
@stop
