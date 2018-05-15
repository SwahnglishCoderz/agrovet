<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller

{
    public function index()
    {
        return view('type.index');
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);

        Type::create($request->all());

        return redirect('/type/create')->with('success','Type Added Successfully.');
    }

    public function validation($request)
    {
        $rules = [
            'type_name' => 'required|min:2',
        ];

        return $this->validate($request,$rules);
    }

    public function view()
    {
        //$types = Type::with('user')->where('role_id','2')->get();
        $types = Type::all();

        return view('type.view')->with('types',$types);
    }

    public function edit($id)
    {
        $type = Type::find($id);

        return view('type.edit')->with('type',$type);
    }

    public function update(Request $request,$id)
    {
        $this->validation($request);

        $type=Type::find($id);

        $type->type_name=$request->type_name;

        $type->save();

        return redirect('/type/view')->with('success','Type Updated Successfully');
    }

    public function delete($id)
    {
        Type::destroy($id);

        return redirect('/type/view')->with('success','Type Removed Successfully');
    }
}
