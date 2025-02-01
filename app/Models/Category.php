<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table="category";
    protected $guarded=['id','created_at','updated_at'];

    public function products(): HasMany
    {
        return $this->hasMany(Category::class,'category_id') ;
    }

    public function Size(): HasMany
    {
        return $this->hasMany(Size::class,'category_id') ;
    }
}
