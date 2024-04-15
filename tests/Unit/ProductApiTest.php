<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductApiTest extends TestCase
{
  //  use RefreshDatabase; // Reset the database after each test
    /**
     * Test creating a new product via API.
     *
     * @return void
     */
    public function testCreateProduct()
    {
        // Create test data for the new product
        $data = [
            'name' => 'Test Products122',
            'shipping_cost' => 10,
            'profit_margin' => 25,
        ];

        // Make a POST request to your API endpoint with the test data
        $response = $this->postJson('api/add-products', $data);
      
        
        // Assert that the response is successful (HTTP status code 201 for resource creation)
        $response->assertStatus(201);

        $data = [
            'product_id' =>  1,
            'quantity' => 10,
            'unit_cost' => 25,
        ];

        // Make a POST request to your API endpoint with the test data
        $response = $this->postJson('api/calculate-price', $data);
        
        // Assert that the response is successful (HTTP status code 201 for resource creation)
        $response->assertStatus(200);
    }

 /**
     * Test creating a new product via API.
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $response = $this->get('api/products');
        // Assert that the response is successful (HTTP status code 200)
        $response->assertStatus(200);
    }
    public function testCreateSellingPrice()
    {
       

        $data = [
            'product_id' =>  1,
            'quantity' => 10,
            'unit_cost' => 25,
        ];

        // Make a POST request to your API endpoint with the test data
        $response = $this->postJson('api/calculate-price', $data);
        
        // Assert that the response is successful (HTTP status code 201 for resource creation)
        $response->assertStatus(200);
    }


     /**
     * Test creating a testGetAllSellingprices via API.
     *
     * @return void
     */
    public function testGetAllsellingprices()
    {
        $response = $this->get('api/selling-prices');
        // Assert that the response is successful (HTTP status code 200)
        $response->assertStatus(200);
    }
 
    // Add more test methods for other API endpoints (e.g., update, delete)
}
