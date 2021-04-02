@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center mb-3">Add Laptop</h1>
        <div class="row justify-content-center">

            <div class="col-lg-8">
                <form class="form repeater-default repeater" action="{{route('update.item',['name'=>'laptop','id'=>$item->id])}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <label>Name</label>
                    <input type="text" name="name" value="{{$item->item_name}}" placeholder="Enter Phone Name"  required class="form-control" >

                    <label>Description</label>
                    <textarea type="text" name="description" placeholder="Enter Description" required class="form-control" >{{$item->description}}</textarea>

                    <label>Price</label>
                    <input type="number" name="price" min="1.0" value="{{$item->price}}" placeholder="Enter price" required class="form-control">

                    <label>Company</label>
                    <input type="text" name="company"  value="{{$item->company}}" placeholder="Enter Company Made" required class="form-control">

                    <label>Processor</label>
                    <input type="text" name="processor" value="{{$item->laptop->processor}}" placeholder="Enter processor type" required class="form-control">

                    <label>Gpu</label>
                    <input type="text" name="gpu" min="1.0" value="{{$item->laptop->gpu}}" placeholder="Enter GPU Type" required class="form-control">

                    <label>Ram</label>
                    <input type="number" name="ram" min="1.0" value="{{$item->laptop->ram}}" placeholder="Enter ram size" required class="form-control">

                    <label>Storage</label>
                    <input type="number" name="storage" min="1.0" value="{{$item->laptop->storage}}" placeholder="Enter size storage" required class="form-control">

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
