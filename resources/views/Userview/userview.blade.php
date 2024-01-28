@extends('layouts.app')
@section('content')
@include('layouts.message')

<h2 class="font-bold text-4xl text-blue-700">Users</h2>
<hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
        <a href="{{route('Userview.createadmin')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Admin</a>
    </div>

<table id="mytable" class="display">
    <thead>
        <th>S.N.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Role</th>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->role}}</td>
           
        </tr>
        @endforeach
    </tbody>

</table>



<script>
    let table = new DataTable('#mytable');
</script>





@endsection