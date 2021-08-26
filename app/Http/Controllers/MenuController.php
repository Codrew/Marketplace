<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class MenuController extends Controller
{
    public function menu()
    {
        $category = Category::where('name','game')->first();

        $ads = Advertisement::where('category_id',$category->id)->orderByDesc('id')
                            ->take(4)->get();

        $ads2 = Advertisement::where('category_id',$category->id)->whereNotIn('id',$ads->pluck('id')
                             ->toArray())->take(4)->get();

        return view('index',compact('ads','ads2','category'));
    }
}
