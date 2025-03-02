<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function usersWishlist()
    {
        return $this->belongsToMany(User::class, 'wishlist');
    }

    public function usersCart()
    {
        return $this->belongsToMany(User::class, 'shopping_cart')->withPivot('quantity');
    }

    public function images()
{
    return $this->hasMany(\App\Models\ProductImages::class);
}


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
