<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public  function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
         $data = $request->validate([
             'name' => 'required|string|max:255',
             'image' => 'nullable'
         ]);
         Category::create($data);
        return redirect()->route('admin.category.index');
    }


    public function show($id){

    }
    public function edit($id)
    {

    }
    public function update()
    {

    }
    public function destory()
    {

    }


    //
}
