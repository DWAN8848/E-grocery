<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $category=Category::count();
        $products=Product::count();
        $user=User::count();
        $order=Order::count();
        $chartdata = DB::table('carts')
        ->selectRaw('DATE(carts.created_at) AS date')
        ->selectRaw('COUNT(DATE(carts.created_at)) as orders')
        ->selectRaw('SUM(derived_products.sales) as sales')
        ->joinSub(function ($query) {
            $query->selectRaw('id, price as sales')
                ->from('products');
        }, 'derived_products', function ($join) {
            $join->on('carts.product_id', '=', 'derived_products.id');
        })
        ->groupBy('date')
        ->get();
    

        $month = date('Y-m');

        $chartdata = $chartdata->whereBetween('date', [$month . '-01', $month . '-31']);
        
  

        $orderdates=$chartdata->pluck('date');
       
        $sales=$chartdata->pluck('sales');
          $ordercount=$chartdata->pluck('orders');
        

          $totalSales = $chartdata->sum('sales');
        
          $totalOrders = $chartdata->sum('orders');

        return view('dashboard',compact('category','products','user','order','orderdates','ordercount','sales','totalSales','totalOrders'));
    }

    public function changemonth(Request $request){



        $chartdata =DB::table('carts')
        ->selectRaw('DATE(carts.created_at) AS date')
        ->selectRaw('COUNT(DATE(carts.created_at)) as orders')
        ->selectRaw('SUM(derived_products.sales) as sales')
        ->joinSub(function ($query) {
            $query->selectRaw('id, price as sales')
                ->from('products');
        }, 'derived_products', function ($join) {
            $join->on('carts.product_id', '=', 'derived_products.id');
        })
        ->groupBy('date')
        ->get();
       
               $month = $request->month;
               
               $chartdata = $chartdata->whereBetween('date', [$month . '-01', $month . '-31']);
               
         
       
               $orderdates=$chartdata->pluck('date');
            
               $sales=$chartdata->pluck('sales');
                 $ordercount=$chartdata->pluck('orders');
       
          // Calculate total sales, total profit, and total orders
          $totalSales = $sales->sum();
       
          $totalOrders = $ordercount->sum();
       
          $response = [
              'orderdates' => $orderdates,
          
              'sales' => $sales,
              'ordercounts' => $ordercount,
              'totalSales' => $totalSales,
              'totalOrders' => $totalOrders
          ];
       
       
       
       
               return response()->json($response);
       
       
           }
       
       
}
       

