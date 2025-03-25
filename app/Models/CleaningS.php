<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class CleaningS extends Model
{
    use HasFactory;

    // protected $table = 'trxcleaning';
    protected $table = 'trx_clean_bed';
    protected $fillable = [
        'namabed',
        'kelas',
        'ruangan',
        'trx_id',
        'bedstatus',
        'is_active',
        'tgl_pulang',
        'tgl_cln',
    ];
}
