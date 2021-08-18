<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu()
    {
        $menus = Category::with('subcategory')->get();
        return view('index',compact('menus'));
    }
}
