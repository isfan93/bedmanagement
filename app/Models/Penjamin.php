<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjamin extends Model
{
    use HasFactory;

    protected $fillable = [
        'namapenjamin',
        'keterangan'
    ];

    protected $table = 'm_penjamin';

}
