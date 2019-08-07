<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);
        $viewData = [
            'transactions' => $transactions,
        ];
        return view('admin::transaction.index', $viewData);
    }

    public function viewOrder(Request $request, $id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')->where('or_transaction_id',$id)->get();
            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }

    public function actionDelete(Request $request, $action, $id)
    {
        if ($action)
        {
            $transaction = Transaction::find($id);
            switch ($action)
            {
                case 'delete':
                    $transaction->delete();
            }
        }
        return redirect()->back()->with('success','Xóa thành công!');
    }

    public function action($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();
        if ($transaction->tr_status == Transaction::STATUS_DONE)
        {
            return redirect()->back()->with('warn','Đơn hàng đã được xử lý!');
        }
        else
        {
            if ($orders)
            {
                foreach ($orders as $order)
                {
                    $product = Product::find($order->or_product_id);
                    $product->p_number = $product->p_number - $order->or_qty;
                    $product->p_pay++;
                    $product->save();
                }
            }
            \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
            $transaction->tr_status = Transaction::STATUS_DONE;
            $transaction->save();
            return redirect()->back()->with('success','Xử lý đơn hàng thành công!');
        }
    }
}
