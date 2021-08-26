<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class FrontAdsController extends Controller
{
    public function index()
    {
        $category = Category::CategoryGame();
        
        $ads = Advertisement::ads($category->id);
        
        $ads2 = Advertisement::ads2($category->id);

        return view('index',compact('category','ads','ads2'));
    }
}
