<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Env\Request;

class ServiceController extends Controller
{
    public function index(){
        return view('admin.service.index');
    }

    public  function show()
    {

    }
    public function create(){
    return view('admin.service.create');
    }

    public  function store( Request $request)
    {
        $data = $request->validated();
        return view('admin.service.create',$data);
    }
    public function edit(){

    }
    public function update(){

    }

    public function delete(){

    }
}
