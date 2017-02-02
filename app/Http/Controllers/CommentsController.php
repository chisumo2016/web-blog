<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;


class CommentsController extends Controller
{
    //
    public function  store(Request $request,Post $post)
    {
        $post->addComment($request,$post);
         //add a comment to a post
//        Comment::create([
//            'body'    => request('body'),
//            'post_id' => $post->id,
//            'user_id' => '1'
//        ]);
        return back();
    }
}
