<?php

namespace App\Http\Controllers;

use App\Models\dataKader;
use Illuminate\Http\Request;
use App\Models\dataWali as ModelsDataWali;
use App\Models\dataAbsensiKader as ModelsDataAbsensiKader;

class DataAbsensiKader extends Controller
{
    public function index(){
        $walis = ModelsDataWali::all();

        return view('wali.index', compact('walis'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store()
    {
        # code...
    }

    public function detail()
    {
        return view('dashboard');
    }

    public function edit($id)
    {
        $absensi_kaders = dataKader::find($id);

        return view('absensi_kader.edit', compact('absensi_kaders'));
    }

    public function update(Request $request, $id)
    {   
        $update_absensi_kader = $request->validate([
            'nama_absensi_kader' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'umur' => 'required|numeric|between:0,120',            
        ]);
        
        $data_absensi_kader = ModelsDataAbsensiKader::find($id);
        $data_absensi_kader->nama_absensi_kader = $request->nama_absensi_kader;
        $data_absensi_kader->jenis_kelamin = $request->jenis_kelamin;
        $data_absensi_kader->umur = $request->umur;
        $data_absensi_kader->save();

        return redirect()->route('dataAbsensiKader')->with('toast_success' ,'Data berhasil diperbarui!');
        
    }

     public function delete($id)
    {
        $absensi_kaders = ModelsDataAbsensiKader::find($id);
        $absensi_kaders->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataAbsensiKader')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataAnak')->withSuccessMessage('Data berhasil dihapus!');
    }
}
