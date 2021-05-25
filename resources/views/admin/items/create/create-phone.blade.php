@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mb-3">Add Phone</h1>
    <div class="row justify-content-center">

        <div class="col-lg-8">
        <form class="form repeater-default repeater" action="{{route('store.item','phone')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Phone Name"  required class="form-control" >

            <label>Description</label>
            <textarea type="text" name="description" placeholder="Enter Description" required class="form-control" ></textarea>

            <label>Price</label>
            <input type="number" name="price" min="1.0" placeholder="Enter price" required class="form-control">

            <label>Company</label>
            <input type="text" name="company" min="1.0" placeholder="Enter Company Made" required class="form-control">

            <label>Front Camera</label>
            <input type="number" name="front_camera" min="1.0" placeholder="Enter MP Camera" required class="form-control">

            <label>Rare Camera</label>
            <input type="number" name="rear_camera" min="1.0" placeholder="Enter MP Camera" required class="form-control">

            <label>Storage</label>
            <input type="number" name="storage" min="1.0" placeholder="Enter size storage" required class="form-control">

            <label>Screen Size</label>
            <input type="number" name="screen_size" min="1.0" placeholder="Enter Screen Size" required class="form-control">

            <label>Battery</label>
            <input type="number" name="battery" min="1.0" placeholder="Enter Capacity Bettery" required class="form-control">

            <label>Ram</label>
            <input type="number" name="ram" min="1.0" placeholder="Enter ram size" required class="form-control">



            <div>
                <label>Image Item</label>
                <input type="file" required name="image_category[]" class="form-control" multiple>
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
