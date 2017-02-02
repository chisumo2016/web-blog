<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
      public function  comments()
      {
          return $this->hasMany('App\Comment');
      }

      public function  user()// $comment ->post->user
      {
          return $this->belongsTo(User::class);
      }

      protected $fillable = ['user_id', 'title', 'body'];

      public function addComment($request,$body)
      {

//         $this->comments()->create(['body']);
          Comment::create([

              'body'     => $request->get('body'),
              'post_id'   =>$this->id,
              'user_id'   => auth()->id()
          ]);
      }


      // Query scope from PostsController index()

    public function  scopeFilter($query , $filters)
    {

        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']){
            $query->whereYear('created_at', $year);
        }

    }
    // View Composer
    public static  function  archieve()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }


    public  function  tags()
    {
        //1 post may have many tags OR Any post may have many tags  //Any tag may be applied to many posts
        return $this->belongsToMany(Tag::class);
    }
}
