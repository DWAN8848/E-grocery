@extends('header')
@include('layouts.message')
<style>
   /* Add this CSS code to your existing stylesheet or create a new one */

.content-wrapper {
    /* display: flex; */
    justify-content: center;
    align-items: center;
    margin-left: 25rem;
    
    min-height: calc(100vh - 100px); /* Adjust the value as needed */
}

@media (max-width: 640px) {
    .content-wrapper {
        flex-direction: column;
    }
}

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
<div class="text-center" style="font-size:0.6in;">PRODUCT DETAILS</div>
<div class="content-wrapper">

    <div class="grid grid-cols-3 px-56 gap-14 my-40 items-center">
    
        <div class="col-span-3 sm:col-span-1">
        <h1 class="text-5xl" style="margin-left: 5rem;">Product Image</h1>
            <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="object-cover rounded-lg mx-auto sm:mx-0 sm:w-96 sm:h-96">
        </div>
        <div class="border-1-2 px-10 col-span-3 sm:col-span-2 flex flex-col justify-between h-full">
            <div>
               
                <h4 class="text-3xl">Product Name: {{$product->name}}</h4>
                <p class="text-red-700 text-2xl font-bold">Price: Rs. {{$product->price}}/-</p>
                <p style="font-size: medium;">Quantity</p>
                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                    <p class="mt-4 flex items-center">
                        <span class="bg-gray-200 px-4 py-2 font-bold text-xl quantity-control" data-operation="decrease">-</span>
                        <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100 quantity-input" type="number" name="qty" value="1" min="1" max="{{$product->stock}}">
                        <span class="bg-gray-200 px-4 py-2 font-bold text-xl quantity-control" data-operation="increase">+</span>
                    </p>
                    <br>
                    <p style="font-size: medium;">In Stock: {{$product->stock}}</p>

                    <div class="mt-14">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow" style="font-size: medium;">Add to Cart</button>
                    </div>
                </form>
            </div>
            <div class="mt-10">
                <h2 class="font-bold text-2xl" style="font-size: medium;">Description</h2>
                <p style="font-size: medium;">{{$product->description}}</p>
            </div>
        </div>
    </div>
    <div class="text-center" style="font-size:0.6in; margin-right:20rem;">RELATED PRODUCTS</div>
    <div class="row featured isotope">
                    @foreach ($relatedproducts as $product )
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
                   
                </div>
</div>




   <script>
    const quantityInput = document.querySelector('.quantity-input');
    const decreaseBtn = document.querySelector('.quantity-control[data-operation="decrease"]');
    const increaseBtn = document.querySelector('.quantity-control[data-operation="increase"]');

    decreaseBtn.addEventListener('click', () => {
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });

    increaseBtn.addEventListener('click', () => {
        if (parseInt(quantityInput.value) < parseInt(quantityInput.max)) {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }
    });
</script>
@endsection


