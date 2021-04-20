<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Phone;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        switch ($name){

            case 'laptop':
                $laptops = Item::where('category_id',1)->with('laptop','images')->get();
                return view('category.laptops',compact('laptops'));
                break;
            case 'phone':
                $phones = Item::where('category_id',2)->with('phone','images')->get();
                return view('category.phones',compact('phones'));
                break;
            case 'watch':
                $watches = Item::where('category_id',3)->with('watch','images')->get();
                return view('category.watches',compact('watches'));
                break;
            case 'headphone':
                $headphones = Item::where('category_id',4)->with('headphone','images')->get();
                return view('category.headPhones',compact('headphones'));
                break;
            default:
                abort('404');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
