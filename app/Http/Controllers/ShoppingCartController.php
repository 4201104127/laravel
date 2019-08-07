<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addProduct(Request $request, $id)
    {
        $product = Product::select('p_name', 'id', 'p_price', 'p_sale', 'p_avatar', 'p_number')->find($id);
        if (!$product)
            return redirect('/');
        $price = $product->p_price;
        if ($product->p_sale)
        {
            $price = $price * (100 - $product->p_sale)/100;
        }

        \Cart::add([
            'id' => $id,
            'name' => $product->p_name,
            'qty' => 1,
            'price' => $price,
            'weight' => 1,
            'options' => [
                'avatar'    => $product->p_avatar,
                'sale'      => $product->p_sale,
                'price_old' => $product->p_price,
                'number'    => $product->p_number,
            ],
        ]);
        return redirect()->back();
    }

    public function getListShoppingCart()
    {
        $products =\Cart::content();
        return view('shopping.index', compact('products'));
    }

    public function deleteProductItem($rowId)
    {
        \Cart::remove($rowId);
        return redirect()->back();
    }

    public function destroyShoppingCart()
    {
        \Cart::destroy();
        return redirect()->back();
    }

    public function getFormPay()
    {
        $products = \Cart::content();
        return view('shopping.pay',compact('products'));
    }

    public function saveInfoShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',','',\Cart::subtotal(0,3));
        $transactionId = Transaction::insertGetId([
            'tr_user_id'    => get_data_user('web'),
            'tr_total'      => (int)$totalMoney,
            'tr_note'       => $request->note,
            'tr_address'     => $request->address,
            'tr_phone'      => $request->phone,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        if ($transactionId)
        {
            $product = \Cart::content();
            foreach ($product as $product)
            {
                Order::insert([
                   'or_transaction_id'  => $transactionId,
                    'or_product_id'     => $product->id,
                    'or_qty'            => $product->qty,
                    'or_price'          => $product->options->price_old,
                    'or_sale'           => $product->options->sale,
                    'created_at'        => Carbon::now(),
                    'updated_at'        => Carbon::now()
                ]);
            }
        }
        \Cart::destroy();
        return redirect('/');
    }

    public function onlinePayment()
    {
        return view('shopping.online_pay');
    }

    public function onlinePaymentHandling()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

        $vnp_TmnCode = "LTNZU5JO"; //Mã website tại VNPAY
        $vnp_HashSecret = "QTWUWZQLXHHWMLASGJXUXGIRHPDRPOJM"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/shopping/cart/return-payment";

        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url
        );
        return json_encode($returnData);
        exit;
    }

    public function onlinePaymentReturn()
    {
        return view('shopping.return_pay');
    }

    public function onlinePaymentPaypal()
    {
        $products =\Cart::content();
        $data = [
            [
                'name' => '',
                'description' => '',
                'quantity' => '',
                'price' => '',
                'tax' => '',
                'sku' => '',
                'currency' => '',
            ],
        ];
        $viewData = [
            'products' => $products,
            'data' => json_encode($data),
        ];
        return view('shopping.paypal', $viewData);
    }

    public function onlinePaymentPaypalHandling()
    {

    }
}
