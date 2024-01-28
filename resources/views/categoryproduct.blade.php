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
                        <img src="{{asset('frontend/images/sliderimage1.jpg')}}" width="1648" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>DRESSES <b>&</b> JEANS</h2>
                            <h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
                            <a href="#">Buy Now</a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('frontend/images/sliderimage2.jpg')}}" width="1648" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>DRESSES <b>&</b> JEANS</h2>
                            <h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
                            <a href="#">Buy Now</a>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="{{asset('frontend/images/sliderimage3.jpg')}}" width="1648" height="600" alt="">
                        <div class="carousel-caption">
                            <h2>DRESSES <b>&</b> JEANS</h2>
                            <h3>FROM OURFAMOUS BRANDS <Span>SALE</Span></h3>
                            <a href="#">Buy Now</a>
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
                                <li class="button active" data-category="all">All</li>
                                @foreach ($categories as $category )
                                <li class="button" data-category="{{$category->id}}">{{$category->name}}</li> 
                                @endforeach
                              {{--  <li class="button" data-category="cat-1">Dresses and Suits</li>
                                <li class="button" data-category="cat-2">Accessories</li>
                                <li class="button" data-category="cat-3">Miscellaneous</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="row featured isotope">
                    @foreach ($products as $product )
                    <div class="col-md-3 col-sm-6 col-xs-12 cat-3 featured-items isotope-item">
                        <div class="product-item product-container">
                            <img src="{{asset('images/products/'.$product->photopath)}}" class="img-responsive product-image" alt="">
                            <div class="product-hover">
                             <div class="product-meta">
                                 <label for="quantity" class="quantity-label text-white">Quantity:</label>
                                 <input type="number" id="quantity" name="quantity" min="1" value="1" class="quantity-input">
                                 <a href="#"><i class="pe-7s-cart"></i>Add to Cart</a>
                             </div>
                            </div>


                            <div class="product-title">
                                <a href="{{route('viewproduct',$product->id)}}">
                                    <h3>{{$product->name}}</h3>
                                    <span>Rs. {{$product->price}}</span>
                                </a>
                            </div>
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
                            <h1><span>M</span>art</h1>
                            <h3>We'd love To Meet You In Person Or Via The Web!</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
                            <div class="contact-info">
                                <p><b>Main Office:</b> 123 Elm St. New York City, NY</p>
                                <p><b>Phone:</b> 1.555.555.5555</p>
                                <p><b>Email:</b> info@yourdomain.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Website URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Your Message..."></textarea>
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

