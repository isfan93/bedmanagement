<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trx_ppja extends Model
{
    use HasFactory;
    protected $fillable = [
        'trx_id',
        'ppja',
    ];

    protected $table = 'trx_ppja';
}
