<?php

namespace App\Http\Controllers;

use App\Models\dataAnak;
use App\Models\dataWali;
use Illuminate\Http\Request;

class DataAnakController extends Controller
{
    public function index(){
        $anaks = dataAnak::with('dataWalis')->get();
        return view('anak.index', compact('anaks'));
    }

    public function create(){

        $walis = dataWali::all();
        return view('anak.create', compact('walis'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'wali' => 'required',
        ]);

        dataAnak::create([
            'id_wali' => $request->wali,
            'nama_anak' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect('dataAnak');
    }
}
