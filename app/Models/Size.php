<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Size extends Model
{
    use HasFactory;

    protected $table='sizes';
    protected $guarded=['id', 'created_at', 'updated_at'];

    public function Category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sizes():BelongsToMany
{
    return $this->belongsToMany(Product::class);
}


}
