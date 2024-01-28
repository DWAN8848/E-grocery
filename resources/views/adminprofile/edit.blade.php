@extends('layouts.app')

<style>
  /* CSS styles for the form */
  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px 10px; /* Increase the top and bottom padding */
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-group {
    margin-bottom: 20px;
    font-size:medium ;
    
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
   
  }

  .form-group input[type="text"],
  .form-group input[type="email"],
  .form-group input[type="tel"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: medium;
  }

  .form-group .submit-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px; /* Increase the font size */
    text-decoration: none;
  }

  .button-container{
    display: inline-block;
    padding: 10px 20px;
    margin-left: 8rem;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-size: medium;
  }

  .button-container:hover {
    background-color: #45a049;
  }
</style>

@section('content')
<h2 class="font-bold text-4xl text-blue-700">Edit Admin Profile</h2> 
    <hr class="h-1 bg-blue-200">

<div class="form-container">
<img class="profile-picture" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture" style="display: block; margin: 0 auto 20px; width: 150px; height: 150px; border-radius: 50%;">

  

  <form action="{{route('userprofile.update')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="{{auth()->user()->name}}" class="@error('name') is-invalid @enderror" required>
      @error('name')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" value="{{auth()->user()->address}}" class="@error('address') is-invalid @enderror" required>
      @error('address')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value=" {{auth()->user()->email}}"  class="@error('email') is-invalid @enderror" required>
      @error('email')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone" value="{{auth()->user()->phone}}"  class="@error('phone') is-invalid @enderror" required>
      @error('phone')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="button-container">
        <button type="submit" class="button-link">Upadte Profile</button>
       
    </div>
  
  </form>
</div>
@endsection