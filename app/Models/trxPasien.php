<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trxPasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'trx_id',
        'namapasien',
        'norekmed',
        'tgllahir',
        'jeniskelamin',
        'alamatpasien',
        'diagnosa',
        'dpjp1',
        'dpjp2',
        'dpjp3',
        'dpjp4',
        'dpjp5',
        'dpjp6',
        'ppja',
        'penjamin',
        'keterangan',
        'status',
        'tgl_approve',
    ];

    protected $table = 'trx_pasien';

    public function Bed()
    {
        return $this->hasOne(Bed::class, 'trx_id', 'trx_id');
    }
    
    public function trxBooking()
    {
        return $this->hasMany(Bed::class, 'trx_id', 'trx_id');
    }
}
