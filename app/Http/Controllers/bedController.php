<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use Illuminate\Http\Request;

class bedController extends Controller
{
    public function index()
    {
        $beds = Bed::orderBY('ruangan','asc')->get();
        return view('master.bed',['beds' => $beds]);
    }

    public function store(Request $request)
    {
        $bedbaru    = [
            'namabed'   => $request->namabed,
            'kelas'     => $request->kelas,
            'ruangan'   => $request->ruangan,
            'bedstatus' => 0,
        ];
        Bed::create($bedbaru);

        return redirect()->route('bed.index')->with('Success','Bed telah berhasil ditambahkan.');
    }
    
    public function edit(string $id)
    {
        $bed       = Bed::where('id',$id)
                        ->first();

        return view('master/bededit',[ 'bed' => $bed]);
    }
    
    public function bedNonaktif(string $id)
    {
        $mBed           = [
                'is_active' =>  '0',
            ];
            Bed::where('id',$id)->update($mBed);
        return redirect()->route('bed.index')->with('success','Bed telah berhasil di Non-aktifkan');
    }
    
    public function bedAktif(string $id)
    {
        $mBed           = [
                'is_active' =>  '1',
            ];
            Bed::where('id',$id)->update($mBed);
        return redirect()->route('bed.index')->with('success','Bed telah berhasil di Aktifkan');
    }

    public function bedDelete(string $id)
    {
        dd($id,'Delete');
    }
}
