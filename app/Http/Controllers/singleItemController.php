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
        $watch = Item::with('images','watch','features')->where('id',$id)->first();
        return view('singleProduct.single_watch',compact('watch'));
    }

    public function get_labtop_data($id){
        $laptop = Item::with('images','laptop','features')->where('id',$id)->first();
        return view('singleProduct.single_labtop',compact('laptop'));
    }

    public function get_headphone_data($id){
        $headphone = Item::with('images','headphone','features')->where('id',$id)->first();
        return view('singleProduct.single_headphone',compact('headphone'));
    }
}
