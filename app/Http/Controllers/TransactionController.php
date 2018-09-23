<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Eloquent;
use Redirect;
use Session;
use Excel;

class TransactionController extends Controller
{

    // buat nampilin table transaction
    public function index() {
        $transactions = \App\Transaction::all();

        $data = [
            'page_title' => 'Transaction',
            'transactions' => $transactions
        ];

        return view('admin/transaction/index')->with($data);
    }

    // buat nampilin form upload excel
    public function create() {
        $data = [
            'page_title' => 'Transaction'
        ];

        return view('admin/transaction/create')->with($data);
    }

    // buat import dari excel
    public function import() {
        // setting rules validasi data
        $rules = [
            'excel' => 'required'
        ];

        $messages = [
            'excel.required' => 'File excel tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make(Input::all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/trx/create')
                ->withErrors($validator);
        }
        else {
            // ambil file excel yg diupload
            $excel = Input::file('excel');

            //DB::raw('ALTER TABLE transactions AUTO_INCREMENT=1');
            // load file excel
            Excel::load($excel, function($reader) {
                // insert ke database
                Eloquent::unguard();

                foreach($reader->toArray() as $row) {
                    \App\Transaction::firstOrCreate($row);
                }
            });

            // set flash message
            Session::flash('message', 'Transactions successfully imported');

            // redirect ke halaman index category
            return Redirect::to('admin/trx');
        }
    }
}