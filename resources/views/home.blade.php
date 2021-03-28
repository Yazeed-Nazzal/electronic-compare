@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mt-5">Statistics</h1>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <p> Total Users</p>
            <div>
                <i class="fas fa-users"></i>
            </div>

        </div>
        <div class="col-md-3">
            <p> Total Category's</p>
           <div>
               <i class="fas fa-archive"></i>
           </div>

        </div>
        <div class="col-md-3">
            <p> Total Items </p>
            <div>
                <i class="fas fa-puzzle-piece"></i>
            </div>

        </div>
        <div class="col-md-3">
            <p> Total Comments </p>
            <div>
                <i class="fas fa-comment-dots"></i>
            </div>

        </div>
    </div>
</div>
@endsection
