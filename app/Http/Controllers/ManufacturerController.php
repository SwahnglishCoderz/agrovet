<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        return view('manufacturer.index');
    }

    public function create()
    {
        return view('manufacturer.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);

        Manufacturer::create($request->all());

        return redirect('/manufacturer/create')->with('success','Manufacturer Added Successfully.');
    }

    public function validation($request)
    {
        $rules = [
            'manufacturer_name' => 'required|min:2',
        ];

        return $this->validate($request,$rules);
    }

    public function view()
    {
        //$manufacturers = Manufacturer::with('user')->where('role_id','2')->get();
        $manufacturers = Manufacturer::all();

        return view('manufacturer.view')->with('manufacturers',$manufacturers);
    }

    public function edit($id)
    {
        $manufacturer = Manufacturer::find($id);

        return view('manufacturer.edit')->with('manufacturer',$manufacturer);
    }

    public function update(Request $request,$id)
    {
        $this->validation($request);

        $manufacturer=Manufacturer::find($id);

        $manufacturer->manufacturer_name=$request->manufacturer_name;

        $manufacturer->save();

        return redirect('/manufacturer/view')->with('success','Manufacturer Updated Successfully');
    }

    public function delete($id)
    {
        Manufacturer::destroy($id);

        return redirect('/manufacturer/view')->with('success','Manufacturer Removed Successfully');
    }
}
