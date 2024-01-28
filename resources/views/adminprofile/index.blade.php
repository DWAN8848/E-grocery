@extends('layouts.app')

<style>
  /* CSS styles for the form */
  .form-container {
    max-width: 400px;
    max-height: auto;
    margin: 0 auto;
    margin-top: 80px;
    padding: 50px 10px; /* Increase the top and bottom padding */
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

  .button-container  {
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
<h2 class="font-bold text-4xl text-blue-700">Admin Profile</h2> 
    <hr class="h-1 bg-blue-200">

<div class="form-container">
 
<img class="profile-picture" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture" style="display: block; margin: 0 auto 20px; width: 150px; height: 150px; border-radius: 50%;">

  <form>
    <div class="form-group">
      <label for="name">Name: {{auth()->user()->name}}</label>
      <!-- <input type="text" id="name" name="name" placeholder="Enter your name" required> -->
    </div>

    <div class="form-group">
      <label for="address">Address: {{auth()->user()->address}}</label>
      <!-- <input type="text" id="address" name="address" placeholder="Enter your address" required> -->
    </div>

    <div class="form-group">
      <label for="email">Email: {{auth()->user()->email}}</label>
      <!-- <input type="email" id="email" name="email" placeholder="Enter your email" required> -->
    </div>

    <div class="form-group">
      <label for="phone">Phone: {{auth()->user()->phone}}</label>
      <!-- <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required> -->
    </div>

    <div class="button-container">
        <a href="{{route('adminprofile.edit',auth()->user()->id)}}" class="button-link">Edit Profile</a>
       
    </div>
    <!-- <a href="#" class="submit-link">Submit</a> -->
  </form>
</div>


@endsection