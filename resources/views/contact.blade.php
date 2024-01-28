@extends('header')

@section('content')

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
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
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