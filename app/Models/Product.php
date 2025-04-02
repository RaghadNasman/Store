<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
//     protected $fillable = ['name', 'quantity', 'price', 'category', 'description'];
// public function products() {
//     return $this->hasMany(Product::class);
// }
protected $fillable = ['name', 'quantity', 'price', 'description', 'category', 'user_id'];
// public function category()
// {
//     return $this->belongsTo(Category::class);
// }
public function category()
{
    return $this->belongsTo(Category::class, 'category');
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
