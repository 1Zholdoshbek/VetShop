<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
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
        $currencies = Currency::all();
        return view('admin.drug.create',compact('categories','currencies'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id' => 'required|exists:categories,id',
            'currency_id' => 'required|exists:currencies,id'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/drugs', 'public');
            $data['image'] = $imagePath;
        }
        Drug::create($data);
        return redirect()->route('admin.drug.index');

    }
    public function show(){

    }

    public function edit(Drug $drug,Request $request)
    {
        $categories = Category::all();
        $currencies = Currency::all();
        return view('admin.drug.edit', compact('drug','categories','currencies'));
    }
    public function update (Drug $drug, Request $request)
    {
        $data = request()->validate([
            'name'=>'required|string|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'category_id' => 'required|exists:categories,id',
            'currency_id' => 'required|exists:currencies,id'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/drugs', 'public');
            $data['image'] = $imagePath;
        }
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
