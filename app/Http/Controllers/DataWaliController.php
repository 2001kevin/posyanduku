<?php

namespace App\Http\Controllers;

use App\Models\dataWali;
use Illuminate\Http\Request;

class DataWaliController extends Controller
{
    public function index(){
        $walis = dataWali::all();
        return view('wali.index', compact('walis'));
    }

    public function create(){
        return view('wali.create');
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'NoTelepon' => 'required',
        ]);

        dataWali::create([
            'nama_wali' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->NoTelepon,
        ]);
        return redirect('dataWali');
    }
}
