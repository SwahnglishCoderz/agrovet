<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;
use App\Product;
use App\Type;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller

{
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        $manufacturers = Manufacturer::all();
        $types = Type::all();
        return view('product.create',compact(['manufacturers','types']));
    }

    public function store(Request $request)
    {
        $this->validation($request);
        $request['manufacturer_id'] = $request->manufacturer_name;
        $request['type_id'] = $request->type_name;

        Product::create($request->all());

        return redirect('/product/create')->with('success','Product Added Successfully.');
    }

    public function validation($request)
    {
        $rules = [
            'product_name' => 'required|min:3',
            'manufacturer_name' => 'required',
            'type_name' => 'required',
            'concentration' => 'required'
        ];

        return $this->validate($request,$rules);
    }

    public function view()
    {
        $products =  DB::select( DB::raw("select 
                    products.id as id,
                    product_name, 
                    manufacturer_id, 
                    type_id, 
                    concentration,
                    manufacturer_name
                    from products
                    join manufacturers
                    where manufacturers.id = products.manufacturer_id")
        );

        return view('product.view')->with('products',$products);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $manufacturers = Manufacturer::all();
        $types = Type::all();

        return view('product.edit',compact(['product','manufacturers','types']));
    }

    public function update(Request $request,$id)
    {
        $this->validation($request);

        $product=Product::find($id);

        $product->product_name=$request->product_name;
        $product->concentration=$request->concentration;
        $product->manufacturer_id=$request->manufacturer_name;
        $product->type_id=$request->type_name;

        $product->save();

        return redirect('/product/view')->with('success','Product Updated Successfully');
    }

    public function delete($id)
    {
        Product::destroy($id);

        return redirect('/product/view')->with('success','Product Removed Successfully');
    }
}
