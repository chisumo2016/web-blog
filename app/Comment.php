<?php

namespace App;


class Comment extends Model
{
     protected $fillable = ['post_id','body', 'user_id'];

     public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function  user()
    {
        $this->belongsTo(User::class);
    }
}





//class Comment extends Model
//{
//    //
//    protected $fillable = ['post_id','body'];
//    public function Post()
//    {
//        //$comment->post;
//        return $this->belongsTo('App\Post');
//    }
//}
