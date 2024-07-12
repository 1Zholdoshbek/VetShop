<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\View\View;

class IndexController extends Controller
{
    public  function index():View
    {
        return view('admin.index');
    }

}
