@extends('layouts.app')
@section('content')
    <?php Cart::destroy(); ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Thông tin thanh toán</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="area-title area-title-header">
                <h2>Đơn hàng</h2>
            </div>
        </div>
    </div>

    <?php
    $vnp_TmnCode = "LTNZU5JO"; //Mã website tại VNPAY
    $vnp_HashSecret = "QTWUWZQLXHHWMLASGJXUXGIRHPDRPOJM"; //Chuỗi bí mật
    $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost:8000/shopping/cart/return-payment";
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHashType']);
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . $key . "=" . $value;
        } else {
            $hashData = $hashData . $key . "=" . $value;
            $i = 1;
        }
    }

    //$secureHash = md5($vnp_HashSecret . $hashData);
    $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
    ?>
    <!--Begin display -->
    <div class="container" id="printarea">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label >Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label >Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label >Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label >Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label >Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label >Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label >Thời gian thanh toán:</label>
                <label><?php echo $_GET['vnp_PayDate'] ?></label>
            </div>
            <div class="form-group">
                <label >Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            echo "Giao dịch thành công";
                        } else {
                            echo "Giao dịch không thành công";
                        }
                    } else {
                        echo "Không hợp lệ";
                    }
                    ?>
                </label>
            </div>
            <div class="form-group">
                <a href="{{ route('home') }}" class="btn btn-sm btn-primary pull-left" id="btnPopup">Trở về</a>
            </div>
        </div>
    </div>
    <br>
@stop