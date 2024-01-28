@extends('layouts.app')
@section('content')
@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">Orders Details</h2>
<hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">

</div>
<table id="myTable" class="display">
    <thead>
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Product Price</th>
        <th>Total</th>
       
       
    </thead>
    <tbody>
        @foreach ($carts as $cart )
            
    
        <tr>
            <td><img class="w-14" src="{{asset('images/products/'.$cart->product->photopath)}}" alt=""></td>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->qty}}</td>
            <td>Rs {{$cart->Product->price}}/-</td>
            <td>Rs {{$cart->qty * $cart->Product->price}}/-</td>
          
            
            
        </tr>
        @endforeach
    </tbody>
</table>

<div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('order.destroy')}}" method="GET">
                    @csrf
                    <p class="font-bold text-2xl">Are you Sure to Delete?</p>
                    <input type="hidden" name="dataid" id="dataid" value="">
                    <div class="flex justify-center">
                        <input type="submit" value="Yes" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">
                        <a onclick="hideDelete()" class="bg-red-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
let table = new DataTable('#myTable');
</script>

<script>
        function showDelete(x)
        {
            // $('#dataid').val(x);
            document.getElementById('dataid').value = x;
            document.getElementById('deleteModal').style.display = "block";
        }
        function hideDelete()
        {
            document.getElementById('deleteModal').style.display = "none";
        }
    </script>
@endsection