<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    public function createProduct(Request $request){
        // $product = new Product([
        //     'title' => $request->get('title'),
        //     'price' => $request->get('price'),
        //     'sale' => $request->get('sale'),
        //     'quantity' => $request->get('quantity'),
        //     'description' => $request->get('description'),
        //     'image_id' => $request->get('image_id'),
        // ]);
        // $product->save();

        $request->validate([
            'title' => 'require|string|max:150',
            'price' => 'require|integer',
            'sale' => 'require|integer',
            'quantity' => 'require',
            'description' => 'require|string|max:150',
            'image_id' => 'require|integer',
        ]);
        $data =  [
                'title' => $request->title,
                'price' => $request->price,
                'sale' => $request->sale,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'image_id' => $request->image_id,
        ];

        $product = Product::create($data);
        return $this->sendResponse($product, 'Add product success');        
 
    }
    public function getAllProduct()
    {

    }
    public function getProductDetail()
    {

    }
    public function removeProduct()
    {
        
    }
}
