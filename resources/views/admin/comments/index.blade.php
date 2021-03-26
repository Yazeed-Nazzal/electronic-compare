@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <table class="table table-primary table-striped ">
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
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>test</td>
                        <td>test</td>
                        <td>delete</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$comments->links()}}
        </div>
    </div>
@endsection
