<?php

namespace App\Http\Controllers;

use App\Models\ppja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ppjaController extends Controller
{
    public function index()
    {
        $ppjas = ppja::orderBY('namaperawat','asc')->get();

        return view('master.ppja',['ppjas' => $ppjas]);
    }
    
    public function update(Request $request, string $id)
    {
        $updateperawat = [
            'namaperawat'   => $request->namaperawat,
            'unit'          => $request->unit,
        ];
        ppja::where('id', $id)->update($updateperawat);

        return Redirect()->route('ppja.index')->with('success','PPJA telah berhasil di Update!');
    }
    
    public function aktif($id)
    {
        $updateperawat = [
            'is_active' => '1',
        ];
        
        ppja::where('id',$id)->update($updateperawat);
    
        return Redirect()->route('ppja.index')->with('success','PPJA telah berhasil di aktifkan!');
    }
    
    public function nonaktif($id)
    {
        $updateperawat = [
            'is_active' => '0',
        ];
        
        ppja::where('id',$id)->update($updateperawat);

        return Redirect()->route('ppja.index')->with('success','PPJA telah berhasil di nonaktifkan!');
    }
    public function tambahperawat(Request $request)
    {
        $updateperawat = [
            'namaperawat'   => $request->namaperawat,
            'unit'          => $request->unit,
        ];
        ppja::create($updateperawat);

        return Redirect()->route('ppja.index')->with('Success','PPJA telah berhasil di tambahkan!');
    }
}
