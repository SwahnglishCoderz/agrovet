<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Price;

class PriceController extends Controller

{
    public function index()
    {
        return view('price.index');
    }

    public function create()
    {
        $products = Product::all();
        return view('price.create',compact('products'));
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $request['product_id'] = $request->product_name;
        Price::create($request->all());

        return redirect('/price/create')->with('success','Price Added Successfully.');
    }

    public function validation($request)
    {
        $rules = [
            'price' => 'required|min:2|numeric',
            'product_name' => 'required',
        ];

        return $this->validate($request,$rules);
    }

    public function view()
    {
        $products = Product::all();
        $prices = Price::all();

        return view('price.view',compact(['products','prices']));
    }

    public function edit($id)
    {
        $price = Price::find($id);
        $products = Product::all();
        return view('price.edit',compact('products'))->with('price',$price);
    }

    public function update(Request $request,$id)
    {
        $this->validation($request);

        $price=Price::find($id);

        $price->product_id=$request->product_name;
        $price->price=$request->price;

        $price->save();

        return redirect('/price/view')->with('success','Price Updated Successfully');
    }

    public function delete($id)
    {
        Price::destroy($id);

        return redirect('/price/view')->with('success','Price Removed Successfully');
    }
}
