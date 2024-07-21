@extends('layout.app')

@section('content')
    <div class="col-12">
        <a href="{{ url('posts/create') }}" class="btn btn-primary my-3">Add New Post</a>
        <h1 class="p-3 border text-center my-3">All Posts</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session()->get('success') != null)
                    <h3 class="text-success my-2">{{ session()->get('success') }}</h3>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Writer</th>
                            <th>Tags</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->user->name }}</td>
                            <td>
                                    @foreach ($post->tags as $tag)
                                    <span class="badge bg-warning my-1">{{$tag->name}}</span>
                                    <br>
                                @endforeach
                            </td>
                                <td>
                                    <img src="{{$post->image()}}"  height="100" width="100">
                                </td>
                                <td>
                                    <a href="{{ url('posts/'. $post->id.'/edit') }}" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('posts/' . $post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    @endsection
