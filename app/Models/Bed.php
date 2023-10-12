<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'namabed',
        'kelas',
        'ruangan',
        'trx_id',
        'bedstatus',
    ];

    protected $table = 'm_bed';

    public function trxPasien()
    {
        return $this->hasOne(trxPasien::class, 'trx_id', 'trx_id');
    }
    public function trxBooking()
    {
        return $this->hasOne(trxBooking::class, 'trx_id', 'trx_id');
    }

}