<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class FrontAdsController extends Controller
{
    public function index()
    {
        //Category Game
        $category = Category::CategoryGame();
        
        $ads = Advertisement::ads($category->id);
        
        $ads2 = Advertisement::ads2($category->id);

        //Category Movie
        $categoryMovie = Category::CategoryMovie();

        $adsMovie = Advertisement::adsMovie($categoryMovie->id);

        $ads2Movie = Advertisement::ads2Movie($categoryMovie->id);

        return view('index', compact('category', 'ads', 'ads2', 'categoryMovie', 'adsMovie', 'ads2Movie'));
    }
}
