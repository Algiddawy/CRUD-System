@extends('layout.app')

@section('content')
    <div class="col-12">
        <h1 class="my-3 text-center">Update User Info</h1>
    </div>
            <div class="col-6 mx-auto"> 
                <form action="{{route('users.update' , $user->id)}}" class="form border p-3" method="POST">
                    @csrf
                    @method('PUT')
                    @include('inc.message')
                    <div class="mb3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
                    </div>
                    <div class="mb3">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control">
                    </div>
                    <div class="mb3">
                        <label for="">Password</label>
                        <input type="password" name="password"  class="form-control">
                    </div>
                    <div class="mb3">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="mb3">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option @selected($user->type == 'admin') value="admin">Admin</option>
                            <option  @selected($user->type == 'writer') value="writer">Writer</option>
                        </select>
                    </div>
                    <div class="mb3">
                        <input type="submit" value="Save" class="form-control bg-success text-white">
                    </div>
                </form>


        </div>
    @endsection
