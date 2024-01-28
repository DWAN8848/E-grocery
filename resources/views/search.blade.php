@extends('header')
<style>
    .quantity-label {
    display: inline-block;
    width: 100px; /* Adjust the width as needed */
    text-align: right;
    font-size: 16px; /* Adjust the font size as needed */
}

.quantity-input {
    width: 60px; /* Adjust the width as needed */
    font-size: 16px; /* Adjust the font size as needed */
}

.product-container {
    height: 400px; /* Set the desired height for the product containers */
}
.product-item {
    position: relative;
    width: 255px; /* Set the desired width for the product item */
    height: 322px; /* Set the desired height for the product item */
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}




</style>
@section('content')


<div class="row featured isotope">
    @if (count($products)>0)
        
   

                    @foreach ($products as $product )
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item">
                            <img src="{{asset('images/products/'.$product->photopath)}}" class="img-responsive product-image" alt="">
                            <div class="product-hover">
                             <div class="product-meta" style="display: flex; align-items: center; margin: 10px; margin-left:20px;">
                                 <!-- <label for="quantity" class="quantity-label text-white" style="margin: 10px; margin-bottom: 100px;">Quantity:</label> -->
                                 <form action="{{route('cart.store')}}" method="POST">
                                    @csrf
                                 <!-- <input type="number" name="qty" min="1" max="{{$product->stock}}" value="1" class="quantity-input" style="background-color: #f0f0f0;"> -->
                                 <input type="hidden" name="product_id" value="{{$product->id}}">
                                 <!-- <button type="submit" style="background-color: #e8e8e8; color: #000; font-weight: bold; font-size: 16px; padding-right: 10px; padding-left: 10px;"><i class="pe-7s-cart"></i>Add to Cart</button> -->
                             </div>
                            </div>
                            <div class="product-title">
                                <a href="{{route('viewproduct',$product->id)}}">
                                    <h3>{{$product->name}}</h3>
                                    <span>Rs. {{$product->price}}</span>
                                </a>
                            </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center" style="font-size: large; margin-bottom: 25rem;">No Products Found</p>
                    @endif
                </div>

@endsection