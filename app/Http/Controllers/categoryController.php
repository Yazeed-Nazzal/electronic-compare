<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $categories = Category::paginate(1);

        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Category::create([
            'category_name'=>$request->name,
        ]);
        
        session()->flash('success','Category Create successfully');

        return redirect()->route('category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        $category = Category::find($category);
        
        return view('category.index',compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $category->update([
            'category_name'=>$request->name,
        ]);

        session()->flash('success','Update Category Successfully');

        return redirect()->route('category.index');
    }

  
    public function destroy(Category $category)
    {
      $category->delete();
        
      session()->flash('success','Delete Category successfully');

      return redirect()->route('category.index');
    }
}
