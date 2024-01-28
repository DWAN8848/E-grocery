@extends('header')

@section('content')

<style>
  .checkout-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  .checkout-form h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  .form-group input,
  .form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
  }

  .btn:hover {
    background-color: #45a049;
  }

  .btn a {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
  }

  .btn a:hover {
    background-color: #45a049;
  }
</style>

<div class="checkout-form">
  <h2>Checkout</h2>
  
  <form id="orderform" action="{{route('order.store')}}" method="POST">
    @csrf
    
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="person_name" name="person_name" placeholder="Enter your name" value="{{auth()->user()->name}}">
    </div>
    
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" id="shipping_address" name="shipping_address" placeholder="Enter your address" value="{{auth()->user()->address}}">
    </div>
    
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="{{auth()->user()->phone}}">
    </div>
    
    <div class="form-group">
      <label for="payment_method">Payment Method:</label>
      <select id="payment_method" name="payment_method" required>
        <option value="COD">Cash On Delivery</option>
        <option value="KHALTI">Khalti</option>
        
      </select>
    </div>
    
    <button type="button" onClick="submitdata()" class="btn">Order Now</button><br>
    <a href="{{route('cart.index')}}" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; margin-left:13rem;">Back to cart</a>

  </form>
</div>


 <!-- Khalti -->
 <script>
  var name;
  var address;
  var phone;
  var paymentmethod;

  function submitdata(){
    name=document.getElementById('person_name').value;
    address=document.getElementById('shipping_address').value;
    phone=document.getElementById('phone').value;
    paymentmethod=document.getElementById('payment_method').value;


    if(paymentmethod=="KHALTI"){
      checkout.show({amount: 1000});
    }
    
    if(paymentmethod == "COD")
    {
      $('#orderform').submit();
    }

  }
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_1573f1d7e62f4a9ebe4379d4bdb8da2d",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);


                    $.ajax({
          url: "{{route('khaltiverify')}}", // Replace with your API endpoint URL
          method: "POST", // Change to POST, PUT, DELETE, etc. if needed
         
          data:{
            data:payload,
            _token:"{{csrf_token()}}"
          }, // Change to "xml", "html", "text", etc. based on your response type
          success: function(response) {
            // This function will be executed if the AJAX request is successful
            // 'data' will hold the response from the server
            console.log('Succesfully Paid');
            $('#orderform').submit();
          //  window.location.href="{{route('user.order')}}";
          },
          error: function(xhr, status, error) {
            // This function will be executed if there's an error with the AJAX request
            console.log("Error:", error);
          }
        });
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
           
        }
    </script>

@endsection
