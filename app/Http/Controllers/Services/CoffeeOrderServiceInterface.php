<?php

namespace App\Http\Services;

use Illuminate\Support\ServiceProvider;

interface CoffeeOrderServiceInterface
{
    public function calculateSellingPrice($quantity, $unitCost, $profitMargin, $shippingCost);
}