<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'province_id',
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
