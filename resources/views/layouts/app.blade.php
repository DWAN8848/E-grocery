<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src="{{asset('datatable/datatables.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body class="font-sans antialiased">
    <div class="">
            <div class="w-56 fixed top-0 bottom-0 left-0 bg-gray-200 shadow-lg shadow-red-300">
                <img class="bg-white mx-4 w-44 my-5 rounded-lg py-3" src="{{asset('images/products/logo.jpg')}}"
                alt="">

                <div>
                    <a href="/dashboard" class="text-xl font-bold border-b-2 border-blue-500 block ml-4 px-2
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-gauge" style="color: #cbd71d;"></i> Dashboard</a>

                    <a href="{{route('userview.index')}}" class="text-xl font-bold border-b-2 border-blue-500 block ml-4 px-2
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-users" style="color: #cbd71d;"></i> Users</a>

                    <a href="{{route('category.index')}}" class="text-xl font-bold border-b-2 border-blue-500 block ml-4 px-2
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-solid fa-square-poll-horizontal" style="color: #cbd71d;"></i> Categories</a>

                    <a href="{{route('product.index')}}" class="text-xl font-bold border-b-2 border-blue-500 block ml-4 px-2
                    py-1 hover:bg-blue-500 hover:text-white"> <i class="fa-brands fa-product-hunt" style="color: #cbd71d;"></i>Products</a>

                    <a href="{{route('order.index')}}" class="text-xl font-bold border-b-2 border-blue-500 block ml-4 px-2
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-brands fa-first-order-alt" style="color: #cbd71d;"></i>Orders</a>

                    <a href="{{route('adminprofile.index')}}" class="text-xl font-bold border-b-2 border-blue-500 block ml-4 px-2
                    py-1 hover:bg-blue-500 hover:text-white"><i class="fa-regular fa-id-card" style="color: #cbd71d;"></i> Profile</a>


                    <form action="{{route('logout')}}" method="POST" class=" border-b-2 border-blue-500 ml-4">
                        @csrf
                        <input type="submit" value="Logout" class="text-xl font-bold block  px-2 py-1 w-full text-left cursor-pointer hover:bg-blue-500 hover:text-white"> 

                    </form>

                    

                </div>

            </div>

            <div class=" p-4 pl-60 ">
                @yield('content')

            </div>

        </div>
    </body>
</html>
