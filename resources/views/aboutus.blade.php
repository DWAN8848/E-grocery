@extends('header')
<style>
    /* Global Styles */
body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  margin: 0;
  padding: 0;
}

header {
  
  color: #fff;
  text-align: center;
  padding: 1rem 0;
}

header h1 {
  font-size: 2.5rem;
  margin: 0;
}

main {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.about-section {
  display: flex;
  align-items: center;
  margin-bottom: 40px;
}

.about-image {
  flex: 1;
  padding: 20px;
}

.about-image img {
  max-width: 100%;
}

.about-content {
  flex: 2;
  padding: 20px;
}

.about-content h2 {
  font-size: 2.2rem;
  margin-bottom: 10px;
}

.about-content p {
  font-size: 1.8rem;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px 0;
}

footer p {
  margin: 0;
}

</style>

@section('content')


<!DOCTYPE html>
<html>
<head>
  <title>About Us</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>About Us</h1>
  </header>

  <main>
    <section class="about-section">
      <div class="about-image">
        <img src="{{asset('images/products/logo.jpg')}}" alt="Company Logo">
      </div>
      <div class="about-content">
        <h2>Our Store</h2>
        <p>Our Grocery Store is a customer oriented e-commerce platform that aims to take care of shopping needs in a SMART way; making life easier for all customers. We are Pakistan’s premier online grocery store with services initially in Karachi. Our aim is to enhance the online community by becoming the nations favorite e commerce platform through our very own SMART fundamentals.</p>
      </div>
    </section>

    <section class="about-section">
      
      <div class="about-content">
        <h2>Our Mission</h2>
        <p>Our Grocery Store is a customer oriented e-commerce platform that aims to take care of shopping needs in a SMART way; making life easier for all customers.</p>
      </div>
    </section>

    <section class="about-section">
      
      <div class="about-content">
        <h2>Our Vision</h2>
        <p>Our aim is to expand the online community by becoming the nations favorite e commerce platform through our very own SMART fundamentals.</p>
      </div>
    </section>

  </main>

 
</body>
</html>


@endsection