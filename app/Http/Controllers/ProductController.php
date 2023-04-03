<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    public function createProduct(ProductRequest $request){
    
        $data =  [
                'title' => $request->title,
                'price' => $request->price,
                'sale' => $request->sale,
                'quantity' => $request->quantity,
                'description' => $request->description,
        ];

        $product = Product::create($data);
        return $this->sendResponse(new ProductResource($product), 'Add product success');        
    }
    public function getAllProduct()
    {
        $products = Product::all();
        return $this->sendResponse($products, 'GET products success');        
    }
    public function getProductDetail($id)
    {
        $Product = Product::find($id);
        return $this->sendResponse($Product, 'GET products success');        
    }
    public function removeProduct($id)
    {
        $removeItem = Product::find($id)->delete();
        return $this->sendResponse($removeItem, 'Remove product success');        
    }



}
