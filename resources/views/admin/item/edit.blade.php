@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-3">Create Item</h1>
    <div class="row justify-content-center">
    
        <div class="col-lg-8">
        <form class="form repeater-default" action="{{route('item.update',$item->id)}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <label>Name</label>
            <input type="text" name="item_name" value="{{$item->item_name}}" placeholder="Enter Item Name" class="form-control" >
            <label>Description</label>
            <textarea type="text" name="description"     placeholder="Enter Item Name" class="form-control" >{{$item->description}}</textarea>
            <label>Price</label>
            <input type="number" name="price" value="{{$item->price}}" min="1.0" placeholder="Enter price" class="form-control">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if( $item->category_id == $category->id) selected @endif class="form-control">{{$category->category_name}}</option>
                @endforeach
            </select>
            <div> 
                <label>Image Item</label>
                <input type="file" name="image_category[]" class="form-control" multiple>
            </div>
            <div data-repeater-list="group_a">
                <div data-repeater-item>
                <div class="row justify-content-between">
                @for($i = 0 ; $i < count($item->features) ; $i++)
                    <div class="col-md-6 col-sm-12 form-group">
                        <label >Feature Name </label>
                        <input type="text" name="feature_name" class="form-control"  value="{{$item->features[$i]->feature_name}}" placeholder="Enter Feature Name">
                    </div>
                    <div class="col-md-6 col-sm-12 form-group">
                        <label >Feature Value</label>
                        <input type="text" name="feature_value" class="form-control" value="{{$item->features[$i]->feature_value}}" placeholder="Enter Feature Value">
                    </div>
                @endfor
                
                </div>
                <hr>
                </div>
            </div>
            <div class="form-group">
                <div class="col p-0">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
        </form> 
    </div>
</div>
      
@endsection

