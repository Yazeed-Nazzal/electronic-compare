<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
         $comments = Comment::all()->map(function($item){
            return [
                'id'=>$item->id,
                'comment'=>$item->comment,
                'commenter'=>User::select('name')->where('id',$item->commenter_id)->first(),
                'item'=>Item::select('item_name')->where('id',$item->commentable_id)->first(),
            ];
        });
        
         return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Comment $comment)
    {
        //
    }
    public function edit(Comment $comment)
    {
        //
    }
    public function update(Request $request, Comment $comment)
    {
        //
    }
    public function destroy($comment)
    {
        $comment_delete = Comment::find($comment);
        $comment_delete->delete();
        return back();
    }
}
