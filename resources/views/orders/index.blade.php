@extends('layouts.app')
@section('content')
@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">Orders</h2>
<hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">

</div>
<table id="myTable" class="display">
    <thead>
        <th>Order Date</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Total Amount</th>
        <th>Payment Mode</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($orders as $order )
            
    
        <tr>
            <td>{{$order->order_date}}</td>
            <td>{{$order->person_name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->shipping_address}}</td>
            <td>Rs {{$order->amount}}/-</td>
            <td>{{$order->payment_method}}</td>
            <td>{{$order->status}}</td>
            <td>
                <a href="{{route('order.detail',$order->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded hover:shadow-blue-400">View Details</a>
                @if($order->status=='Pending')
                    <a  onclick="return confirm('Are you sure to change status?')" href="{{route('order.status',[$order->id,'Processing'])}}" class="bg-cyan-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-spinner fa-spin mr-1"></i></a>
                    <a onclick="return confirm('Are you sure to change status?')" href="{{ route('order.status', [$order->id, 'Cancelled']) }}" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">
                        <i class="fas fa-times-circle mr-1"></i> 
                      </a>
                      
                    @elseif($order->status=='Processing')
                    <a  onclick="return confirm('Are you sure to change status?')" href="{{route('order.status',[$order->id,'Completed'])}}" class="bg-green-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-check-circle mr-1"></i> </a>
                    @endif

             </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('category.destroy')}}" method="POST">
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