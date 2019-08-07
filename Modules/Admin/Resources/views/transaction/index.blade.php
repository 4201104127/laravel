@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="active">Đơn hàng</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý đơn hàng</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N/A]' }}</td>
                        <td>{{ $transaction->tr_address }}</td>
                        <td>{{ $transaction->tr_phone }}</td>
                        <td>{{ number_format($transaction->tr_total,0,',','.') }}</td>
                        <td>
                            @if($transaction->tr_status == 0)
                            <a class="btn btn-info btn-xs" href="{{ route('admin.get.active.transaction',$transaction->id) }}">Chưa xử lý</a>
                            @else
                            <a class="btn btn-success btn-xs" href="{{ route('admin.get.active.transaction',$transaction->id) }}">Đã xử lý</a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary btn-xs js_order_item" data-id="{{ $transaction->id }}" href="{{ route('admin.get.view.transaction', $transaction->id) }}">Chi tiết</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('admin.get.action.transaction', ['delete', $transaction]) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết đơn hàng <span class="transaction-id"></span></h4>
                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $(".js_order_item").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('');
                $(".transaction-id").text($this.attr('data-id'));
                $("#myModalOrder").modal('show');
                $.ajax({
                  url: url,
                }).done(function (result) {
                    console.log(result);
                    if (result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
        })
    </script>
@stop