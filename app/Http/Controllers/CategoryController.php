<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Session;

class CategoryController extends Controller
{
    public function index() {
        // ambil semua data dari table categories
        $categories = \App\Category::all();
        $data = [
            'page_title' => 'Category',
            'categories' => $categories
        ];

        return view('admin/category/index')->with($data);
    }

    public function show($id) {
        // ambil data category untuk id tertentu
        $category = \App\Category::find($id);
        $data = [
            'page_title' => 'Category',
            'category' => $category
        ];

        return view('admin/category/show')->with($data);
    }

    // untuk menampilkan form tambah category
    public function create() {
        $data = [
            'page_title' => 'Category'
        ];

        return view('admin/category/create')->with($data);
    }

    // untuk menyimpan category ke database
    public function store() {
        // setting rules validasi data
        $rules = [
            'name' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make(Input::all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/category/create')
                ->withErrors($validator);
        }
        else {
            // jika data valid
            // simpan ke database
            $category = new \App\Category;
            $category->name = Input::get('name');
            $category->status = Input::get('status');
            $category->save();

            // set flash message
            Session::flash('message', 'Category successfully saved');

            // redirect ke halaman index category
            return Redirect::to('admin/category');
        }
    }

    public function edit($id) {
        $category = \App\Category::find($id);

        $data = [
            'page_title' => 'Category',
            'category' => $category
        ];

        return view('admin/category/edit')->with($data);
    }

    // untuk mengupdate data di database
    public function update($id) {
        //var_dump(Input::all());
        // setting rules validasi data
        $rules = [
            'name' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make(Input::all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to("admin/category/{$id}/edit")
                ->withErrors($validator);
        }
        else {
            // jika data valid
            // update ke database
            $category = \App\Category::find($id);
            $category->name = Input::get('name');
            $category->status = Input::get('status');
            $category->save();

            // set flash message
            Session::flash('message', 'Category successfully updated');

            // redirect ke halaman index category
            return Redirect::to('admin/category');
        }
    }

    public function destroy($id) {
        // ambil dari database
        $category = \App\Category::find($id);
        $category->delete();

        return Redirect::to('admin/category');
    }
}
