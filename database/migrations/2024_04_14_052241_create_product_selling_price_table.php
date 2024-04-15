<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_selling_prices', function (Blueprint $table) {
          
			$table->integer('pid');
            $table->integer('quantity');
            $table->decimal('unit_cost', 8, 2); // Assuming 8 digits total with 2 decimal places
            $table->decimal('selling_price', 8, 2); // Assuming 8 digits total with 2 decimal places
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_selling_prices');
    }
};
