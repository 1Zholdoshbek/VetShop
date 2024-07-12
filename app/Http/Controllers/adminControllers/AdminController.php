<?php

namespace App\Http\Controllers\adminControllers;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\View\View;

class AdminController extends Controller
{
    public  function index():View
    {
    return view('admin');
    }
}
