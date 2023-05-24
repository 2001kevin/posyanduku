<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataKader;

class DataKaderController extends Controller
{
    public function index(){
        $kaders = dataKader::all();
        return view('kader.index', compact('kaders'));
    }

    public function create(){
        return view('kader.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'NoTelepon' => 'required',
        ]);

        dataKader::create([
            'nama_kader' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->NoTelepon,
        ]);
        return redirect('dataKader');
    }
}
