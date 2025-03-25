<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\BedcleaningV;
use App\Models\CleaningS;
use App\Models\trxPasien;
use Illuminate\Support\Facades\Http;

class CleaningController extends Controller
{
    //

    public function MulaiBersihkan($id)
    {
      
      $bed =[
        'tgl_pulang' => date('Y-m-d H:i:s'),
      ];

      Bed::where('id',$id)->update($bed);
      CleaningS::where('id',$id)->update($bed);
        return redirect()->route('dashboard.index');
    }

    public function SelesaiBersihkan($id)
    {
        // $bed = CleaningS::find($id);
        $bedclean =[
          'bedstatus' => 0,
          'tgl_cln' => date('Y-m-d H:i:s'),
        ];

        CleaningS::where('id',$id)->update($bedclean);
        
        // code mengirim pesan ke wa
        $bed = CleaningS::where('id', $id)->pluck('namabed');
        $watku_c = BedcleaningV::where('id', $id)->pluck('waktu_cleaning');
        
        // developer
        $number_tujuan = '6289628860332';
         // iswandi
        $number_tujuan1 = '6285724914449';
        // faisal
        $number_tujuan2 = '6285793356468';
        // wahyu
        $number_tujuan3 = '6282320998142';
        
        $message = 'Bed '. $bed .' telah selesai di lakukan Cleaning dan siap digunakan!, waktu pembersihan'. $watku_c;  

        // $response = Http::withHeaders([
        //     'Authorization' => env('FONNTE_API_KEY'),
        //     ])->post('https://api.fonnte.com/send', [
        //         'target' => $number_tujuan, // Nomor tujuan (format: 628xxxxx)
        //         'message' => $message,
        //     ]);
            
       $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $number_tujuan1, // Nomor tujuan (format: 628xxxxx)
                'message' => $message,
            ]);
            
       $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $number_tujuan2, // Nomor tujuan (format: 628xxxxx)
                'message' => $message,
            ]);
            
       $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $number_tujuan3, // Nomor tujuan (format: 628xxxxx)
                'message' => $message,
            ]);
            
          return redirect()->route('dashboard.index');
    }
}
