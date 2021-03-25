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
    <div class="row">
        <div class="col-lg-12">
        <a class="btn btn-primary" href="{{route('item.create')}}">Add Item</a>
        @foreach($items as $item)
            <h2>{{$item->item_name}}</h2>
            <a class="btn btn-success" href="{{route('item.edit',$item->id)}}">Edit Item</a>
        @endforeach
        
        </div>
    </div>
</div>

@endsection