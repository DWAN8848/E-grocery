<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('Userview.userview',compact('users'));
    }


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

    public function userlogin()
    {
        return view('userlogin');
    }

    public function userregister()
    {
        $categories = Category::all();
        return view('userregister',compact('categories'));
    }

    public function userstore(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
            'phone' => ['required', 'regex:/^(98|97)\d{8}$/'],
            'email' => ['required', 'email', Rule::unique('users')],
            'address' => ['required', 'regex:/^[a-zA-Z]/'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $data['password'] = Hash::make($data['password']);
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
            $data['role']='admin';
            User::create($data);
            return redirect(route('userview.index'))->with('success','Admin Created Successfully');
        }
        }
        else{

       
        $data['role'] = 'user';

        User::create($data);
        
        return redirect(route('userlogin'))->with('success','User Created Successfully');
        }
    
    }
    

    public function userprofile(Request $id)
    {
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        $users = User::find($id);
        return view('userprofile',compact('itemsincart','categories','products','users'));
    }

    public function editprofile(Request $id)
    {
        $itemsincart = $this -> include();
        $categories = Category::all();
        $products = Product::all();
        $users = User::find($id);
        return view('editprofile',compact('itemsincart','categories','products','users'));
    }

    public function userupdate(Request $request){
        $user = User::find(auth()->user()->id);
        $data = $request->validate([
            'name' => ['required', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
            'phone' => ['required', 'regex:/^(98|97)\d{8}$/'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'address' => ['required', 'regex:/^[a-zA-Z]/'],
           
        ]);
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
            $data['role']='admin';
            $user->update($data);
            return redirect(route('adminprofile.index'));
        }
        else
        {
            $data['role']='users';
            $user->update($data);
            return redirect()->route('userprofile',$user->id);
        }
        
        }
    }

    public function createadmin()
    {
        return view('Userview.createadmin');
    }

    public function adminprofile(){
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
        return view('adminprofile.index');
            }
    }
    
    }
    public function adminedit(){
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
                return view('adminprofile.edit');
            }
        }          
    }
}
