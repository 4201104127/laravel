<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>
<div class="area-title area-title-header">
    <h2>Thanh toán VNPAY</h2>
</div>
    <div class="container">
        <div class="table-responsive">
            <form action="" id="create_form" method="post">
                @csrf
                <div class="category-checkout col-md-8">
                    <h5>Đơn hàng</h5>
                    <ul>
                        <li>Loại hàng hóa *</li>
                        <li>
                            <select name="order_type" id="order_type" class="form-control">
                                <option value="billpayment">Thanh toán hóa đơn</option>
                                <option value="topup">Nạp tiền điện thoại</option>
                                <option value="fashion">Thời trang</option>
                                <option value="other">Khác - Xem thêm tại VNPAY</option>
                            </select>
                        </li>
                        <li>Mã hóa đơn *</li>
                        <li>
                            <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
                        </li>
                        <li>Số tiền (VNĐ) *</li>
                        <?php $total = Cart::subtotal(0,',',''); ?>
                        <li>
                            <input class="form-control" id="amount" name="amount" type="number" value="{{ $total }}"/>
                        </li>
                        <li>Nội dung thanh toán *</li>
                        <li>
                            <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Nội dung</textarea>
                        </li>
                        <li>Ngân hàng *</li>
                        <li>
                            <select name="bank_code" id="bank_code" class="form-control">
                                <option value="">Không chọn</option>
                                <option value="NCB"> Ngân hàng NCB</option>
                                <option value="AGRIBANK"> Ngân hàng Agribank</option>
                                <option value="SCB"> Ngân hàng SCB</option>
                                <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                <option value="EXIMBANK"> Ngân hàng EximBank</option>
                                <option value="MSBANK"> Ngân hàng MSBANK</option>
                                <option value="NAMABANK"> Ngân hàng NamABank</option>
                                <option value="VNMART"> Vi dien tu VnMart</option>
                                <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                                <option value="HDBANK">Ngân hàng HDBank</option>
                                <option value="DONGABANK"> Ngân hàng Dong A</option>
                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                <option value="OJB"> Ngân hàng OceanBank</option>
                                <option value="BIDV"> Ngân hàng BIDV</option>
                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                <option value="VPBANK"> Ngân hàng VPBank</option>
                                <option value="MBBANK"> Ngân hàng MBBank</option>
                                <option value="ACB"> Ngân hàng ACB</option>
                                <option value="OCB"> Ngân hàng OCB</option>
                                <option value="IVB"> Ngân hàng IVB</option>
                                <option value="VISA"> Thanh toán qua VISA/MASTER</option>
                            </select>
                        </li>
                        <li>Ngôn ngữ *</li>
                        <li>
                            <select name="language" id="language" class="form-control">
                                <option value="vn">Tiếng Việt</option>
                                <option value="en">English</option>
                            </select>
                        </li>
                        <li>
                            <button type="submit" class="checkPageBtn pull-left" id="btnPopup">Thanh toán Popup</button>
                            <button type="submit" class="checkPageBtn pull-left" id="btnHref" style="margin-left: 10px;"
                            >Thanh toán Redirect</button>
                            <a href="{{ route('get.form.pay') }}" class="checkPageBtn pull-right">Quay về</a>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
    <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
    <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
    <script type="text/javascript">
        $("#btnHref").click(function () {
            var postData = $("#create_form").serialize();
            var submitUrl = $("#create_form").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if (window.vnpay) {
                            window.open(x.data,'_blank');
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
        $("#btnPopup").click(function () {
            var postData = $("#create_form").serialize();
            var submitUrl = $("#create_form").attr("action");
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function (x) {
                    if (x.code === '00') {
                        if (window.vnpay) {
                            vnpay.open({width: 768, height: 600, url: x.data});
                        } else {
                            location.href = x.data;
                        }
                        return false;
                    } else {
                        alert(x.Message);
                    }
                }
            });
            return false;
        });
    </script>

