@extends('header')

@section('content')


<div style="border: 2px solid black; border-radius: 10px; padding: 20px; width: fit-content; margin: 60px auto;">
  <div style="width: 400px; margin: 0 auto; margin-top: 50px;">
    <div class="ml-40">
      <img src="{{ asset('images/products/logo.jpg') }}" alt="Logo" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; border: 2px solid black;">
    </div>
    <div class="mt-20">
      <h1 style="text-align: center; font-size: 24px;">LOGIN</h1>
    </div>
    <div class="fa-3x text-center">
      <i class="fa-solid fa-cog fa-spin" style="color: #09d7b5;"></i>
      <i class="fa-solid fa-cog fa-spin fa-spin-reverse" style="color: #09d7b5;"></i>
    </div>

    <form action="{{route('login')}}" method="POST">
      @csrf
      <div style="margin-bottom: 20px;">
        <label for="username" style="font-size: 16px;">
          <i class="fa-solid fa-envelope fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Email
        </label>
        <input type="text" name="email" placeholder="Enter your email" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;">
      </div>
      <div style="margin-bottom: 20px;">
        <label for="password" style="font-size: 16px;">
          <i class="fa-solid fa-lock fa-bounce fa-2xl" style="color: #09d7b5;"></i>  Password
        </label>
        <input type="password" name="password" placeholder="Enter your password" style="width: 100%; padding: 10px; border-radius: 5px; font-size: 16px;">
      </div>
      <div class="mt-1">
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <span class="text-danger d-block">{{ $error }}</span>
       @endforeach
      @endif
      </div>
      <button type="submit" style="display: block; width: 100%; padding: 10px; border-radius: 5px; border: none; background-color: #09d7b5; color: #fff; font-size: 16px; cursor: pointer;">Login</button>
    </form>
    <div class="mt-10 text-center">
      <p style="font-size: medium;"><a href="{{route('password.request')}}" style="color: #09d7b5;">Forget Password?</a></p>
      <p style="font-size: medium;">If you don't have an account?<a href="{{route('user.register')}}" style="color: #09d7b5;">Register Here</a></p>
    </div>
  </div>
</div>

        


@endsection