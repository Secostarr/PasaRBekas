<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'city_id',
        'title',
        'slug',
        'description',
        'price',
        'condition',
        'status',
        'views',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function conversations()
    {
        return $this->hasMany(
            Conversation::class
        );
    }
}