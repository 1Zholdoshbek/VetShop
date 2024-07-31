<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Drug;
use App\Models\DrugGallery;
use Illuminate\Http\Request;
use App\Http\Requests\DrugRequest;

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
    public function store(DrugRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/drugs', 'public');
            $data['image'] = $imagePath;
        }
        Drug::create($data);
        return redirect()->route('admin.drug.index');

    }
    public function show($id){
        //$drug = Drug::findOrFail($id);
        $drug = Drug::with('gallery')->findOrFail($id);
        return view('admin.drug.show', compact('drug'));

    }

    public function edit(Drug $drug,Request $request)
    {
        $categories = Category::all();
        $currencies = Currency::all();
        return view('admin.drug.edit', compact('drug','categories','currencies'));
    }
    public function update (DrugRequest $request,Drug $drug)
    {
        $data = request()->validated();
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
    public function addImage(Request $request, $id)
    {
        $drug = Drug::findOrFail($id);

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('drug_images', 'public');
            $fileType = $request->file('image')->getMimeType();
            $fileSize = $request->file('image')->getSize();

            $drug->gallery()->create([
                'file_path' => $filePath,
                'type' => $fileType,
                'size' => $fileSize,
            ]);
        }

        return redirect()->route('admin.drug.show', $drug->id);
    }

    public function deleteImage($drugId, $imageId)
    {
        $image = DrugGallery::where('drug_id', $drugId)->findOrFail($imageId);
        $image->delete();

        return redirect()->route('admin.drug.show', $drugId);
    }

    //
}
