<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function features(){
        return $this->hasMany('App\Models\Feature','item_id');
    }

    public function images(){
        return $this->morphMany('App\Models\Image','imageable');
    }
}
