<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'trash_type_id',
        'weight',
        'price',
        'total',
    ];

    public function trashType()
    {
        return $this->belongsTo(TrashType::class);
    }
}
