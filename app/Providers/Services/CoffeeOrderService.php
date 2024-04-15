<?php

namespace App\Providers\Services;

class CoffeeOrderService implements CoffeeOrderServiceInterface
{
    public function calculateSellingPrice($quantity, $unitCost, $profitMargin, $shippingCost)
    {
        
        $cost = $this->calculateCost($quantity,$unitCost);

        $newprofitMargin = $this->calculateProfitMargin($profitMargin);

        return  round((($cost / (1 - ($newprofitMargin))) + $shippingCost),2);

    }
    public function calculateCost($quantity , $unitCost){

        return  $quantity * $unitCost;
    }
    public function calculateProfitMargin($profitMargin){
        
        return $profitMargin/100;

     }
  
}
