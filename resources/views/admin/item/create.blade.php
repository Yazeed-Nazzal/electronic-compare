@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-3">Create Item</h1>
    <div class="row justify-content-center">
    
        <div class="col-lg-8">
        <form class="form repeater-default" action="{{route('item.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <label>Name</label>
            <input type="text" name="item_name" placeholder="Enter Item Name" class="form-control" >
            <label>Price</label>
            <input type="number" name="price" min="1.0" placeholder="Enter price" class="form-control">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" class="form-control">{{$category->category_name}}</option>
                @endforeach
            </select>
            <div> 
                <label>Image Item</label>
                <input type="file" name="image_category[]" class="form-control" multiple>
            </div>
            <div data-repeater-list="group_a">
                <div data-repeater-item>
                <div class="row justify-content-between">
                    <div class="col-md-4 col-sm-12 form-group">
                    <label >Feature Name </label>
                    <input type="text" name="feature_name" class="form-control"  placeholder="Enter Feature Name">
                    </div>
                    <div class="col-md-4 col-sm-12 form-group">
                    <label >Feature Value</label>
                    <input type="text" name="feature_value" class="form-control" placeholder="Enter Feature Value">
                    </div>
                    <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
                    <button class="btn btn-danger" data-repeater-delete type="button"> <i class="bx bx-x"></i>
                        Delete
                    </button>
                    </div>
                </div>
                <hr>
                </div>
            </div>
            <div class="form-group">
                <div class="col p-0">
                <button class="btn btn-primary" data-repeater-create type="button"><i class="bx bx-plus"></i>
                    Add
                </button>
                <button type="submit" class="btn btn-success">create</button>
                </div>
            </div>
        </div>
        </form> 
    </div>
</div>
      
@endsection

