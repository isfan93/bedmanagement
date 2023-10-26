<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Dokter;
use App\Models\Penjamin;
use App\Models\ppja;
use App\Models\trxBooking;
use App\Models\trxPasien;
use Illuminate\Http\Request;

class azaleaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // BED VVIP
        $bedVvip    = Bed::with('trxPasien')
                        ->where('ruangan','azalea')
                        ->where('kelas','vvip')
                        ->get();
        $jmlBedVvip = Bed::where('ruangan','azalea')
                        ->where('kelas','vvip')
                        ->count();

        // BED VIP
        $bedVip    = Bed::with('trxPasien')
                        ->where('ruangan','azalea')
                        ->where('kelas','vip')
                        ->get();
        $jmlBedVip = Bed::where('ruangan','azalea')
                        ->where('kelas','vip')
                        ->count();

        // BED KELAS 2
        $bedKelas2    = Bed::with('trxPasien')
                        ->where('ruangan','azalea')
                        ->where('kelas','kelas 2')
                        ->get();
        $jmlBedKelas2 = Bed::where('ruangan','azalea')
                        ->where('kelas','kelas 2')
                        ->count();

        // Bed Kosong
        $bedKosong = Bed::where('ruangan','azalea')
                        ->where('bedstatus','0')
                        ->count();

        // Bed READY TO CLEAN
        $bedRTC = Bed::where('ruangan','azalea')
                        ->where('bedstatus','3')
                        ->count();

        // Bed RENCANA PULANG
        $bedRP = Bed::where('ruangan','azalea')
                        ->where('bedstatus','2')
                        ->count();

        // Bed PASIEN pria
        $pxM = Bed::where('ruangan','azalea')
                        ->where('bedstatus','7')
                        ->count();

        // Bed PASIEN Wanita
        $pxF = Bed::where('ruangan','azalea')
                        ->where('bedstatus','8')
                        ->count();

        // Bed PASIEN TOTAL
        $pxTotal = Bed::where('ruangan','azalea')
                        ->where('bedstatus','7')
                        ->orwhere('bedstatus','8')
                        ->count();

        // Tabel Pasien Booking
        $pxBooking = trxBooking::with('trxPasien')
                        ->with('bedAsal')
                        ->with('bedTujuan')
                        ->orwhere('status','booking')
                        ->orwhere('status','request pindah')
                        ->orderBy('id','asc')
                        ->get();

        $vvip       = Bed::select('m_bed.*','trx_pasien.*')
                        ->leftjoin('trx_pasien', 'trx_pasien.trx_id', '=', 'm_bed.trx_id')
                        ->addSelect(['namadpjp1' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp1')
                            ->limit(1)])
                        ->addSelect(['namadpjp2' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp2')
                            ->limit(1)])
                        ->addSelect(['namadpjp3' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp3')
                            ->limit(1)])
                        ->addSelect(['namadpjp4' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp4')
                            ->limit(1)])
                        ->addSelect(['namadpjp5' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp5')
                            ->limit(1)])
                        ->addSelect(['namadpjp6' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp6')
                            ->limit(1)])
                        ->addSelect(['namapenjamin' => Penjamin::select('namapenjamin')
                            ->whereColumn('id','trx_pasien.penjamin')
                            ->limit(1)])
                        ->addSelect(['namaperawat' => ppja::select('namaperawat')
                            ->whereColumn('id','trx_pasien.ppja')
                            ->limit(1)])
                        ->where('ruangan','azalea')
                        ->where('kelas','vvip')
                        ->get();

        $vip       = Bed::select('m_bed.*','trx_pasien.*')
                        ->leftjoin('trx_pasien', 'trx_pasien.trx_id', '=', 'm_bed.trx_id')
                        ->addSelect(['namadpjp1' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp1')
                            ->limit(1)])
                        ->addSelect(['namadpjp2' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp2')
                            ->limit(1)])
                        ->addSelect(['namadpjp3' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp3')
                            ->limit(1)])
                        ->addSelect(['namadpjp4' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp4')
                            ->limit(1)])
                        ->addSelect(['namadpjp5' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp5')
                            ->limit(1)])
                        ->addSelect(['namadpjp6' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp6')
                            ->limit(1)])
                        ->addSelect(['namapenjamin' => Penjamin::select('namapenjamin')
                            ->whereColumn('id','trx_pasien.penjamin')
                            ->limit(1)])
                        ->addSelect(['namaperawat' => ppja::select('namaperawat')
                            ->whereColumn('id','trx_pasien.ppja')
                            ->limit(1)])
                        ->where('ruangan','azalea')
                        ->where('kelas','vip')
                        ->get();

        $kls2       = Bed::select('m_bed.*','trx_pasien.*')
                        ->leftjoin('trx_pasien', 'trx_pasien.trx_id', '=', 'm_bed.trx_id')
                        ->addSelect(['namadpjp1' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp1')
                            ->limit(1)])
                        ->addSelect(['namadpjp2' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp2')
                            ->limit(1)])
                        ->addSelect(['namadpjp3' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp3')
                            ->limit(1)])
                        ->addSelect(['namadpjp4' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp4')
                            ->limit(1)])
                        ->addSelect(['namadpjp5' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp5')
                            ->limit(1)])
                        ->addSelect(['namadpjp6' => Dokter::select('namadokter')
                            ->whereColumn('id','trx_pasien.dpjp6')
                            ->limit(1)])
                        ->addSelect(['namapenjamin' => Penjamin::select('namapenjamin')
                            ->whereColumn('id','trx_pasien.penjamin')
                            ->limit(1)])
                        ->addSelect(['namaperawat' => ppja::select('namaperawat')
                            ->whereColumn('id','trx_pasien.ppja')
                            ->limit(1)])
                        ->where('ruangan','azalea')
                        ->where('kelas','kelas 2')
                        ->get();

        return view('azalea.index',[
            'bedVvip'       => $bedVvip,
            'jmlBedVvip'    => $jmlBedVvip,
            'bedVip'        => $bedVip,
            'jmlBedVip'     => $jmlBedVip,
            'bedKelas2'     => $bedKelas2,
            'jmlBedKelas2'  => $jmlBedKelas2,
            'bedKosong'     => $bedKosong,
            'bedRTC'        => $bedRTC,
            'bedRP'         => $bedRP,
            'pxTotal'       => $pxTotal,
            'pxM'           => $pxM,
            'pxF'           => $pxF,
            'pxBookings'    => $pxBooking,
            'vvips'         => $vvip,
            'vips'          => $vip,
            'kls2s'         => $kls2,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $trxPasien  = trxPasien::with('Bed')
                        ->where('trx_id', $id)
                        ->first();
        $dokter     = Dokter::orderBY('namadokter','asc')->get();
        $penjamins = Penjamin::orderBY('namapenjamin','asc')->get();
        $ppjas       = ppja::where('unit','azalea')
                        ->orderBY('namaperawat','asc')->get();

        return view('azalea.edit',[
            'dokters'   => $dokter,
            'penjamins' => $penjamins,
            'ppjas'          => $ppjas
        ])->with('trxPasien', $trxPasien);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approveBooking($id)
    {
        $trxPasien  = trxPasien::where('trx_id', $id)
                        ->first();

        $bedtujuan = trxBooking::where('trx_id', $id)
                        ->where('status','booking')
                        ->first();

        // penentuan jenis kelamin untuk menentukan warna pada box
        if($trxPasien->jeniskelamin=='pria'){
            $jeniskelamin = '7';
        }else if($trxPasien->jeniskelamin=='wanita'){
            $jeniskelamin = '8';
        }

        // pengisian variable update m_bed berdasarkan trx_id
        $trxBed = [
            'trx_id'    => $id,
            'bedstatus' => $jeniskelamin
        ];

        // pengisian variable update trxPasien berdasarkan trx_id
        $tglapprove = [
            'tgl_approve'   => date('Y-m-d H:i:s'),
            'status'        => 'ranap'
        ];

        // merubah status trxBooking berdasarkan trx_id
        $approvebooking = [
            'status'    => 'approve'
        ];

        // update ke DB
        Bed::where('id',$bedtujuan->bed_tujuan)->update($trxBed);
        trxPasien::where('trx_id',$id)->update($tglapprove);
        trxBooking::where('trx_id',$id)->update($approvebooking);

        // notif berhasil
        return redirect()->route('azalea.index')->with('success','Pasien dengan nama '.$trxPasien->namapasien.' telah masuk ke Rawat inap Azalea!');
    }
}