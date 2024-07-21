@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="p-3  text-center my-3">Add Posts</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <form action="{{ url('posts') }}"  method="POST"  class="form border p-3" enctype="multipart/form-data">
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
                        @if (session()->get('success')  != null)
                            <h3 class="text-success my-2">{{session()->get('success')}}</h3>
                        @endif
                        <div class="mb3">
                            <label for="">Post Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control">
                        </div>
                        <div class="mb3">
                            <label for="">Post Description</label>
                            <textarea  class="form-control" name="description" cols="30" rows="7">{{old('description')}}</textarea>
                        </div>
                        <div class="mb3">
                            <label for="">Writer</label>
                            <select name="user_id" class="form-control">
                                @foreach ($users as $user)
                                
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb3">
                            <label for="">Tags</label>
                            <select name="tags[]" multiple class="form-control" id="">
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb3">
                            <label for="">Post image</label>
                            <input  type="file" name="image"  class="form-control">
                        </div>
                        <div class="mb3">
                            <input type="submit" value="Save" class="form-control bg-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
