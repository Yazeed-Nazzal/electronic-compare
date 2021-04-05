<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class compareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $item1 ,$item2)
    {
        $A = Item::where('id',$item1)->first();
        $B = Item::where('id',$item2)->first();
        if (!empty($A) && !empty($B)) {
        if ($A->category_id == $B->category_id){
            switch ($A->category_id){
                case '1':
                    $item1 = $item1->with('images','laptop');
                    $item2 = $item2->with('images','laptop');
                    return view('compare.laptop',compact('item1','item2'));
                    break;
                case '2':
                    $item1 = Item::where('id',$item1)->with('phone')->first();
                    $item2 = Item::where('id',$item2)->with('phone')->first();
                    return view('compare.phone',compact('item1','item2'));
                    break;
                case '3' :
                    $item1 = $item1->with('images','watch');
                    $item2 = $item2->with('images','watch');
                    return view('compare.watch',compact('item1','item2'));
                    break;
                case '4':
                    $item1 = $item1->with('images','watch');
                    $item2 = $item2->with('images','watch');
                    return view('compare.headphone',compact('item1','item2'));
                    break;
            }

        }
        else{
            abort('404');
        }
        }
        else{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
