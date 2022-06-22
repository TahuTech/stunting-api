<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp extends Model
{
    use HasFactory;

    protected $fillable = ['umur', 'berat', 'tinggi', 'lkkepala', 'jarak', 'gizi', 'berat', 'tinggi', 'stunting'];
}
