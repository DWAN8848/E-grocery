@extends('header')
@include('layouts.message')
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



        <section class="slider-section">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators slider-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{asset('frontend/images/sliderimage1.jpg')}}" alt="">
                        <div class="carousel-caption">
                            <h2>GROCERY STORE</h2>
                            <h3>THAT LIVES IN YOUR <Span>POCKET</Span></h3>
                            <a href="{{route('products')}}">Buy Now</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('frontend/images/sliderimage2.jpg')}}" alt="">
                        <div class="carousel-caption">
                        <h2>GROCERY STORE</h2>
                            <h3>THAT LIVES IN YOUR <Span>pOCKET</Span></h3>
                            <a href="{{route('products')}}">Buy Now</a>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="{{asset('frontend/images/sliderimage3.jpg')}}" alt="">
                        <div class="carousel-caption">
                        <h2>GROCERY STORE</h2>
                            <h3>THAT LIVES IN YOUR <Span>pOCKET</Span></h3>
                            <a href="{{route('products')}}">Buy Now</a>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="pe-7s-angle-left glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="pe-7s-angle-right glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </section>

       

        <section class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>FEATURED PRODUCTS</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-menu">
                            <ul class="button-group sort-button-group">
                                
                                @foreach ($categories as $category )
                                <li class="button active" data-category="{{$category->id}}">{{$category->name}}</li> 
                                @endforeach
                             
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row featured isotope">
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
                   
                </div>

          

            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>GET IN TOUCH</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1><span>G</span>rocery Store</h1>
                            <h3>We'd love To Meet You In Person Or Via The Web!</h3>
                            <p>Our aim is to expand the online community by becoming the nations favorite e commerce platform through our very own SMART fundamentals.</p>
                            <div class="contact-info">
                                
                                <p><b>Phone:</b> +9779826439230</p>
                                <p><b>Email:</b> dwan8848@gmail.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                    
                                    <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="{{route('contact.submit')}}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" placeholder="Your Name">
                                        @error('name')
                                       <div class="invalid-feedback" style="font-size: medium; color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="name" name="email" placeholder="Your Email">
                                        @error('email')
                                       <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="message" id="message" class="form-control" cols="30" rows="5" placeholder="Your Message..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Send" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection        

