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
                        <th scope="col">Type</th>
                        <th scope="col">Battery</th>
                        <th scope="col">Added Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td><img src="{{url('uploads/'.$item->images[0]->name)}}" style="width:100px;height:100px" alt=""></td>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->price}} JOD</td>
                            <td>{{$item->headphone->type}}</td>
                            @if ($item->headphone->type == "Bluetooth")
                                 <td>{{$item->headphone->battery}}</td>
                            @else
                                <td>No Battery</td>
                            @endif

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
