<?php

namespace App\Models;

use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $table="product";
    protected $guarded=['id','created_at','updated_at'];

    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'category_id');
}

public function sizes():BelongsToMany
{
    return $this->belongsToMany(Size::class);
}

    function product_colors(){
        return $this->hasMany(ProductColor::class, 'product_id','id');
    }

}
