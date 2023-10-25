<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
        'description',
        'price_kg',
        'image',
    ];
}
