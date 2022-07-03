<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;

    protected $fillable = [
        'u', 'bb', 'tb', 'lkkepala', 'jarak', 'gizi', 'berat', 'tinggi', 'stunting'
    ];
}
