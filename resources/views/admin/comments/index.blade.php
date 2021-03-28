@extends('layouts.app')

@section('content')
    <h1 class="text-center pb-3 mt-5">Comments Managment</h1>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <table class="table table-dark table-striped ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Comment</th>
                        <th scope="col">user</th>
                        <th scope="col">item</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($counter =1)
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$counter}}</td>
                            <td>{{$comment->comment}}</td>
                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->item->item_name}}</td>
                            <td>
                                <form action="/Admin/comments/{{$comment->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-primary">delete</button>
                                </form>
                            </td>
                        </tr>
                        @php($counter++)
                    @endforeach
                    </tbody>
                </table>
                {{$comments->links()}}
            </div>
        </div>

    </div>
@endsection
