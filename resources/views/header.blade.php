<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Grocery Store </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>


        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .footer {
            /* position: fixed; */
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;  
             
            }
        </style>

    </head>

    <body>

        <!-- PRELOADER -->
        <div id="preloader">
            <div class="preloader-area">
            	<div class="preloader-box">
            		<div class="preloader"></div>
            	</div>
            </div>
        </div>


        <section class="header-top-section">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div  class="col-md-6">
                        <div class="header-top-content">
                            <ul class="nav nav-pills navbar-left">
                                <li><a href="#"><i class="fa-sharp fa-solid fa-phone-volume fa-shake fa-xl" style="color: #f5f5f5;"></i><span>+9779826439230</span></a></li>
                                <li><a href="#"><i class="fa-sharp fa-solid fa-envelope fa-shake fa-xl" style="color: #f7f7f7;"></i><span> dwan8848@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                                <!-- <li><a href="#">My Account</a></li> -->
                                
                                <!-- <li><a href="#">Cart</a></li> -->
                                @if (auth()->user())
                            <div>
                               <li><a href="{{ route('userprofile',auth()->user()->id) }}"><span>{{auth()->user()->name}} |</span></a>
                               
                               <form class="inline" action="{{route('logout')}}" method="POST">
                                @csrf
                               <button type="submit" ><span><i class="fa-sharp fa-solid fa-power-off fa-spin fa-2xl" style="color: #faf4f4;"></i></span></button>
                               </form>

                                </li>

                                </div>
            
                
                            @else
                           <li><span><a href="{{route('userlogin')}}"><i class="fa-solid fa-lock fa-bounce fa-2xl" style="color: #d4d8dd;"></i> Login</a> | <a href="{{route('user.register')}}">Register</a></span></li>
            
                
                             @endif
        
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>G</b>ROCERY</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                            <li><a href="{{route('products')}}">Products</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            
                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                        <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        @if (auth()->user())
                        <li><a href="{{route('cart.index')}}"><span> Cart</span> <span class="shoping-cart">{{$itemsincart}}</span></a></li> 
                        @endif
                        
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated" action="{{route('search')}}" method="GET">
                            @csrf
                            <div class="form-group">
                                <input name="searchtext" type="serach" class="form-control subscribe" placeholder="Search...">
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section><!-- end of /.news letter section -->


        @yield('content')








       
        <footer class="footer mt-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-3 pt-6">
                        <p class="text-center text-lg-leff"><i class="fa-regular fa-copyright" style="color: #f7f7f8;"></i> Copyright
                            
                      
                        </p>
                        
                    </div>
                </div>
            </div>
        </footer>

        <!-- JQUERY -->
        <script src="{{asset('frontend/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('frontend/js/custom.js')}}"></script>
        <script src="https://kit.fontawesome.com/7db7c3ae7f.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       


    </body>
</html>    