<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function get()
    {
        $customer = Customers::all();
        return response()->json(
            [
                "message" => "Success Get",
                "data" => $customer
            ]
        );
    }

    public function getbyid($id)
    {
        $customer = Customers::where('id',$id)->first();
        return response()->json(
            [
                "message" => "Success Get",
                "data" => $customer
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
            $customer = new Customers();
            $customer->name = $request->name;
            $customer->price = $request->price;
            $customer->quantity = $request->quantity;
            $customer->active = $request->active;
            $customer->description = $request->description;

            $customer->save();
            return response()->json(
                [
                    "message" => "Post sukses",
                    "data" => $customer
                ]
            );
        }
    }

    public function put($id, Request $request)
    {
        $customer = Customers::where('id', $id)->first();

        if($customer)
        {
            $customer->name = $request->name ? $request->name : $customer->name;
            $customer->price = $request->price ? $request->price : $customer->price;
            $customer->quantity = $request->quantity ? $request->quantity : $customer->quantity;
            $customer->active = $request->active ? $request->active : $customer->active;
            $customer->description = $request->description ? $request->description : $customer->description;

            $customer->save();
            return response()->json(
                [
                    "message" => "sukses mengubah",
                    "data" => $customer
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
        $customer = Customers::find('id', $id);

        if($customer)
        {
            $customer->delete();
            return response()->json(
                [
                    "message" => "sukses menghapus" .$id,
                    "data" => $customer
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
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers)
    {
        //
    }
}
