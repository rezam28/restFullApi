<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'price.required' => 'A price is required',
            'quantity.required' => 'A quantitiy is required',
            'description.required' => 'A description is required',
            'active.required' => 'A '
        ];
    }
    public function get()
    {
        $product = Products::all();
        return response()->json(
            [
                "message" => "Success Get",
                "data" => $product
            ]
        );
    }
    
    public function post(Request $request)
    {
        // $input = $request->all();

        $validation = Validator::make($request->all(), 
        [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'active' => 'required',
        ]);
         
        if($validation->fails()) 
        {
            $errors = $validation->errors();
            return $errors->toJson();
        }else{
            $product = new Products();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->active = $request->active;
            $product->description = $request->description;

            $product->save();
            return response()->json(
                [
                    "message" => "Post sukses",
                    "data" => $product
                ]
            );
        }
    }

    public function put($id, Request $request)
    {
        $product = Products::where('id', $id)->first();

        if($product)
        {
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
            $product->active = $request->active ? $request->active : $product->active;
            $product->description = $request->description ? $request->description : $product->description;

            $product->save();
            return response()->json(
                [
                    "message" => "sukses mengubah",
                    "data" => $product
                ]
            );
        }

        return response()->json(
            [
                "message" => "Produk " .$id. "tidak ditemukan",
            ], 400
        );
    }

    public function delete($id, Request $request)
    {
        $product = Products::find('id', $id);

        if($product)
        {
            $product->delete();
            return response()->json(
                [
                    "message" => "sukses menghapus" .$id,
                    "data" => $product
                ]
            );
        }

        return response()->json(
            [
                "message" => "Produk " .$id. "tidak ditemukan",
            ], 400
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
