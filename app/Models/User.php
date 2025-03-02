<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\PaymentCard;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->hasMany(\App\Models\Address::class, 'user_id');
    }


    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlist'); // usa tabla wishlist como pivot para producto
    }

    public function cart()
    {
        return $this->belongsToMany(Product::class, 'shopping_cart')->withPivot('quantity'); // usa tabla shopping_cart como pivot para producto
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function paymentCards()
    {
        return $this->hasMany(\App\Models\PaymentCard::class, 'user_id');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
