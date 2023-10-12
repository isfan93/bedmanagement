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
    /**
     * Display a listing of the resource.
     */
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

    /**
        * Show the form for creating a new resource.
    */
    
    public function create()
    {
        $beds       = Bed::where('bedstatus','2')
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request)->all();
        // RUMUS Trx Id
        $tglskrg    = Carbon::now()->format('dmY');
        $today      = now()->toDateString();
        $trxhariini = trxPasien::whereDate('created_at',$today)->count();
        $trxhariini++;

        $formattedNumber = Str::padLeft($trxhariini, 3, '0');

        $trx_id     = 'TP'.$tglskrg.$formattedNumber;   

        // Insert to DB
        // dd($request->penjamin);
        $trxPasien = [
            'trx_id'        => $trx_id,
            'namapasien'    => $request->namapasien,
            'norekmed'      => $request->norekmed,
            'tgllahir'      => $request->tgllahir,
            'jeniskelamin'  => $request->jeniskelamin,
            'alamatpasien'  => $request->alamatpasien,
            'dpjp1'         => $request->dpjp1,
            'dpjp2'         => $request->dpjp2,
            'dpjp3'         => $request->dpjp3,
            'dpjp4'         => $request->dpjp4,
            'dpjp5'         => $request->dpjp5,
            'dpjp6'         => $request->dpjp6,
            'diagnosa'      => $request->diagnosa,
            'penjamin'      => $request->penjamin,
            'keterangan'    => $request->keterangan,
            'status'        => 'booking',
        ];
        // memasukan data diatas ke table DB
        trxPasien::create($trxPasien);

        $trxBooking = [
            'trx_id'        => $trx_id,
            'bed_asal'      => '0',
            'bed_tujuan'    => $request->bedbooking,
            'status'        => 'booking',
        ];
        trxBooking::create($trxBooking);

        // Update m_bed
        $trxBed = [
            'trx_id'        => $trx_id,
            'bedstatus'     => '4'
        ];
        Bed::where('id',$request->bedbooking)->update($trxBed);

        // notif berhasil
        return redirect()->route('pendaftaran.index')->with('success','Transaksi Booking pasien berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
