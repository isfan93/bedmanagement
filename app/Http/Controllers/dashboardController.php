<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\BedcleaningV;
use App\Models\CleaningS;
use App\Models\pxPulang;
use App\Models\rencanaPulang;
use App\Models\trxPasien;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $pxRanap        = Bed::whereNotNull('trx_id')->count();
        $rencanaPulang  = Bed::whereNotNull('trx_id')->where('bedstatus','2')->count();
        $pxRencanaPulang= rencanaPulang::all();
        $pxPulang       = pxPulang::orderBy('updated_at','desc')->get();
        $bedKosong      = Bed::whereNull('trx_id')->where('is_active','1')->count();
        $pxPria         = Bed::whereNotNull('trx_id')->where('bedstatus','7')->count();
        $pxWanita       = Bed::whereNotNull('trx_id')->where('bedstatus','8')->count();
        $bedRenov       = Bed::where('bedstatus','6')->count();
        $bedRenovAll    = Bed::where('bedstatus','6')->get();
        $bedNonaktif    = Bed::where('is_active','0')->count();
        $bedNonaktifAll = Bed::where('is_active','0')->get();
        //$readyToClean   = Bed::whereNotNull('trx_id')->where('bedstatus','3')->count();
        $readyToClean   = Bed::where('bedstatus','3')->count();
        $readyToCleanAll = Bed::where('bedstatus','3')->get();

        $trxcs = Bed::where('bedstatus', '0')->where('tgl_cln', '!=', null)->where('tgl_pulang', '!=', null)->get();
        
        $bedClean = CleaningS::where('bedstatus','3')->get();
        $trxcln = BedcleaningV::where('bedstatus','0')->get();

        $bedCleanTot = CleaningS::where('bedstatus','3')->count();
        $CleanTotAkasia = CleaningS::where('ruangan','Akasia')->where('bedstatus','3')->count();
        $CleanTotAsoka = CleaningS::where('ruangan','Asoka')->where('bedstatus','3')->count();
        $CleanTotAzalea = CleaningS::where('ruangan','Azalea')->where('bedstatus','3')->count();
        $CleanTotAnthurium = CleaningS::where('ruangan','Anthurium')->where('bedstatus','3')->count();
        $CleanTotPerina = CleaningS::where('ruangan','Perinatologi')->where('bedstatus','3')->count();
        $CleanTotHCU = CleaningS::where('ruangan','Intensif Dewasa')->where('bedstatus','3')->count();

        //$tgl_pulang = = trxPasien::where('status','1')->where('tgl_pulang',date('Y-m-d'))->get();


        return view('dashboard.index',[
            'pxRanap'           => $pxRanap,
            'rencanaPulang'     => $rencanaPulang,
            'bedKosong'         => $bedKosong,
            'pxPria'            => $pxPria,
            'pxWanita'          => $pxWanita,
            'bedNonaktif'       => $bedNonaktif,
            'bedRenov'          => $bedRenov,
            'pxRencanaPulangs'  => $pxRencanaPulang,
            'pxPulangs'         => $pxPulang,
            'bedRenovAlls'      => $bedRenovAll,
            'bedNonaktifAlls'   => $bedNonaktifAll,
            'readyToClean'      => $readyToClean,
            'readyToCleans'      => $readyToCleanAll,
            'trxcln'             => $trxcln,
            'bedClean'           => $bedClean,
            'bedCleanTot'        => $bedCleanTot,
            'akasiaclean'        => $CleanTotAkasia,
            'asokaclean'         => $CleanTotAsoka,
            'azaleaclean'        => $CleanTotAzalea,
            'anthuriumclean'     => $CleanTotAnthurium,
            'perinaclean'        => $CleanTotPerina,
            'hcuclean'           => $CleanTotHCU,
        ]);
    }
}
