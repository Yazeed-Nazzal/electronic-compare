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

    <a class="btn btn-primary " href="{{route('item.create')}}">Add Item</a>
    <div class="row mt-4">
        <div class="col-lg-12">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Added Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->item_name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->created_at->toDateString()}}</td>
                <td>
                    <a class="btn btn-success mb-3" href="{{route('item.edit',$item->id)}}">Edit Item</a>    
                    <form action="{{route('item.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>  
        </div>
    </div>
</div>

@endsection