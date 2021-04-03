<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class singleItemController extends Controller
{
    public function get_phone_data($id){
       $phone = Item::with('images','phone','features')->where('id',$id)->first();
       return view('singleProduct.single_phone',compact('phone'));
    }

    public function get_watch_data($id){
        $item = Item::find($id);
        return view('',compact('item'));
    }

    public function get_labtop_data($id){
        $item = Item::find($id);
        return view('',compact('item'));
    }

    public function get_headphone_data($id){
        $item = Item::find($id);
        return view('',compact('item'));
    }
}
