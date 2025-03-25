<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\CleaningS;
use App\Models\Dokter;
use App\Models\dpjpPasienranap;
use App\Models\Penjamin;
use App\Models\ppja;
use App\Models\tci;
use App\Models\trx_ppja;
use App\Models\trxBooking;
use App\Models\trxPasien;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class AlamandaController extends Controller
{
    public function index()
    {
        $beds       = Bed::where('bedstatus',0)
        ->Orwhere('bedstatus',3)
        ->where('is_active',1)
        ->orderBY('ruangan','asc')
        ->orderBY('namabed','asc')
        ->get();

        $bedKris    = Bed::with('trxPasien')
                ->where('ruangan','alamanda')
                ->where('kelas','kris')
                ->get();
        $jmlBedAlamanda = Bed::where('ruangan','alamanda')
                ->where('kelas','kris')
                ->count();

        $bedKosong = Bed::where('ruangan','alamanda')
                ->where('bedstatus',0)
                ->count();

        $bedRTC = Bed::where('ruangan','alamanda')
                ->where('bedstatus',3)
                ->count();

        $bedRP = Bed::where('ruangan','alamanda')
                ->where('bedstatus',2)
                ->count();

        $pxM = Bed::where('ruangan','alamanda')
                ->where('bedstatus',7)
                ->count();

        $pxF = Bed::where('ruangan','alamanda')
                ->where('bedstatus',8)
                ->count();

        $pxTotal = Bed::where('ruangan','alamanda')
                ->whereIn('bedstatus',[7,8])
                ->count();

        $pxBooking = trxBooking::with('trxPasien')
                ->with('bedAsal')
                ->with('bedTujuan')
                ->orwhere('status','booking')
                ->orwhere('status','request pindah')
                ->orderBy('id','asc')
                ->get();

        $kris       = Bed::select('m_bed.*','trx_pasien.*')
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
                ->where('ruangan','alamanda')
                ->where('kelas','kris')
                ->where('is_active',1)
                ->get();

        $dpjpPasien=dpjpPasienranap::select('namadokter',DB::raw('COUNT(namadokter) AS QTY'),'ruangan')
            ->where('ruangan','alamanda')
            ->where('namadokter','!=','')
            ->groupBy('namadokter')
            ->get();

        $tci    = tci::where('ruangan','alamanda')->get();

        $today = Carbon::today()->toDateString();
        $events = trxPasien::whereDate('infus_ganti', $today)->get();

        // menampilkan notif
        // $today = Carbon::today()->toDateString();
        // $events = trxPasien::whereDate('rencanapulang', $today)->get();

        return view('alamanda.index',[
        'tcis'          => $tci,
        'beds'          => $beds,
        'bedKelas2'     => $bedKris,
        'jmlBedAlamanda'  => $jmlBedAlamanda,
        'bedKosong'     => $bedKosong,
        'bedRTC'        => $bedRTC,
        'bedRP'         => $bedRP,
        'pxTotal'       => $pxTotal,
        'pxM'           => $pxM,
        'pxF'           => $pxF,
        'pxBookings'    => $pxBooking,
        'kriss'         => $kris,
        'dpjpPasiens'   => $dpjpPasien,
        'events'        => $events
        
        ]);
    }

    public function edit(string $id){
        $trxPasien  = trxPasien::with('Bed')
                        ->where('trx_id', $id)
                        ->first();
        $abc = $trxPasien->tci_waktupenggantiancairaninfus;
        if($abc !== null){
            $dateTime = new DateTime($abc);
            $tci_waktupenggantiancairaninfus = $dateTime->format('Y-m-d\TH:i');
        }else{
            $tci_waktupenggantiancairaninfus = null;
        }
        $dokter     = Dokter::where('is_active',1)->orderBY('namadokter','asc')->get();
        $penjamins = Penjamin::where('is_active',1)->orderBY('namapenjamin','asc')->get();
        $ppjas       = ppja::where('unit','alamanda')
                        ->orderBY('namaperawat','asc')->get();

        return view('alamanda.edit',[
            'tciwaktupenggantiancairan' => $tci_waktupenggantiancairaninfus,
            'dokters'   => $dokter,
            'penjamins' => $penjamins,
            'ppjas'          => $ppjas
        ])->with('trxPasien', $trxPasien);
    }

    public function approveBooking($id){
        $trxPasien  = trxPasien::where('trx_id', $id)
                        ->first();

        $bedtujuan = trxBooking::where('trx_id', $id)
                        ->where('status','booking')
                        ->first();

        if($trxPasien->jeniskelamin=='pria'){
            $jeniskelamin = '7';
        }else if($trxPasien->jeniskelamin=='wanita'){
            $jeniskelamin = '8';
        }

        $trxBed = [
            'trx_id'    => $id,
            'bedstatus' => $jeniskelamin
        ];

        $tglapprove = [
            'tgl_approve'   => date('Y-m-d H:i:s'),
            'status'        => 'ranap'
        ];

        $approvebooking = [
            'status'    => 'approve'
        ];

        if($bedtujuan->bed_asal<>0){
            $mBed           = [
                'bedstatus' =>  3,
                'trx_id'    => null
            ];
            Bed::where('id',$bedtujuan->bed_asal)->update($mBed);
        }
        Bed::where('id',$bedtujuan->bed_tujuan)->update($trxBed);
        trxPasien::where('trx_id',$id)->update($tglapprove);
        trxBooking::where('trx_id',$id)->update($approvebooking);

        return redirect()->route('alamanda.index')->with('success','Pasien dengan nama '.$trxPasien->namapasien.' telah masuk ke Rawat inap akasia!');
    }

    public function rencanaPulang($id){
        $datapasien = trxPasien::where('trx_id',$id)
                                ->first();
        $bedrencanapulang   = [ 'bedstatus' => 2 ];
        $rencanapulang      = [ 'status'    => 'rencanapulang',
                                'rencanapulang' => date('Y-m-d H:i:s') ];
        Bed::where('trx_id',$id)->update($bedrencanapulang);
        trxPasien::where('trx_id',$id)->update($rencanapulang);
        // notif berhasil
        return redirect()->route('alamanda.index')->with('success','Pasien dengan nama '.$datapasien->namapasien.' telah di rencanakan pulang!');
    }

    public function batalrencanaPulang($id){
        $datapasien = trxPasien::where('trx_id',$id)
                                ->first();
        if($datapasien->jeniskelamin=='pria'){
            $jeniskelamin = '7';
        }else if($datapasien->jeniskelamin=='wanita'){
            $jeniskelamin = '8';
        }
        $bedrencanapulang   = [ 'bedstatus' => $jeniskelamin ];
        $rencanapulang      = [ 'status'    => 'ranap',
                                'rencanapulang' => null ];
        
        Bed::where('trx_id',$id)->update($bedrencanapulang);
        trxPasien::where('trx_id',$id)->update($rencanapulang);

        return redirect()->route('alamanda.index')->with('success','Pasien dengan nama '.$datapasien->namapasien.' telah di batalkan untuk rencana pulang!');
    }

    public function batalranap($id){
        $datapasien = trxPasien::where('trx_id',$id)
                                ->first();
        if($datapasien->jeniskelamin=='pria'){
            $jeniskelamin = '7';
        }else if($datapasien->jeniskelamin=='wanita'){
            $jeniskelamin = '8';
        }
        $trxbatalranap         = [ 'status'     => 'batal booking' ];

        $batalranap      = [ 'status'    => 'batal-booking' ];
        
        trxBooking::where('trx_id',$id)->update($trxbatalranap);
        trxPasien::where('trx_id',$id)->update($batalranap);

        return redirect()->route('alamanda.index')->with('success','Pasien dengan nama '.$datapasien->namapasien.' telah di batalkan untuk naik ke rawat inap!');
    }

    public function pulangkanPasien($id){
        $datapasien = trxPasien::where('trx_id',$id)
                                ->first();

        $mBed           = [
            'bedstatus' =>  3,
            'trx_id'    => null,
            'tgl_pulang' => null,
            'tgl_cln' => null,
        ];

        $trxPasien      = [
            'status'    => 'pulang',
            'pasienpulang'    => date('Y-m-d H:i:s'),
        ];

        //Input ke tabel trx_clean_bed
        $beds = Bed::where('trx_id',$id)->first();
        $dataCleaning = [
                'namabed'   => $beds->namabed,
                'kelas'     => $beds->kelas,
                'ruangan'   => $beds->ruangan,
                'trx_id'    => $beds->trx_id,
                'bedstatus' =>  3,
                'tgl_pulang' => null,
                'tgl_cln' => null,
        ];

        // code mengirim pesan ke wa
        // $bed = Bed::where('trx_id',$id)->pluck('namabed');
        // $bed = Bed::where('bedstatus', 3)->pluck('namabed');
    
        // $number_tujuan = '6289628860332';
        // $message = 'Bed '. $bed .' segera di bersihkan';

        // $response = Http::withHeaders([
        //     'Authorization' => env('FONNTE_API_KEY'),
        //     ])->post('https://api.fonnte.com/send', [
        //         'target' => $number_tujuan, // Nomor tujuan (format: 628xxxxx)
        //         'message' => $message,
        //     ]);

        Bed::where('trx_id',$id)->update($mBed);
        trxPasien::where('trx_id',$id)->update($trxPasien);
        CleaningS::create($dataCleaning);
        

        return redirect()->route('alamanda.index')->with('success','Pasien dengan nama '.$datapasien->namapasien.' telah di pulangkan');
    }

    public function cleaned($id){
        $mBed       = [
            // 'trx_id'    => null,
            'bedstatus' => 0,
        ];

        Bed::where('id',$id)->update($mBed);
        return redirect()->route('alamanda.index')->with('success','Bed telah selesai di lakukan Cleaning dan siap digunakan!');
    }

    public function updatebed(Request $request, string $id){
        $trxBooking = [
            'trx_id'        => $id,
            'bed_asal'      => $request->bedasal,
            'bed_tujuan'    => $request->bedbooking,
            'status'        => 'booking',
        ];

        trxBooking::create($trxBooking);

        return redirect()->route('alamanda.index')->with('success','Transaksi Booking pasien berhasil disimpan!');
    }

    public function updateDatapasien(Request $request, string $id){
        $updatePasien = [
            'namapasien'    => $request->namapasien,
            'norekmed'      => $request->norekmed,
            'tgllahir'      => $request->tgllahir,
            'jeniskelamin'  => $request->jeniskelamin,
            'alamatpasien'  => $request->alamat,
            'penjamin'      => $request->penjamin,
            'keterangan'    => $request->keterangan,
            'infus_pasang'   => $request->infus_pasang,
            'infus_ganti'    => $request->infus_ganti
        ];

        if($request->jeniskelamin=='pria'){
            $jeniskelamin = '7';
        }else if($request->jeniskelamin=='wanita'){
            $jeniskelamin = '8';
        }

        $trxBed = [
            'trx_id'    => $id,
            'bedstatus' => $jeniskelamin
        ];

        Bed::where('trx_id',$id)->update($trxBed);
        trxPasien::where('trx_id',$id)->update($updatePasien);

        return redirect()->route('alamanda.edit',$id)->with('success','DATA PASIEN telah berhasil di Update!');
    }

    public function updateDataMedisPasien(Request $request, string $id){
        $updatePasien   = [
            'dpjp1'         => $request->dpjp1,
            'dpjp2'         => $request->dpjp2,
            'dpjp3'         => $request->dpjp3,
            'dpjp4'         => $request->dpjp4,
            'dpjp5'         => $request->dpjp5,
            'dpjp6'         => $request->dpjp6,
            'diagnosa'      => $request->diagnosa,
        ];
        trxPasien::where('trx_id',$id)->update($updatePasien);
        
        return redirect()->route('alamanda.edit',$id)->with('success','DATA MEDIS PASIEN telah berhasil di Update!');
    }

    public function updatePpjaPasien(Request $request, string $id){
        $updatePasien = [
            'ppja'          => $request->ppja,
        ];

        $ppjaPasien = trxPasien::where('trx_id',$id)->get();
        if($ppjaPasien[0]->ppja==null){
            $log = [
                'trx_id'        => $id,
                'ppja'          => $request->ppja,
            ];
            trx_ppja::create($log);

            trxPasien::where('trx_id',$id)->update($updatePasien);
        }else{
            $oldPpja = trxPasien::where('trx_id',$id)->first();
            $ppjaActive = trx_ppja::where('trx_id',$id)->where('ppja',$oldPpja->ppja)->where('waktu_selesai',null)->first();
            $ppjaActive->waktu_selesai = now();
            $ppjaActive->save();

            trxPasien::where('trx_id',$id)->update($updatePasien);

            $log = [
                'trx_id'        => $id,
                'ppja'          => $request->ppja,
            ];
            trx_ppja::create($log);
        }

        return redirect()->route('alamanda.edit',$id)->with('success','PPJA PASIEN telah berhasil di Update!');
    }

    public function hci(Request $request, string $id){
        $jumlahcairanmasuk  = $request->jmlcairan;
        $faktortetes        = $request->faktortetes;
        $tpm                = $request->jumlahtetes;

        $lamainfus          = ($jumlahcairanmasuk*$faktortetes)/($tpm*60);

        $waktuhabiscairan   = new DateTime($request->waktuinfus);
        $intervalString = 'PT' . round($lamainfus) . 'H';
        $waktuhabiscairan->add(new DateInterval($intervalString));
        $result = $waktuhabiscairan->format('Y-m-d H:i:s');

        $tci = [
            'tci_jenis'                         => $request->jenis,
            'tci_faktortetes'                   => $request->faktortetes,
            'tci_jmlcairan'                     => $request->jmlcairan,
            'tci_waktupenggantiancairaninfus'   => $request->waktuinfus,
            'tci_tpm'                           => $request->jumlahtetes,
            'tci_waktuhabisinfus'               => $result,
        ];

        trxPasien::where('trx_id', $id)->update($tci);

        return redirect()->route('alamanda.edit', $id )->with('success','WAKTU HABIS CAIRAN INFUS telah berhasil di Update!');
    }

    public function hciCLear($id){
        $stopHCI = [
            'tci_jenis'                         => null,
            'tci_faktortetes'                   => null,
            'tci_jmlcairan'                     => null,
            'tci_waktupenggantiancairaninfus'   => null,
            'tci_tpm'                           => null,
            'tci_waktuhabisinfus'               => null,
            ];
            trxPasien::where('trx_id', $id)->update($stopHCI);
            
            return redirect()->route('alamanda.edit', $id )->with('success','WAKTU HABIS CAIRAN INFUS telah berhasil di Stop!');
    }
}
