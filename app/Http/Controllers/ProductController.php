<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(),200);
        
    }

    public function addProducts(Request $request)
    {
      



        try{
            $product =  Product::create($request->all());
            $message="Created Successfully";
            $code=201;

        }catch(Exception $e){
            $message="Created Successfully";
            $code=400;
        }
        finally{
            $message="Ok";
            $code=201;
        }
       
        return response()->json(['message' => $message],$code);
    }

 


}
