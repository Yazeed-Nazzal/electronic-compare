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
       
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Delete</th>
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
                            <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">delete</button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_category">
                              Update
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
            {{$categories->links()}}      
        </div>

        <div class="modal fade" id="update_category" tabindex="-1" role="dialog" aria-labelledby="update_category" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
        </div>


        <div class="col-lg-4">
            <form action="{{route('category.store')}}" method="POST" class="form_category_style">
                @csrf
                <div class="group-form">
                    <label for="name">Name Category</label>
                    <input type="text" name="name" id="name" placeholder="Enter Category" class="form-control">
                </div>
                <div class="group-form">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection