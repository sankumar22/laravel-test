<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductSellingPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'pid',
        'quantity',
        'unit_cost',
        'selling_price',
        'created_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
