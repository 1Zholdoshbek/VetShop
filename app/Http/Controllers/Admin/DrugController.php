<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Drug;
use Illuminate\Http\Request;


class DrugController extends Controller
{

    public function index(){
        $drugs = Drug::all();
        return view('admin.drug.index', compact('drugs'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('admin.drug.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required'
        ]);
        Drug::create($data);
        return redirect()->route('admin.drug.index');

    }
    public function show(){

    }

    public function edit(Drug $drug)
    {
        return view('admin.drug.edit', compact('drug'));
    }
    public function update (Drug $drug)
    {
        $data = request()->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id'=>'required'
        ]);
        $drug->update($data);
        return redirect()
            ->route('admin.drug.index')
            ->with('Success','Drug Updated Successfully');

    }
    public function destroy(Drug $drug)
    {
        $drug->delete();
        return redirect()
            ->route('admin.drug.index')
            ->with('success', 'Drug deleted successfully');

    }
    //
}
