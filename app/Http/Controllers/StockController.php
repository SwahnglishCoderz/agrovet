<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Stock;
use Illuminate\Support\Facades\DB;

class StockController extends Controller

{
    public function index()
    {
        return view('stock.index');
    }

    public function create()
    {
        $products =  DB::select( DB::raw("select 
                    products.id as id, 
                    product_name, 
                    manufacturer_id, 
                    concentration,
                    manufacturer_name 
                    from products 
                    join manufacturers
                    where manufacturers.id = products.manufacturer_id"));

        return view('stock.create',compact('products'));
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $request['product_id'] = $request->product_name;
        Stock::create($request->all());

        return redirect('/stock/create')->with('success','Stock Added Successfully.');
    }

    public function validation($request)
    {
        $rules = [
            'product_name' => 'required',
            'quantity' => 'required|min:2',
            'manufactured_date' => 'required|date_format:Y-m-d',
            'expiry_date' => 'required|date_format:Y-m-d',
            'date_stocked' => 'required|date_format:Y-m-d',
            'bought_price' => 'required|numeric|min:2',
            'transport_cost' => 'required|numeric|min:2',
        ];

        return $this->validate($request,$rules);
    }

    public function view()
    {
        $stocks =  DB::select( DB::raw("select 
                    stocks.id as id,
                    product_id,
                    product_name, 
                    manufacturer_id, 
                    concentration,
                    manufacturer_name,
                    quantity,
                    manufactured_date,
                    expiry_date,
                    date_stocked,
                    bought_price,
                    transport_cost
                    from products
                    join stocks
                    join manufacturers
                    where manufacturers.id = products.manufacturer_id
                    and products.id = stocks.product_id")
        );

        return view('stock.view',compact(['products','stocks']));
    }

    public function edit($id)
    {
        $products = Product::all();
        $stock =  DB::select( DB::raw("select 
                    stocks.id as id,
                    product_id,
                    product_name, 
                    manufacturer_id, 
                    concentration,
                    manufacturer_name,
                    quantity,
                    manufactured_date,
                    expiry_date,
                    date_stocked,
                    bought_price,
                    transport_cost
                    from products
                    join stocks
                    join manufacturers
                    where manufacturers.id = products.manufacturer_id
                    and stocks.id = :id
                    and products.id = stocks.product_id"),
                    array('id' => $id)
        );
        $stock = $stock[0];

        return view('stock.edit',compact(['stock','products']));
    }

    public function update(Request $request,$id)
    {
        $this->validation($request);

        $stock=Stock::find($id);

        $stock->product_id=$request->product_name;
        $stock->quantity=$request->quantity;
        $stock->manufactured_date=$request->manufactured_date;
        $stock->expiry_date=$request->expiry_date;
        $stock->date_stocked=$request->date_stocked;
        $stock->bought_price=$request->bought_price;
        $stock->transport_cost=$request->transport_cost;

        $stock->save();

        return redirect('/stock/view')->with('success','Stock Updated Successfully');
    }

    public function delete($id)
    {
        Stock::destroy($id);

        return redirect('/stock/view')->with('success','Stock Removed Successfully');
    }
}
