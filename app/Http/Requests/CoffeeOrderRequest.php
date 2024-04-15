<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoffeeOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this if you have authorization rules
    }

    public function rules()
    {
        return [
            'quantity' => 'required|integer|min:1',
            'unit_cost' => 'required|numeric|min:0',
            //'profit_margin' => 'required|numeric|min:0|max:100',
            //'shipping_cost' => 'required|numeric|min:0',
        ];
    }
}

