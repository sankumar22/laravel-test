<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'GoldCaffe',
            'profit_margin' => 0.25, // 25%
            'shipping_cost' => 10,
        ]);

        Product::create([
            'name' => 'Arabic Caffe',
            'profit_margin' => 0.15, // 15%
            'shipping_cost' => 10,
        ]);
    }
}
