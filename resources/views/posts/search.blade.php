@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="p-3 border text-center my-3">All Posts</h1>
    </div>
<div class="container">
<div class="row">
    @foreach($posts as $post)
    <div class="col-12">
        <div class="card my-3">
            <div class="card-header">
                {{$post->user->name}} - {{$post->created_at->format('Y-m-d')}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->description}}</p>
                <a href="{{url('posts/'.$post->id)}}" class="btn btn-primary">Show Post</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection