<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatrgoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('category.index',compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories',
            'priority' => 'required|numeric',
        ]);
        
        Category::create($data);
        return redirect(route('category.index'))->with('success','Category created successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data = $request -> validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'priority' => 'required|numeric',
        ]);

       
        $category->update($data);
        return redirect(route('category.index'))->with('success','Category updated successfully!');
    }

    

    public function destroy(Request $request)
    {
        $category = Category::find($request->dataid);
        if(Product::where('category_id',$category->id)->count()>0)
         {
             return back()->with('success','Cannot Delete this Category.Related products exist.');
         }
        $category->delete();
        return redirect(route('category.index'))->with('success','Category deleted successfully');
    }
}
