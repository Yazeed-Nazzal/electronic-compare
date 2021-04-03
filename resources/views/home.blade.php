@extends('layouts.app')

@section('content')
<div class="container mt-5 home-container">
    <h1 class="text-center mt-5">Statistics</h1>
    <div class="row justify-content-center mt-5 text-center">
        <div class="col-md-3">
            <h3 class="mb-5"> Total Users</h3>
            <div class="mb-3">
                <i class="fas fa-users text-primary"></i>
            </div>
            <p>{{$usersC}}</p>

        </div>
        <div class="col-md-3">
            <h3 class="mb-5"> Total Category's</h3>
           <div class="mb-3">
               <i class="fas fa-archive text-primary"></i>
           </div>
            <p>{{$categoryC}}</p>

        </div>
        <div class="col-md-3">
            <h3 class="mb-5"> Total Items </h3>
            <div class="mb-3">
                <i class="fas fa-puzzle-piece text-primary"></i>
            </div>
            <p>{{$itemC}}</p>

        </div>
        <div class="col-md-3">
            <h3 class="mb-5"> Total Comments </h3>
            <div class="mb-3">
                <i class="fas fa-comment-dots text-primary"></i>
            </div>
            <p>{{$commentC}}</p>
        </div>
    </div>
</div>
@endsection
