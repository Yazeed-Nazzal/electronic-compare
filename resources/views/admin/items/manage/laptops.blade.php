@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-center">Item home</h1>
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row mt-4">
            <div class="col-lg-12">
                <a class="btn btn-primary float-right mb-5" href="{{route('item.create')}}">Add Item</a>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">ram</th>
                        <th scope="col">processor</th>
                        <th scope="col">storage</th>
                        <th scope="col">gpu</th>
                        <th scope="col">Added Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
{{--                            <img src="{{url('uploads/'.$item->images[0]->name)}}" style="width:100px;height:100px" alt="">--}}
                            <td></td>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->price}} JOD</td>
                            <td>{{$item->laptop->ram}}</td>
                            <td>{{$item->laptop->processor}}</td>
                            <td>{{$item->laptop->storage}}</td>
                            <td>{{$item->laptop->gpu}}</td>

                            <td>{{$item->created_at->toDateString()}}</td>
                            <td class="d-flex">
                                <form action="{{route('item.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">delete</button>
                                </form>
                                <a class="btn btn-success ml-3" href="{{route('item.edit',$item->id)}}">Edit Item</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
