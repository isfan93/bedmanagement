<?php

namespace App\Http\Controllers;

use App\Models\Penjamin;
use Illuminate\Http\Request;

class penjaminController extends Controller
{
    public function index()
    {
        $penjamins = Penjamin::orderBY('namapenjamin','asc')->get();

        return view('master.penjamin',['penjamins' => $penjamins]);
    }
}
