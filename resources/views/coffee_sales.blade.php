<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalForm">
Create New Product
</button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <body>
                    <!-- Button to trigger modal -->
                    

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Products</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                 <div id="messageContainer"></div>
        <form id="createProductForm" name="createProductForm" role="form">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="shipping cost">shipping cost:</label>
                <input type="number" id="shipping_cost" name="shipping_cost" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="profit margin">profit margin:</label>
                <input type="number" id="profit_margin" name="profit_margin" class="form-control" required>
            </div>

            <button type="button" class="btn btn-primary" onclick="submitform()">Create</button>
        </form>
            </div>
            
            <!-- Modal Footer -->
          
        </div>
    </div>
</div>
<!--<a href="/products/create">Create New Product</a>-->

<form name="createSalesForm" id="createSalesForm">
        @csrf
        <div>
        <label for="quantity">Products:</label>
        <select name="product_id" id="product_id" required>
        <option value="">Select Product</option>
    @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
    @endforeach
</select>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" required>
     
            <label for="unit_cost">Unit Cost</label>
            <input type="number" id="unit_cost" name="unit_cost" step="0.01" required>
            <button type="button" onClick="submitSalesform()" class="btn btn-success btn-sm">Record Sale</button>

          
        </div>
     
       
    </form>
                </div>

                <div>
                    <h4>Previous Sales</h4>
                <table class="table table-striped" id="productsTable">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">UnitCost(£)</th>
      <th scope="col">Selling Price(£)</th>
      <th scope="col">Sold At</th>
    </tr>
  </thead>
  <tbody>
 
  </tbody>
</table>

               

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function submitSalesform() {

	        var myData = $('#createSalesForm').serialize();
	        $.ajax({
	        	type: "post",
	        	cache: false,
	        	dataType: "json",
	        	data: myData,
                url: 'http://127.0.0.1:8000/api/calculate-price',
			   success:function( data ) {
                $('#messageContainer').html('<div class="alert alert-success">' + data.message + '</div>');
                window.location.reload();
			  }
            });
        }

        $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/api/selling-prices',
            success: function (data) {
                console.log(data);
                // Loop through the fetched data and append rows to the table
                data.forEach(product => {
                    $('#productsTable tbody').append(`
                        <tr>
                            <td>${product.name}</td>
                            <td>${product.quantity}</td>
                            <td>£${product.unit_cost}</td>
                            <td>£${product.selling_price}</td>
                            <td>${product.created_at}</td>
                        </tr>
                    `);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

        function submitform() {

var myData = $('#createProductForm').serialize();
$.ajax({
    type: "post",
    cache: false,
    dataType: "json",
    data: myData,
    url: 'http://127.0.0.1:8000/api/add-products',
   success:function( data ) {
    $('#messageContainer').html('<div class="alert alert-success">' + data.message + '</div>');
    window.location.reload();


  }
});
}

</script>