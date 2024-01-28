@extends('header')

@section('content')

@include('layouts.message')

<section class="">

  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="container" style="padding: 10px 150px; margin-bottom:200px;">

        <div class="">
          <table class="table" style="font-size:medium;">
            <thead>
              <tr>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
           @php
             $totaprice = 0;
           @endphp
                
              @foreach ($carts as $cart )
                
             
              <tr>
                <td >
                  <img src="{{asset('images/products/'.$cart->product->photopath)}}" class="image-fluid" style="width: 120px;" alt="">
                  
                    <!-- src="{{asset('images/products/'.$cart->product->photopath)}}" class="img-fluid"
                      style="width: 120px;" alt=""> -->
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">{{$cart->product->name}}</p>
                </td>
                <form action="{{route('cart.update',$cart->id)}}" method="POST" id="updateform">
                  @csrf
                <td class="align-middle">
                  <div class="d-flex flex-row">
                    <!-- <button class="btn btn-link px-2"
                    onclick="decreaseQuantity(this)">
                      <i class="fas fa-minus"></i>
                    </button>

                    <input id="quantity-{{$cart->id}}" min="1" max="{{$cart->product->stock}}" name="quantity" value="{{$cart->qty}}" type="number" class="form-control form-control-sm quantity-input" style="width: 50px;" onchange="updateTotal(this)" />

                    <button class="btn btn-link px-2"
                    onclick="increaseQuantity(this)">
                      <i class="fas fa-plus"></i>
                    </button> -->
                    <span class="bg-gray-200 px-4 font-bold text-xl"><button onclick="subqty('{{ $cart->id }}')" type="button">-</button></span>
                    <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty{{ $cart->id }}" name="qty" value="{{  $cart->qty  }}" type="number" readonly >
                    <span class="bg-gray-200 px-4  font-bold text-xl"><button onclick="addqty('{{ $cart->id }}')" type="button">+</button></span>

                    <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stock }}">
                  </div>
                </td>
                <td class="align-middle">Rs<span id="rate{{$cart->id}}">{{$cart->product->price}}</span>/-</td>

                <td class="align-middle" id="total{{$cart->id}}">Rs {{$cart->qty * $cart->product->price}}/-</td>

                <td class="align-middle">
                    

                    <button onclick="document.getElementById('updateform').submit();" type="submit" class="px-2 py-1">Update</button>
                    </form>
                    <a onclick="return confirm('Are you sure to delete?')" href="{{route('cart.destroy',$cart->id)}}"><i class="fa fa-trash-o"></i></a>

                </td>


              </tr>
              @php
                $totaprice += $cart->product->price * $cart->qty
              @endphp
              @endforeach
            </tbody>
          </table>
        </div>

        <div class=" shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

           
              
              <div class="col-lg-6 ml-200 mr-2 mb-200 mt-2" style="margin-left: 20rem;">
                <div class="d-flex justify-content-between" style="font-size:large;">
                  <p class="mb-2">Grand Total</p>
                  <p class="mb-2">Rs {{$totaprice}}/-</p>
                </div>

               

                <hr class="my-4">

                

                <!-- <a href="{{route('cart.checkout')}}" class="bg-blue-600  btn-block btn-lg">
                  <div class="text-center">
                    Checkout
                    
                  </div>
                </a>

                <a href="{{route('products')}}" class="bg-blue-600  btn-block btn-lg float-left">
                  <div class="text-center">
                   <-- Continue Shopping
                    
                  </div>
                </a> -->
                <div class="checkout_btn_inner float-right">
    <a class="btn_1" href="{{ route('products') }}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; margin-right:18rem;">Continue Shopping</a>

    @if($carts->isEmpty())
        <button class="btn_1 checkout_btn_1" disabled style="display: inline-block; padding: 10px 20px; background-color: #ccc; color: #fff; text-decoration: none; border-radius: 5px; cursor: not-allowed;">Proceed to checkout</button>
        <p class="error-message" style="color: #ff0000; margin-top: 10px; font-size:medium;">Your cart is empty. Please add items to your cart before proceeding to checkout.</p>
    @else
        <a class="btn_1 checkout_btn_1" href="{{ route('cart.checkout') }}" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: #fff; text-decoration: none; border-radius: 5px;">Proceed to checkout</a>
    @endif
</div>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script>
  

  function addqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);
    var stock = document.getElementById('stock'+x).value;
    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue+1);
    var link = document.getElementById()
    }
    
  }

  function subqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue-1);
    }
    
  }
    
  </script>




@endsection