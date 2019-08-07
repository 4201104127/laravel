@if($orders)
    <table class="table">
            <thead>
            <tr>
                <th>Stt</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $stt = 1 ?>
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td><img src="{{ isset($order->product->p_avatar) ? pare_url_file($order->product->p_avatar) : '' }}" alt="" class="img img-responsive" width="50px" height="50px"></td>
                    <td><a href="{{ route('get.detail.product',[str_slug($order->product->p_name),$order->product->id]) }}" target="_blank">{{ $order->product->p_name }}</a></td>
                    <td>{{ number_format($order->or_price,0,',','.') }}đ</td>
                    <td>{{ $order->or_qty }}</td>
                    <td>{{ number_format($order->or_qty * $order->or_price,0,',','.') }}đ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endif