@extends('layouts.app')

@section('content')

<h1 class="text-center pb-3">Category home</h1>

<div class="container">
    
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
        @endif
       
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->created_at->toDateString()}}</td>
                        <td>
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary"> Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{$categories->links()}}      
        </div>
    </div>
</div>

@endsection