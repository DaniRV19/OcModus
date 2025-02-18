<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings'; // Cambia el nombre de la tabla aquí
    protected $fillable = ['title', 'salary']; // Asegúrate de que estos campos coincidan con los de la base de datos
}
