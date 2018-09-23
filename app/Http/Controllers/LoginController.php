<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;
use Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin/login/index');
    }

    public function login() {
        // setting rules validasi data
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Email tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make(Input::all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/login')
                ->withErrors($validator);
        }
        else {
            $data = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            Auth::attempt($data);

            if(Auth::check()) {                
                // redirect ke halaman index category
                return Redirect::to('admin/');
            }
            else {
                return Redirect::to('admin/login');
            }
        }
    }

    public function logout() {

    }
}
