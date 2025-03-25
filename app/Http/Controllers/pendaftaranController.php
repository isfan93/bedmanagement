<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\Bed;
use App\Models\Dokter;
use App\Models\Penjamin;
use App\Models\trxBooking;
use App\Models\trxPasien;
use Illuminate\Http\Request;

class pendaftaranController extends Controller
{
    public function index()
    {  
        $beds       = Bed::with('trxPasien')
                        ->with('trxBooking')
                        ->where('bedstatus','2')
                        ->orwhere('bedstatus','0')
                        ->orwhere('is_active','1')
                        ->orderBY('ruangan','asc')
                        ->orderBY('namabed','asc')
                        ->get();
        
        return view('pendaftaran.index',['beds'=> $beds]);
    }
    
    public function create()
    {
        $beds       = Bed::where('bedstatus','3')
                        ->orwhere('bedstatus','0')
                        ->where('is_active','1')
                        ->orderBY('ruangan','asc')
                        ->orderBY('namabed','asc')
                        ->get();

        $dokters    = Dokter::where('is_active','1')
                        ->orderBy('namadokter','asc')
                        ->get();
        $penjamins  = Penjamin::where('is_active','1')
                        ->orderBy('namapenjamin','asc')
                        ->get();
        return view('pendaftaran.create',[
                                            'beds'      => $beds,
                                            'dokters'   => $dokters,
                                            'penjamins'  => $penjamins
                                        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'bedbooking'    => 'required|string',
            'namapasien'    => 'required|string',
            'norekmed'      => 'required',
            'tgllahir'      => 'required',
            'jeniskelamin'  => 'required',
            'alamatpasien'  => 'required',
            'dpjp1'         => 'required',
            'diagnosa'      => 'required',
            'penjamin'      => 'required',
            'asalpasien'    => 'required',
            'agama'         => 'required',
        ]);

        $tglskrg    = Carbon::now()->format('dmY');
        $today      = now()->toDateString();
        $trxhariini = trxPasien::whereDate('created_at',$today)->count();
        $trxhariini++;

        $formattedNumber = Str::padLeft($trxhariini, 3, '0');

        $trx_id     = 'TP'.$tglskrg.$formattedNumber;   

        $trxPasien = [
            'trx_id'        => $trx_id,
            'namapasien'    => $request->namapasien,
            'norekmed'      => $request->norekmed,
            'tgllahir'      => $request->tgllahir,
            'jeniskelamin'  => $request->jeniskelamin,
            'alamatpasien'  => $request->alamatpasien,
            'agama'         => $request->agama,
            'dpjp1'         => $request->dpjp1,
            'dpjp2'         => $request->dpjp2,
            'dpjp3'         => $request->dpjp3,
            'dpjp4'         => $request->dpjp4,
            'dpjp5'         => $request->dpjp5,
            'dpjp6'         => $request->dpjp6,
            'diagnosa'      => $request->diagnosa,
            'penjamin'      => $request->penjamin,
            'keterangan'    => $request->keterangan,
            'asalpasien'    => $request->asalpasien,
            'status'        => 'booking',
        ];

        trxPasien::create($trxPasien);

        $trxBooking = [
            'trx_id'        => $trx_id,
            'bed_asal'      => '0',
            'bed_tujuan'    => $request->bedbooking,
            'status'        => 'booking',
        ];
        trxBooking::create($trxBooking);


        return redirect()->route('pendaftaran.index')->with('success','Transaksi Booking pasien berhasil disimpan!');
    }
}
