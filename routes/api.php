<?php
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create-payment', function() {
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AY94j126kWjE0nA_oWVdFVWP58GKb5x3DElXiOm2o5MJrfuwUunVAGKOSOz1tKrVSQvbkq5FDr3WmTqn',     // ClientID
            'EKoBQrNpaMycFMq_gXXTjSVZbkRWvScKUpj7yPb-95LvqMUeZklBG-63n90BojJ1qhF7bJ06aqFg_ycG'      // ClientSecret
        )
    );

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    $total = 0;
    $products = \Cart::content();
    $itemList = new ItemList();
    foreach ($products as $product) {
        $item = new Item();
        $item->setName($product->name)
            ->setCurrency('USD')
            ->setQuantity($product->qty)
            ->setPrice(VNDtoUSD(number_format($product->price,0,'.','')));
        $itemList->addItem($item);
        $total += intval($item->getQuantity() * $item->getPrice());
    }

    $details = new Details();
    $details->setShipping(0)
        ->setTax(0)
        ->setSubtotal($total);

    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal($total)
        ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
        ->setInvoiceNumber(uniqid());

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl("http://localhost:8000/shopping/cart/paypal-payment")
        ->setCancelUrl("http://localhost:8000/shopping/cart/paypal-payment");

    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

    try {
        $payment->create($apiContext);
    } catch (Exception $ex) {
        echo $ex;
        exit(1);
    }
    return $payment;
});

Route::post('execute-payment', function(Request $request) {
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AY94j126kWjE0nA_oWVdFVWP58GKb5x3DElXiOm2o5MJrfuwUunVAGKOSOz1tKrVSQvbkq5FDr3WmTqn',     // ClientID
            'EKoBQrNpaMycFMq_gXXTjSVZbkRWvScKUpj7yPb-95LvqMUeZklBG-63n90BojJ1qhF7bJ06aqFg_ycG'      // ClientSecret
        )
    );
    $total = Cart::subtotal(0,',','');
    $paymentId = $request->paymentID;
    $payment = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($request->payerID);
    $transaction = new Transaction();
    $amount = new Amount();
    $details = new Details();
    $details->setShipping(0)
         ->setTax(0)
         ->setSubtotal($total);
    $amount->setCurrency('USD');
    $amount->setTotal($total);
    $amount->setDetails($details);
    $transaction->setAmount($amount);
    $execution->addTransaction($transaction);
    try {
        $result = $payment->execute($execution, $apiContext);
    } catch (Exception $ex) {
        echo $ex;
        exit(1);
    }
    return $result;
});
