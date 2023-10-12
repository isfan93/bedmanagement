<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trxBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'trx_id',
        'bed_asal',
        'bed_tujuan',
        'status',
    ];

    protected $table = 'trx_booking';

    public function bedAsal()
    {
        return $this->hasOne(Bed::class, 'id', 'bed_asal');
    }
    public function bedTujuan()
    {
        return $this->hasOne(Bed::class, 'id', 'bed_tujuan');
    }
    public function trxPasien()
    {
        return $this->hasOne(trxPasien::class, 'trx_id', 'trx_id');
    }
}
