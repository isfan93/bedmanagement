<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function proses(Request $request){
        $request->validate([
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'username'  => $request->username,
            'password'  => $request->password,
        ];

        $user = User::where('username', $request->input('username'))->first();

        if(Auth::attempt($data)){
            return redirect()->route('dashboard.index')->with('success','Selamat datang '.strtoupper(Auth::user()->name).', di Zayncare Bed Management.');
        }else{
            return redirect()->back()->with('error','Username atau password salah. silahkan ulangi kembali.');
            dd($data);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
