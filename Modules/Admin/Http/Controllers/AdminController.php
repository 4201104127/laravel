<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use App\Models\Rating;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,p_name')->orderByDesc('id')->limit(5)->get();
        $contacts = Contact::orderByDesc('id')->limit(5)->get();
        $transactions = Transaction::with('user:id,name')->orderByDesc('id')->limit(5)->get();
        $users = User::orderByDesc('id')->limit(5)->get();
        $moneyDay = Transaction::whereDay('updated_at',date('d'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        // test json arr
        $dataMoney = [
            [
                "name"      => "Doanh thu ngày",
                "y"         => (int)$moneyDay,
                "drilldown" => "Doanh thu ngày"
            ],
            [
                "name"      => "Doanh thu ngày",
                "y"         => (int)$moneyMonth,
                "drilldown" => "Doanh thu tháng"
            ]
        ];

        $viewData = [
            'ratings'   => $ratings,
            'contacts'  => $contacts,
            'transactions' => $transactions,
            'users'     => $users,
            'moneyDay'  => $moneyDay,
            'moneyMonth'=> $moneyMonth,
            'dataMoney' => json_encode($dataMoney),
        ];

        return view('admin::index', $viewData);
    }
}
