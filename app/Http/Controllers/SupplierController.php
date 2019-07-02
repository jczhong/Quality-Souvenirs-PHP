<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return view('supplier.index', ['suppliers' => $suppliers]);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:30',
            'phone' => 'bail|required|numeric',
            'email' => 'bail|required|string|max:50',
            'address' => 'bail|required|string|max:100',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->phone = $request->input('phone');
        $supplier->email = $request->input('email');
        $supplier->address = $request->input('address');
        $supplier->save();

        return redirect('/supplier');
    }

    public function show(Supplier $supplier)
    {
        //
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $supplier = Supplier::find($id);

        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'bail|required|string|max:30',
            'phone' => 'bail|required|numeric',
            'email' => 'bail|required|string|max:50',
            'address' => 'bail|required|string|max:100',
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $request->input('name');
        $supplier->phone = $request->input('phone');
        $supplier->email = $request->input('email');
        $supplier->address = $request->input('address');
        $supplier->save();

        return redirect('/supplier');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect('/supplier');
    }
}
