<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\ProductSellingPrice;
use App\Http\Controllers\CoffeeOrderController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('login');
});

Route::redirect('/dashboard', '/sales');

Route::get('/sales', function () {
    $products = Product::all();
    $productSellingPrices = Product::join('product_selling_prices', 'products.id', '=', 'product_selling_prices.pid')
            ->select('products.name as product_name','product_selling_prices.created_at', 'product_selling_prices.quantity', 'product_selling_prices.unit_cost', 'product_selling_prices.selling_price')
            ->get();

    return view('coffee_sales')
    ->with('products',$products)
    ->with('productSellingPrices',$productSellingPrices);
})->middleware(['auth'])->name('coffee.sales');

Route::get('/shipping-partners', function () {
    return view('shipping_partners');
})->middleware(['auth'])->name('shipping.partners');


Route::post('/calculate-price', [CoffeeOrderController::class, 'calculatePrice'])->name('calculatePrice');


Route::get('/products/create', function () {
    return view('coffee_product');

})->middleware(['auth'])->name('coffee.sales');

require_once __DIR__.'/auth.php';
