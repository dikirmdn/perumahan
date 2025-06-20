<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use HasFactory;

    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name', 
        'categories_id', 
        'slug', 
        'photos', 
        'thumb_description',
        'long_description', 
        'price' , 
        'stock',
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }


}
