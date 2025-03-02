<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    use HasFactory;

    // Campos asignables
    protected $fillable = [
        'user_id',
        'card_holder',
        'card_number',
        'expiration_date',
        'cvv',
        'is_default',
    ];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
