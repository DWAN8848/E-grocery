<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function include()
    {
        if(!auth()->user())
        {
            return 0;
        }
        else
        {
            return Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
        }
    }

    public function home()
    { 
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        return view('welcome',compact('products','categories','itemsincart'));
    }

    public function about()
    {
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        return view('aboutus',compact('products','categories','itemsincart'));
    }

    public function products()
    {
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        return view('products',compact('products','categories','itemsincart'));
    }

    public function contact()
    {
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        return view('contact',compact('products','categories','itemsincart'));

    }

    


    public function viewproduct(Product $product)
    {
        $itemsincart = $this -> include();
        $relatedproducts = Product::where('category_id',$product->category_id)->whereNot('id',$product->id)->get();
        $categories = Category::all();
        return view('viewproduct',compact('product','categories','itemsincart','relatedproducts'));
    }

    public function order()
    {
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::where('user_id',auth()->user()->id)->get();
        foreach($orders as $order)
        {
            $cartids = explode(',',$order->cart_id);
            $carts = [];
            foreach($cartids as $cartid)
            {
                $cart = Cart::find($cartid);
                array_push($carts,$cart);
            }
            $order->carts = $carts;
        }
        return view('vieworder',compact('products','categories','itemsincart','orders'));
    }

    public function search(Request $request)
    {
        $itemsincart = $this -> include();
        $searchText = $request->input('searchtext');
        $products = Product::where('name', 'like', '%' . $searchText . '%')
            ->orWhereHas('category', function ($query) use ($searchText) {
                $query->where('name', 'like', '%' . $searchText . '%');
            })
            ->orWhere('price', 'like', '%' . $searchText . '%')
            ->with('category')
            ->get();
            foreach($products as $product){
                $categoryname=$product->category->name;
            }

        return view('search', compact('products','itemsincart'));
    }

}
