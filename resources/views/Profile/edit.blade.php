@extends('layouts.app')

@section('content')

    <h1 class="text-center pb-3 mt-5">Profile Edit</h1>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <form action="/profile/{{$user->id}}" method="Post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{$user->name}}">
                        @error('name')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{$user->email}}">
                        @error('email')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" >
                        <small id="emailHelp" class="form-text text-muted">if you fill this field your password will update</small>
                        @error('password')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm</label>
                        <input type="password" class="form-control" id="confirm" name="confirm" aria-describedby="emailHelp">
                        @error('confirm')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>
            <div class="col-md-6">
                <div class="Undrow-Img Edit-img">

                </div>


            </div>

        </div>

    </div>

@endsection
