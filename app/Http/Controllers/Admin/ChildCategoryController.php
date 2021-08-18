<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChildCategoryFormRequest;
use App\Http\Requests\ChildcategoryUpdateFormRequest;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories = Childcategory::orderBy('subcategory_id')->get();
        return view('admin.childcategory.index',compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('admin.childcategory.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildCategoryFormRequest $request)
    {
        Childcategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('admin.childcategory.index')->with('message','Childcategory successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $childcategory = Childcategory::find($id);
        $subcategories = Subcategory::all();  
        return view('admin.childcategory.edit',compact('childcategory','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildcategoryUpdateFormRequest $request, $id)
    {
        Childcategory::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'subcategory_id' => $request->subcategory_id,
        ]);
        return redirect()->route('admin.childcategory.index')->with('message','Childcategory was updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Childcategory::findOrFail($id)->delete();
        return back()->with('message','Childcategory successfully deleted.');
    }
}
