<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index() {
        $sql = "SELECT MONTHNAME(trx_date) month, count(*) total FROM transactions ".
                "GROUP BY MONTHNAME(trx_date) ".
                "ORDER BY MONTH(trx_date)";
        $transactions = DB::select($sql);

        $months = [];
        $totals = [];

        foreach($transactions as $transaction) {
            $months[] = $transaction->month;
            $totals[] = $transaction->total;
        }

        $last_transactions = \App\Transaction::orderBy('trx_date', 'DESC')
                ->limit(10)
                ->get();

        $chart = [
            'months' => $months,
            'totals' => $totals
        ];

        $data = [
            'page_title' => 'Dashboard',
            'chart' => $chart,
            'last_transactions' => $last_transactions
        ];

        return view('admin/dashboard')->with($data);
    }
}
