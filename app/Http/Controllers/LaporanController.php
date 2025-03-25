<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\lapDPJP;
use App\Models\waktupulang;
use App\Models\lapPPJA;
use App\Models\ppja;
use App\Models\ppja_v;
use App\Models\trx_ppja;
use App\Models\trxPasien;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class LaporanController extends Controller
{
    public function getDataPPJA(Request $request){
        if($request->start_date || $request->end_date){
            $str_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

            $datapr = ppja_v::all();
        } else{
            $datapr = ppja_v::all();
        }

        return view('laporan.index', compact('datapr'));
    }   

    public function index(Request $request)
    {
        if($request->start_date || $request->end_date){
            $str_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
            
            $datapr = trx_ppja::select('trx_ppja.ppja as id_ppja','m_ppja.namaperawat as nama_perawat','trx_ppja.created_at as tanggal', DB::raw('COUNT(trx_ppja.ppja) as jumlah_pasien'))->leftjoin('m_ppja', 'trx_ppja.ppja','=','m_ppja.id')->whereBetween('trx_ppja.updated_at', [$str_date,$end_date])->groupBy('m_ppja.namaperawat')->get();

            
            $datadr = lapDPJP::all();

        }else{

            $datapr = ppja_v::all();
            $datadr = lapDPJP::all();
        }

        $waktuPxPulang = waktupulang::all();
        
        return view('laporan.index', compact('datapr', 'datadr','waktuPxPulang'));
        
    }

    public function getDataDokter(Request $request)
    {
        if($request->start_date || $request->end_date){
            $str_date = Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

            $datadr = DB::table('m_dokter')
            ->select(
                'm_dokter.id as id',
                'm_dokter.namadokter as nama_dokter',
                DB::raw('COUNT(tp.namapasien) as total_pasien'),
                'tp.updated_at as tanggal'
            )
            ->leftJoin(DB::raw('( 
                SELECT dpjp1 as id, namapasien, status, updated_at FROM trx_pasien
                UNION ALL 
                SELECT dpjp2, namapasien, status, updated_at FROM trx_pasien WHERE dpjp2 IS NOT NULL 
                UNION ALL 
                SELECT dpjp3, namapasien, status, updated_at FROM trx_pasien WHERE dpjp3 IS NOT NULL
                UNION ALL 
                SELECT dpjp4, namapasien, status, updated_at FROM trx_pasien WHERE dpjp4 IS NOT NULL 
                UNION ALL 
                SELECT dpjp5, namapasien, status, updated_at FROM trx_pasien WHERE dpjp5 IS NOT NULL
                UNION ALL 
                SELECT dpjp6, namapasien, status, updated_at FROM trx_pasien WHERE dpjp6 IS NOT NULL
            ) as tp'), 'm_dokter.id', '=', 'tp.id')
            ->whereBetween('tp.updated_at', [$str_date, $end_date])
            ->groupBy('m_dokter.namadokter')
            ->orderByDesc('tp.updated_at')
            ->get();

            $datapr = ppja_v::all();
            
            $waktuPxPulang = waktupulang::all();


        }else{
            $datadr = lapDPJP::all();
            $datapr = ppja_v::all();
            

            $waktuPxPulang = waktupulang::all();
        }
        
        return view('laporan.index', compact('datadr', 'datapr','waktuPxPulang'));
    }

}
