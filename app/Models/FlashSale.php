<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FlashSale extends Model
{
    use HasFactory;

    protected $table='flash_sale';

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
            return $this->hasMany(ProductColor::class, 'flash_id',localKey: 'id');
        }
}
