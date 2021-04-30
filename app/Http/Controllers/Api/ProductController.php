<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

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

    public function storeProducts(Request $request)
    {
        
        $request_data = $request->only(['title','description','category']);

        $validator = Validator::make($request_data, [
            "title" => ['required','string'],
            "description" => ['required','string'],
             "category" => ['required','integer']
        ]);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }
        // dd($request_data);

       $product = Product::create([
           "title" => $request->title,
           "description" => $request->description,
           "category" =>  $request->category,
       ]);

       return response()->json([
            "status" => true,
            "article" => $product
       ])->setStatusCode(201,"Product is store");
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                "status" => false,
                "message" => "Product Not Found"
            ])-> setStatusCode(404, 'Nichego net' ); 

            }

         $product->delete();   
         
         return response()->json([
            "status" => true,
            "message" => "Product is deleted"
        ])-> setStatusCode(200, 'oki' ); 

      
        
        
         
    }
}
