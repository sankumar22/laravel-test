<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests\CoffeeOrderRequest;
use App\Providers\Services\CoffeeOrderService;
use App\Models\Product;
use App\Models\ProductSellingPrice;
class CoffeeOrderController extends Controller
{
    private $coffeeOrderService;

    public function __construct(CoffeeOrderService $coffeeOrderService)
    {
        $this->coffeeOrderService = $coffeeOrderService;
    }

    public function calculatePrice(CoffeeOrderRequest $request)
    {
        $quantity = $request->input('quantity');
        $unitCost = $request->input('unit_cost');
        $pid = $request->input('product_id');

        $plist = Product::find($pid);
        $profitMargin = $plist->profit_margin;
        $shippingCost = $plist->shipping_cost;
        
        $sellingPrice = $this->coffeeOrderService->calculateSellingPrice($quantity, $unitCost, $profitMargin, $shippingCost);

       try{
        $psp = new ProductSellingPrice();
        $psp->pid = $pid;
        $psp->quantity = $quantity;
        $psp->unit_cost = $unitCost;
        $psp->selling_price = $sellingPrice;
        $psp->save();
        $message ='Created';
        $code =201;
       }
       catch(Exception $e){
        $message ='Failure';
        $code =201;

        
       }
       finally{
        $message ='Ok';
        $code =200;
       }
        return response()->json(['selling_price' => $sellingPrice,'message' => $message],$code);
    }

    public function getProductSellingPrice()
    {
        $productSellingPrices = Product::join('product_selling_prices', 'products.id', '=', 'product_selling_prices.pid')
                ->select('products.name as name','product_selling_prices.created_at', 'product_selling_prices.quantity', 'product_selling_prices.unit_cost', 'product_selling_prices.selling_price')
                ->get();
    
        return response()->json($productSellingPrices,200);
    }

    
}
