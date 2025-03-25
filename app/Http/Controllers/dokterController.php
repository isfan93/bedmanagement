<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class dokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::orderBY('namadokter','asc')->get();
        return view('master.dokter',[ 'dokters' => $dokters]);
    }
    
    public function store(Request $request)
    {
        $dokterbaru = [
            'namadokter' => $request->namadokter,
            'spesialis'  => $request->spesialis,
        ];

        Dokter::create($dokterbaru);
        return redirect()->route('dokter.index')->with('Success','Dokter baru berhasil disimpan!');
    }

    public function aktif($id)
    {
        $aktifkan = [
            'is_active' => '1',
        ];
        Dokter::where('id',$id)->update($aktifkan);
        return redirect()->route('dokter.index')->with('success','Dokter telah berhasil di aktifkan');
    }
    
    public function nonaktif($id)
    {
        $nonaktifkan = [
            'is_active' => '0',
        ];
        Dokter::where('id',$id)->update($nonaktifkan);
        return redirect()->route('dokter.index')->with('success','Dokter telah berhasil di aktifkan');

    }
}
