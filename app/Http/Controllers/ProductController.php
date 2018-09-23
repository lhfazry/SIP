<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // ambil query string
        $cat_id = $request->query('cat_id');
        $keyword = $request->query('keyword');
        $categories = \App\Category::pluck('name', 'id');

        // ambil semua data dari table product
        //$products = \App\Product::all();

        $paginate = 3;
        $where = [];

        if(!empty($cat_id)) {
            $where[] = ['category_id', '=', $cat_id];
        }

        if(!empty($keyword)) {
            $where[] = ['name', 'LIKE', "%{$keyword}%"];
        }

        if(empty($cat_id) && empty($keyword)) {
            $products = \App\Product::paginate($paginate);
        }
        else {
            $products = \App\Product::where($where)->paginate($paginate);
        }

        $data = [
            'page_title' => 'Product',
            'products' => $products,
            'categories' => $categories,
            'cat_id' => $cat_id,
            'keyword' => $keyword
        ];

        return view('admin/product/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ambil dari database
        $categories = \App\Category::pluck('name', 'id');
        //$categories = array_merge([0 => 'Select category'], $categories->all());

        $data = [
            'page_title' => 'Product',
            'categories' => $categories
        ];

        return view('admin/product/create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // setting rules validasi data
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'sku' => 'required',
            'image' => 'required',
            'status' => 'required',
            'description' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make(Input::all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to('admin/product/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else {
            $image = $request->file('image')->store('products', 'public');

            // jika data valid
            // simpan ke database
            $product = new \App\Product;
            $product->category_id = Input::get('category_id');
            $product->name = Input::get('name');
            $product->price = Input::get('price');
            $product->sku = Input::get('sku');
            $product->name = Input::get('name');
            $product->image = $image;
            $product->status = Input::get('status');
            $product->description = Input::get('description');
            $product->save();

            // set flash message
            Session::flash('message', 'Product successfully saved');

            // redirect ke halaman index category
            return Redirect::to('admin/product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ambil data product untuk id tertentu
        $product = \App\Product::find($id);
        $data = [
            'page_title' => 'Product',
            'product' => $product
        ];

        return view('admin/product/show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = \App\Category::pluck('name', 'id');
        $product = \App\Product::find($id);

        $data = [
            'page_title' => 'Product',
            'product' => $product,
            'categories' => $categories
        ];

        return view('admin/product/edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // setting rules validasi data
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'sku' => 'required',
            'status' => 'required',
            'description' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama tidak boleh kosong'
        ];

        // validasi data
        $validator = Validator::make(Input::all(), $rules, $messages);

        if($validator->fails()) {
            // jika data tidak valid
            return Redirect::to("admin/product/{$id}/edit")
                ->withErrors($validator);
        }
        else {
            // jika data valid
            // simpan ke database
            $product = \App\Product::find($id);
            $product->category_id = Input::get('category_id');
            $product->name = Input::get('name');
            $product->price = Input::get('price');
            $product->sku = Input::get('sku');
            $product->name = Input::get('name');
            $product->status = Input::get('status');
            $product->description = Input::get('description');
            
            $request_image = $request->file('image');

            if(!empty($request_image)) {
                $image = $request_image->store('products', 'public');
                $product->image = $image;
            }

            $product->save();

            // set flash message
            Session::flash('message', 'Product successfully saved');

            // redirect ke halaman index category
            return Redirect::to('admin/product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ambil dari database
        $product = \App\Product::find($id);
        $product->delete();

        return Redirect::to('admin/product');
    }
}
