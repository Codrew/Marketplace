<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class FrontendController extends Controller
{
    public function findBasedOnSubCategory($categorySlug, $subcategorySlug)
    {
        $sub = Subcategory::where('slug',$subcategorySlug)->first();
        $subId = $sub->id;
        $ads = Advertisement::where('subcategory_id',$subId)->get();
        dd($ads);
        return view('product.subcategory');
    }
}
