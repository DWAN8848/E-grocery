<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:products',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1',
            'description' => 'required|string',
            'photopath' => 'required|image',


        ]);
        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            $data['photopath'] = $name;
        }
        Product::create($data);
        return redirect(route('product.index'))->with('success','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:products,name,'.$product->id,
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1',
            'description' => 'required|string',
            'photopath' => 'nullable|image',


        ]);
        if($request->hasFile('photopath')){
            $image = $request->file('photopath');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath,$name);
            File::delete(public_path('images/products/'.$product->photopath));
            $data['photopath'] = $name;
        }
        $product->update($data);
       
        return redirect(route('product.index'))->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->dataid);
    
        // Check if the product is in the "carts" table
        if (Cart::where('product_id', $product->id)->exists()) {
            return redirect(route('product.index'))->with('success', 'Product is in a cart and cannot be deleted.');
        }
    
        // Delete the associated product image
        File::delete(public_path('images/products/'.$product->photopath));
    
        // Delete the product
        $product->delete();
    
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');
    }
}
