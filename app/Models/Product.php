<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function cart(){
        return $this->hasMany(Cart::class,'product_id');
    }
    public function order(){
        return $this->hasMany(Order::class,'product_id');
    }
}
