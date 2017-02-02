@extends('layouts.master')

@section('content')
  <div class="col-sm-8 blog-main">
     <h1>{{ $post->title }}</h1>

    {{$post->body}}
      <hr>
      <div class="comments">
          <ul class="list-group">
              @foreach($post->comments as $comment)
                  <li class="list-group-item">
                      <strong>

                          {{$comment->created_at->diffForHumans()}}: &nbsp;

                      </strong>
                      {{ $comment->body }}
                  </li>

              @endforeach
          </ul>
      </div>

        {{--Add a Comments--}}
      <hr>
      <div class="card">
          <div class="card-block">
              <form action="{{url('/posts/'.$post->id.'/comments')}}" method="POST">
                  {{csrf_field()}}

                  <div class="form-group">
                      <textarea name="body"   placeholder="Your Comments Here" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">Add Comments</button>
                  </div>
              </form>
              @include('partials.errors')
          </div>
      </div>
  </div>
@endsection