<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Headphone;
use App\Models\Item;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use App\Models\Phone;
use App\Models\Watch;

class itemController extends Controller
{

    public function index($name){

        switch ($name){
            case 'laptop':
                $items = Item::with('images','laptop')->where('category_id',1)->get();
                return view('admin.items.manage.laptops',compact('items'));
                break;
            case 'phone':
                $items = Item::with(['images','phone'])->where('category_id',2)->get();
                return view('admin.items.manage.phones',compact('items'));
                break;
            case 'watch':
                $items = Item::with(['images','watch'])->where('category_id',3)->get();
                return view('admin.items.manage.watches',compact('items'));
                break;
            case 'headphone':
                $items = Item::with(['images','headphone'])->where('category_id',4)->get();
                return view('admin.items.manage.headPhones',compact('items'));
                break;
            default:
                abort('404');
        }
    }


    public function create($name){
        
        switch ($name){
            case 'laptop':
              
                break;
            case 'phone':
                return view('admin.items.create.create-phone');
                break;
            case 'watch':
                return view('admin.items.create.create-watch');
                break;
            case 'headphone':
                return view('admin.items.create.create-headphone');
                break;
            default:
                abort('404');
        }
    }


    public function store(Request $request, $name){
        
        switch ($name){
            case 'laptop':
                
                break;
            case 'phone':

                $item = Item::create([
                    'item_name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'company'=>$request->company,
                    'category_id'=>2
                ]);

                $phone = Phone::create([
                    "front_cam"=>$request->front_camera,
                    "rear_cam"=>$request->rear_camera,
                    "ram"=>$request->ram,
                    "storage"=>$request->storage,
                    "screen"=>$request->screen_size,
                    "battery"=>$request->battery,
                    'item_id'=>$item->id,
                ]);

                 // // get all feature from request
                $all_feature = $request->group_a;

                // insert all feature to single item in feature table
                for($i=0;$i<count($all_feature);$i++){
                    Feature::create([
                        'feature_name'=>$all_feature[$i]['feature_name'],
                        'feature_value'=>$all_feature[$i]['feature_value'],
                        'item_id'=>$item->id,
                    ]);
                }

               
                if($request->hasFile('image_category')){
                    foreach($request->image_category as $image){
                    $image_name = rand(1,99999) . '-' .$image->getClientOriginalName();
                    $image->move(public_path('uploads'), $image_name);
                    $item->images()->create(array('name' => $image_name));
                    }
                }

                session()->flash('success','Add phone Successfully');

                return redirect()->route('index.item','phone');
                break;
            case 'watch':

                $item = Item::create([
                    'item_name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'company'=>$request->company,
                    'category_id'=>3
                ]);

                $watch = Watch::create([
                    "waterproof"=>$request->waterproof,
                    "calling"=>$request->calling,
                    "battery"=>$request->battery,
                    'item_id'=>$item->id,
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

                
                if($request->hasFile('image_category')){
                    foreach($request->image_category as $image){
                    $image_name = rand(1,99999) . '-' .$image->getClientOriginalName();
                    $image->move(public_path('uploads'), $image_name);
                    $item->images()->create(array('name' => $image_name));
                    }
                }
  
                  session()->flash('success','Add Watch Successfully');
  
                  return redirect()->route('index.item','watch');
                break;
            case 'headphone':
                $item = Item::create([
                    'item_name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'company'=>$request->company,
                    'category_id'=>4
                ]);

                $headphone = Headphone::create([
                    "type"=>$request->type,
                    "battery"=>$request->battery,
                    'item_id'=>$item->id,
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

                
                if($request->hasFile('image_category')){
                    foreach($request->image_category as $image){
                    $image_name = rand(1,99999) . '-' .$image->getClientOriginalName();
                    $image->move(public_path('uploads'), $image_name);
                    $item->images()->create(array('name' => $image_name));
                    }
                }
  
                  session()->flash('success','Add Headphone Successfully');
  
                  return redirect()->route('index.item','headphone');
                break;
            default:
                abort('404');
        }
        
    }


    public function show($id)
    {
        //
    }


    public function edit($name , $id){

        switch ($name){
            case 'laptop':
             
                break;
            case 'phone':
                 $item = Item::with(['images','phone','features'])->where('id',$id)->first();
                return view("admin.items.edit.edit-phone",compact('item'));
                break;
            case 'watch':
                $item = Item::with(['images','watch','features'])->where('id',$id)->first();
                return view("admin.items.edit.edit-watch",compact('item'));
                break;
            case 'headphone':
                $item = Item::with(['images','headphone','features'])->where('id',$id)->first();
                return view("admin.items.edit.edit-headphone",compact('item'));
                break;
            default:
                abort('404');
        }
      
    }


    public function update(Request $request,$name,$id){

        switch ($name){
            case 'laptop':
            
                break;
            case 'phone':
                $item = Item::find($id);
                $item->update([
                    'item_name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'company'=>$request->company,
                    'category_id'=>2
                ]);

                Phone::where('item_id',$id)->update([

                    "front_cam"=>$request->front_camera,
                    "rear_cam"=>$request->rear_camera,
                    "ram"=>$request->ram,
                    "storage"=>$request->storage,
                    "screen"=>$request->screen_size,
                    "battery"=>$request->battery,
                    'item_id'=>$item->id,
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

                session()->flash('success','Update Phone Successfully');

                return redirect()->route('index.item','phone');
                break;
            case 'watch':
                $item = Item::find($id);
                $item->update([
                    'item_name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'company'=>$request->company,
                    'category_id'=>3
                ]);

                Watch::where('item_id',$id)->update([
                    "waterproof"=>$request->waterproof,
                    "calling"=>$request->calling,
                    "battery"=>$request->battery,
                    'item_id'=>$item->id,
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

                session()->flash('success','Update Watch Successfully');

                return redirect()->route('index.item','watch');
                break;
            case 'headphone':
                $item = Item::find($id);
                $item->update([
                    'item_name'=>$request->name,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'company'=>$request->company,
                    'category_id'=>4
                ]);

                Headphone::where('item_id',$id)->update([
                    "type"=>$request->type,
                    "battery"=>$request->battery,
                    'item_id'=>$item->id,
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

                session()->flash('success','Update Headphone Successfully');

                return redirect()->route('index.item','headphone');
                break;
            default:
                abort('404');
        }

    }


    public function destroy($name , $id){

        if($name == "laptop"){

        }else if($name == "phone"){

            $item = Item::find($id);

            $images = Image::where('imageable_id',$id)->get();

            for($i =0;$i < count($images);$i++){
                $image_path = public_path('uploads') .'\\'. $images[$i]['name'];
                File::delete($image_path);
            }

            $item->images()->where('imageable_id',$item->id)->delete();

            $item->delete();

            session()->flash('success','Delete Phone Successfully');

            return redirect()->route('index.item','phone');

        }else if($name == "watch"){

            $item = Item::find($id);

            $images = Image::where('imageable_id',$id)->get();

            for($i =0;$i < count($images);$i++){
                $image_path = public_path('uploads') .'\\'. $images[$i]['name'];
                File::delete($image_path);
            }

            $item->images()->where('imageable_id',$item->id)->delete();

            $item->delete();

            session()->flash('success','Delete Watch Successfully');

            return redirect()->route('index.item','watch');

        }else if($name == "headphone"){
            $item = Item::find($id);

            $images = Image::where('imageable_id',$id)->get();

            for($i =0;$i < count($images);$i++){
                $image_path = public_path('uploads') .'\\'. $images[$i]['name'];
                File::delete($image_path);
            }

            $item->images()->where('imageable_id',$item->id)->delete();

            $item->delete();

            session()->flash('success','Delete Headphone Successfully');

            return redirect()->route('index.item','headphone');

        }else{
            abort('404');
        }
    }
}
