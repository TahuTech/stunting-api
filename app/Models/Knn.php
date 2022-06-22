<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Balita;

class Knn extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'ukur', 'berat', 'tinggi', 'lkkepala', 'bulan', 'gizi', 'berat', 'tinggi', 'stunting'];
}
