@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-3">Edit Item</h1>
    <div class="row justify-content-center">
    
        <div class="col-lg-8">
    
        <form action="{{route('category.update',$category[0]->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="group-form">
                <label for="name">Name Category</label>
                <input type="text" name="name" value="{{$category[0]->category_name}}" id="name" placeholder="Enter Category" class="form-control">
            </div>
            <button type="submit" class="btn btn-success float-right mt-5">Update</button>
        </form>
           
        </div>
    </div>
</div>
      
@endsection
