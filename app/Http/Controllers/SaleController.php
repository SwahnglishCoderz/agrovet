<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Sale;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        return view('sale.index');
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
        //dd($products);
        return view('sale.create',compact('products'));
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $request['product_id'] = $request->product_name;
        Sale::create($request->all());

        return redirect('/sale/create')->with('success','Sale Added Successfully.');
    }

    public function validation($request)
    {
        $rules = [
            'product_name' => 'required',
            'quantity' => 'required',
            'date_sold' => 'required|date-format:Y-m-d',
            'cost' => 'required'
        ];

        return $this->validate($request,$rules);
    }

    public function view()
    {
        $sales =  DB::select( DB::raw("select 
                    sales.id as id,
                    product_id,
                    product_name, 
                    manufacturer_id, 
                    concentration,
                    manufacturer_name,
                    quantity,
                    cost,
                    date_sold
                    from products 
                    join manufacturers
                    join sales
                    where manufacturers.id = products.manufacturer_id
                    and sales.product_id = products.id"));

        return view('sale.view',compact('products'))->with('sales',$sales);
    }

    public function edit($id)
    {
        $sale =  DB::select( DB::raw("select 
                    sales.id as id,
                    product_id,
                    product_name, 
                    manufacturer_id, 
                    concentration,
                    manufacturer_name,
                    quantity,
                    cost,
                    date_sold
                    from products 
                    join manufacturers
                    join sales
                    where sales.id = :id
                    and manufacturers.id = products.manufacturer_id
                    and sales.product_id = products.id"),
                    array('id' => $id)
        );
        $sale = $sale[0];
        $products = Product::all();

        return view('sale.edit',compact('products'))->with('sale',$sale);
    }

    public function update(Request $request,$id)
    {
        $this->validation($request);

        $sale=Sale::find($id);

        $sale->product_id=$request->product_name;
        $sale->quantity=$request->quantity;
        $sale->date_sold=$request->date_sold;
        $sale->cost=$request->cost;

        $sale->save();

        return redirect('/sale/view')->with('success','Sale Updated Successfully');
    }

    public function delete($id)
    {
        Sale::destroy($id);

        return redirect('/sale/view')->with('success','Sale Removed Successfully');
    }
}
