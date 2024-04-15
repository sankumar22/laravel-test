<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <body>
<form action="{{ route('calculatePrice') }}" method="POST">
        @csrf
        <div>
        <select name="product_id">
    @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
    @endforeach
</select>
            <label for="quantity">Quantity of Coffee Bags:</label>
            <input type="number" id="quantity" name="quantity" required>
     
            <label for="unit_cost">Unit Cost (per bag):</label>
            <input type="number" id="unit_cost" name="unit_cost" step="0.01" required>
            <button type="submit">Calculate Selling Price</button>

          
        </div>
     
       
    </form>
                </div>

                <div>
                    <h3>Previous Sales</h3>
                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">UnitCost</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Sold Out</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($productSellingPrices as $productSellingPrice)
       
    
    <tr>
      <th scope="row">{{$productSellingPrice->product_name}}</th>
      <td>{{$productSellingPrice->quantity}}</td>
      <td>{{$productSellingPrice->unit_cost}}</td>
      <td>{{$productSellingPrice->selling_price}}</td>
      <td>{{$productSellingPrice->created_at}}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>

               

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

