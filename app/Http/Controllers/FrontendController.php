<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Childcategory;

class FrontendController extends Controller
{

    public function findBasedOnCategory( Category $categorySlug )
    {
        $ads = $categorySlug->ads;
        $filterBySubcategory = Subcategory::where('category_id',$categorySlug->id)->get();
        return view('product.category',compact('ads', 'filterBySubcategory'));
    }


    public function findBasedOnSubCategory( Request $request, $categorySlug, Subcategory $subcategorySlug )
    {
        $adsBaseOnFilter = Advertisement::where('subcategory_id',$subcategorySlug->id)
        ->when($request->minPrice, function($query,$minPrice){
            return $query->where('price','>=',$minPrice);
        })->when($request->maxPrice,function($query,$maxPrice){
            return $query->where('price','<=',$maxPrice);
        })->get();

        $adsWithoutFilter = $subcategorySlug->ads;

        $filterBychildCategory = $subcategorySlug->ads->unique('childcategory_id');

        $ads = $request->minPrice || $request->maxPrice ?

        $adsBaseOnFilter:$adsWithoutFilter;

        return view('product.subcategory',compact('ads','filterBychildCategory'));
    }

    public function findBasedOnChildCategory( Request $request, $categorySlug, Subcategory $subcategorySlug, Childcategory $childcategorySlug )
    {
        $adsBaseOnFilter = Advertisement::where('childcategory_id',$childcategorySlug->id)
        ->when($request->minPrice, function($query,$minPrice){
            return $query->where('price','>=',$minPrice);
        })->when($request->maxPrice,function($query,$maxPrice){
            return $query->where('price','<=',$maxPrice);
        })->get();

        $adsWithoutFilter = $childcategorySlug->ads;

        $filterBychildCategory = $subcategorySlug->ads->unique('childcategory_id');

        $ads = $request->minPrice || $request->maxPrice ?

        $adsBaseOnFilter:$adsWithoutFilter;

        return view('product.childcategory',compact('ads','filterBychildCategory'));
    }

    public function show($id, $slug)
    {
        $ads = Advertisement::where('id',$id)->where('slug',$slug)->first();
        dd($ads);
    }
}
