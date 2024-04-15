<?php

namespace App\Http\Services;
use Illuminate\Http\Request;

class CoffeeOrderService implements CoffeeOrderServiceInterface
{
    public function calculateSellingPrice($quantity, $unitCost, $profitMargin, $shippingCost)
    {
        $cost = $quantity * $unitCost;
        $newprofitMargin =($profitMargin/100);
       return  round(($cost / (1 - ($newprofitMargin))) +$shippingCost);
    }
}
