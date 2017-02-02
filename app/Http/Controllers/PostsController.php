<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Repositories\Posts;
use Carbon\Carbon;


class PostsController extends Controller
{
    //Middleware
    public function  __construct(Post $posts)
    {
        $this->middleware('auth')->except(['index', 'show']);
        //$this->middleware('auth');
    }

    //Display the form
    public  function  index(Post $posts)
    {
         //$posts = $posts->all();
         // dd($post);
         //$posts = (new \App\Repositories\Posts)->all();  Automatic injection

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();



        //Code is to mess .To refactor
        //$posts = Post::latest()->get();
//        $posts = Post::latest();
//
//        if($month = request('month')){
//            $posts->whereMonth('created_at', Carbon::parse($month)->month);
//        }
//
//        if($year = request('year')){
//            $posts->whereYear('created_at', $year);
//        }
//
//        $post = $posts->get();


        //Select Post By Active

        $archieve = Post::archieve();

//        $archieve =Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
//            ->groupBy('year', 'month')
//            ->orderByRaw('min(created_at) desc')
//            ->get()
//            ->toArray();

        //return $archieve; Debugging purpose

        return view('posts.index', compact('posts', 'archieve'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function  create()
    {

        return view('admin.post.create');
    }

    public function  store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body'  =>'required'

        ]);

        // User publish this post
           auth()->user()->publish(
               new Post(request(['title','body']))
           );

//
//           Post::create([    // Check this code to user Model
//            'title'   => request('title'),
//            'body'    =>  request('body'),
//            'user_id' => auth()->id()  // or  'user_id' => auth()->user()->id
//
//        ]);

    //Post::create(request(['title', 'body']));
         return redirect('/');
    }
}
