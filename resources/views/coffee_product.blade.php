<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ __(' Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-100">
                <body>
                <div id="messageContainer"></div>
        <form id="createProductForm" name="createProductForm">
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
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
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

			  }
            });
        }
</script>