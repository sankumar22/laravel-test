<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'profit_margin',
        'shipping_cost',
    ];

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
}