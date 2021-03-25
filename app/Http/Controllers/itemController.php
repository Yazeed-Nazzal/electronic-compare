<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Item::all();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        // insert item data in item table
        $item = Item::create([
                'item_name'=>$request->item_name,
                'price'=>$request->price,
                'category_id'=>$request->category_id,
        ]);

        // get all feature from request
        $all_feature = $request->group_a;

        // insert all feature to single item in feature table
        for($i=0;$i<count($all_feature);$i++){
            Feature::create([
                'feature_name'=>$all_feature[$i]['feature_name'],
                'feature_value'=>$all_feature[$i]['feature_value'],
                'item_id'=>$item->id,
            ]);
        }
        
        // insert image in images table
        if($request->hasFile('image_category')){
            foreach($request->image_category as $image){
            $image_name = rand(1,99999) . '-' .$image->getClientOriginalName();
            $image->move(public_path('uploads'), $image_name);  
            $item->images()->create(array('name' => $image_name));
            }
        }

        session()->flash('success','Add Item Successfully');
        
        return redirect()->route('item.index');
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
       $item = Item::with(['images','category','features'])->where('id',$id)->first();

       $categories = Category::all();

       return view('admin.item.edit',compact(["item","categories"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

    

        $item->update([
            'item_name'   => $request->item_name,
            'price'       => $request->price,
            'category_id' => $request->category_id,
        ]);

        // edit image
        if($request->hasFile('image_category')){
            $images_item = Image::where('imageable_id',$item->id)->get();
            $count = $images_item->count();
            for($i=0; $i < $count ;$i++){
                $image_path = public_path('uploads') .'\\'. $images_item[$i]['name'];
                File::delete($image_path);
            }
            $item->images()->where('imageable_id',$item->id)->delete();

            foreach($request->image_category as $image){
             $image_category = rand(1,99999) . '-' .$image->getClientOriginalName();
             $image->move(public_path('uploads'), $image_category);  
             $item->images()->create(array('name' => $image_category));
     
            }
        }


        $all_feature = $request->group_a;
        // edit  feature 
        for($i=0;$i<count($all_feature);$i++){
            Feature::where('id',$item->id)->update([
                'feature_name'=>$all_feature[$i]['feature_name'],
                'feature_value'=>$all_feature[$i]['feature_value'],
                'item_id'=>$item->id,
            ]);
        }

        session()->flash('success','Update Item Successfully');

        return redirect()->route('item.index');

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