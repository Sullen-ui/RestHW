<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProducts ()
    {
        $products = Product::all();

        return response()->json([
            "status" => true,
            "data" => $products
        
        ]);
    }
    public function showProduct($id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                "status" => false,
                "message" => "Product Not Found"
            ])-> setStatusCode(404, 'Nichego net' ); 
        }

        return response()->json($product);
        
        
         
    }
}
