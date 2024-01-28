@extends('header')


@section('content')

<div style="border: 2px solid black; border-radius: 10px; padding: 20px; width: fit-content; margin: 60px auto;">
  <div style="width: 400px; margin: 0 auto; margin-top: 50px;">
    <div class="ml-40">
      <img src="{{ asset('images/products/logo.jpg') }}" alt="Logo" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; border: 2px solid black;">
    </div>
    <div class="mt-20">
      <h1 style="text-align: center; font-size: 24px;">REGISTER</h1>
    </div>
    <div class="fa-3x text-center">
      <i class="fa-solid fa-cog fa-spin" style="color: #09d7b5;"></i>
      <i class="fa-solid fa-cog fa-spin fa-spin-reverse" style="color: #09d7b5;"></i>
    </div>

    <form action="{{route('user.register')}}" method="POST">
      @csrf
      <div style="margin-bottom: 20px;">
        <label for="name" style="font-size: 16px;">
          <i class="fa-solid fa-user fa-bounce fa-md" style="color: #09d7b5;"></i>  Name
        </label>
        <input type="text" name="name" placeholder="Enter your name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label for="email" style="font-size: 16px;">
          <i class="fa-solid fa-envelope fa-bounce fa-md" style="color: #09d7b5;"></i>  Email
        </label>
        <input type="text" name="email" placeholder="Enter your email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label for="address" style="font-size: 16px;">
          <i class="fa-solid fa-home fa-bounce fa-md" style="color: #09d7b5;"></i>  Address
        </label>
        <input type="text" name="address" placeholder="Enter your address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;" required>
        @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label for="phone" style="font-size: 16px;">
          <i class="fa-solid fa-phone fa-bounce fa-md" style="color: #09d7b5;"></i>  Phone Number
        </label>
        <input type="text" name="phone" placeholder="Enter your phone number"  class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone') }}" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;" required>
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label for="password" style="font-size: 16px;">
          <i class="fa-solid fa-lock fa-bounce fa-md" style="color: #09d7b5;"></i>  Password
        </label>
        <input type="password" name="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" style="width: 100%; padding: 10px; border-radius: 5px; font-size: 16px;" required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom: 20px;">
        <label for="password_confirmation" style="font-size: 16px;">
          <i class="fa-solid fa-lock fa-bounce fa-md" style="color: #09d7b5;"></i>  Confirm Password
        </label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" style="width: 100%; border-radius: 5px; padding: 10px; font-size: 16px;" required>
      </div>


      <button type="submit" style="display: block; width: 100%; padding: 10px; border-radius: 5px; border: none; background-color: #09d7b5; color: #fff; font-size: 16px; cursor: pointer;">Register</button>
    </form>
    <div class="mt-10 text-center">
      
      <p style="font-size: medium;">If you already have an account?<a href="{{route('userlogin')}}" style="color: #09d7b5;">Login Here</a></p>
    </div>
  </div>
</div>


@endsection