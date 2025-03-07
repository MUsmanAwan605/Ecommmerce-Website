<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table="product_color";
    protected $guarded=['id','created_at','updated_at'];

    function color(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
}
