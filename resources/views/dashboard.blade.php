@extends('layouts.app')
@section('content')
@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">Dashboard</h2>
<hr class="h-1 bg-blue-200">

<div class="mt-4 grid grid-cols-3 gap-10">

<div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex
justify-between">
<p class="font-bold text-lg">Total Users</p>
<p class="font-bold text-5xl">{{$user}}</p>

</div>
<div class="px-4 py-8 rounded-lg bg-red-600 text-white flex
justify-between">
<p class="font-bold text-lg">Total Products</p>
<p class="font-bold text-5xl">{{$products}}</p>

</div>
<div class="px-4 py-8 rounded-lg bg-green-600 text-white flex
justify-between">
<p class="font-bold text-lg">Total Catagories</p>
<p class="font-bold text-5xl">{{$category}}</p>

</div>


<div class="px-4 py-8 rounded-lg bg-yellow-600 text-white flex
justify-between">
<p class="font-bold text-lg">Total Orders</p>
<p class="font-bold text-5xl">{{$order}}</p>

</div>



</div>

<body>


  <div class=" text-left mx-8 mt-10">
    <!-- Chart wrapper -->
    <input type="month" onchange="changemonth(this.value)" value="{{date('Y-m')}}">
  </div>
  <div class="text-right mx-4">
    <h2 class="font-bold text-4xl">Monthly Update</h2>
    <p>Total Sales: <span id="totalSales">Rs. {{ $totalSales }}/-</span></p>
   
    <p>Total Orders: <span id="totalOrders">{{ $totalOrders }}</span></p>
</div>



  <div class="container mx-auto px-4 py-8">
    
    <canvas id="myLineChart" class="w-full h-100 mt-4"></canvas>
  </div>

  <script>












   // Sample data for the line chart
const labels = @json($orderdates);
const totalSalesData = @json($sales); // Replace with your total sales data for each day of the month
const totalOrdersData = @json($ordercount); // Replace with your total orders data for each day of the month

// Configuration options
const options = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    x: {
      beginAtZero: true
    },
    y: {
      beginAtZero: true
    }
  }
};

// Get the canvas element and initialize the chart
const ctx = document.getElementById('myLineChart').getContext('2d');
const myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [
      {
        label: 'Total Sales',
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        data: totalSalesData,
        fill: true,
      },
      {
        label: 'Total Orders',
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        data: totalOrdersData,
        fill: true,
      },
    ]
  },
  options: options
});

// Function to update chart and data based on selected month
function changemonth(date) {
  $.ajax({
    url: "{{ route('changemonth')}}",
    method: "POST",
    dataType: "json",
    data: {
      month: date,
      _token: "{{csrf_token()}}"
    },
    success: function(response) {
      myLineChart.data.datasets[0].data = response.sales;
      myLineChart.data.datasets[1].data = response.ordercounts;
      myLineChart.data.labels = response.orderdates;

      myLineChart.update();
      document.getElementById("totalSales").textContent = response.totalSales;
      document.getElementById("totalOrders").textContent = response.totalOrders;

      console.log(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error("AJAX request failed: " + textStatus, errorThrown);
    }
  });
}







    
  



</script>

</body>




@endsection