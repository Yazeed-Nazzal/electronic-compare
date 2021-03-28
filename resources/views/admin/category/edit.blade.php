@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-3">Create Item</h1>
    <div class="row justify-content-center">
    
        <div class="col-lg-8">

            <form action="{{route('category.update',$category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="group-form">
                    <label for="name">Name Category</label>
                    <input type="text" name="name" value="{{$category->category_name}}" id="name" placeholder="Enter Category" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
      
@endsection
