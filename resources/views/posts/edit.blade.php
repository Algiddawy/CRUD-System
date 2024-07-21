@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="p-3  text-center my-3">Edit Posts Info</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <form action="{{url('posts/'.$post->id)}}" enctype="multipart/form-data"  method="POST"  class="form border p-3">
                        @method('PUT')
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger p-1">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="mb3">
                            <label for="">Post Ttile</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control">
                        </div>
                        <div class="mb3">
                            <label for="">Post Description</label>
                            <textarea  class="form-control" name="description" cols="30" rows="7">{{$post->description}}</textarea>
                        </div>
                        
                        <div class="mb3">
                            <div class="mb3">
                                <label for="">Tags</label>
                                {{-- @dd($post->tags) --}}
                                <select name="tags[]" multiple class="form-control" id="">
                                    @foreach ($tags as $tag)
                                        <option @if ($post->tags->contains($tag)) selected   @endif value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="">Writer</label>
                            <select name="user_id" class="form-control">
                                @foreach ($users as $user)
                                
                                <option  @selected($user->id == $post->user_id)  value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <div class="mb3">
                                <label for="">Post image</label>
                                <input  type="file" name="image"  class="form-control">
                            </div>
                        </div>
                        <div class="mb3">
                            <input type="submit" value="save" class="form-control bg-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
