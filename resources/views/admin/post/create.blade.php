@extends('layouts.master')


@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Create Post</h1>
        <hr>
        <form method="post" action="/posts">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" name="title" id="title" placeholder="title" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Body:</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" ></textarea>
            </div>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary">Publish</button>
             </div>

            @include('partials.errors')
        </form>

    </div>
@endsection