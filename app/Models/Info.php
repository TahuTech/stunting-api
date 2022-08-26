<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable = [
        'jmlbb', 'norm', 'stun', 'gizle', 'gizba', 'gizku', 'gizbu', 'tintin', 'tinnor', 'tinpen', 'tinspen', 'berle', 'berba', 'berku', 'bersku'
    ];
}