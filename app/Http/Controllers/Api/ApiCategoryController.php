<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;

class ApiCategoryController extends Controller
{
    public function getCategory()
    {
        $category = Category::get();
        return response()->json($category);
    }

    public function getSubcategory(Request $request)
    {
        $subcategory = Subcategory::where('category_id',$request->category_id)->get();
        return response()->json($subcategory);
    }

    public function getChildcategory(Request $request)
    {
        $childcategory = Childcategory::where('subcategory_id',$request->subcategory_id)->get();
        return response()->json($childcategory);
    }
}
