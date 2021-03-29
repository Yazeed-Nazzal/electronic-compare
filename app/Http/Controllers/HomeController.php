<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersC = User::all()->count();
        $itemC  = Item::all()->count();
        $categoryC = Category::all()->count();
        $commentC  = Comment::all()->count();
        if(auth()->user()->hasRole('admin')){
            return view('home',compact('usersC','itemC','categoryC','commentC'));
        }
        else
        {
            return view('user_home');
        }

    }
}
