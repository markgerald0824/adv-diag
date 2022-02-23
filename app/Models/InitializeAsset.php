<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitializeAsset extends Model
{
    use HasFactory;

    protected $casts = [
        'metadata' => 'array'
    ];
}
