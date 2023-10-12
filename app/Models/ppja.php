<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ppja extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaperawat',
        'unit',
    ];

    protected $table = 'm_ppja';
}
