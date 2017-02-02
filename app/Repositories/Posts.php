<?php


namespace  App\Repositories;
use App\Post;
class Posts
{
    //Automatic Injection
    public function all()
    {
        return Post::all();
    }



}