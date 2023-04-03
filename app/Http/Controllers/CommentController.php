<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends BaseController
{
    public function store(CommentRequest $request,$id)
    {
        $data =[
            'content' => $request->content,
            'user_id' => $request->user_id,
            'product_id' => $id,
        ];
       $newComment = Comment::create($data);
       return $this->sendResponse(new CommentResource($newComment), 'Create comment Success');      
    }
    public function getCommentsInProduct($productId)
    {                
        $comments = Product::find($productId)->comments()->get();
     
        return $this->sendResponse($comments, 'Get Comments In Product Success');      
    }

    public function getCommentsDetail(string $comment)
    {
        $comment = Product::where('id',$comment)->get();
        return $this->sendResponse($comment,'Get Comments Details');
    }
}
