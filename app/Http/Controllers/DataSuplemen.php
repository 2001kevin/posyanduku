<?php

namespace App\Http\Controllers;

use App\Models\dataAnak;
use App\Models\dataFisik as ModelsDataFisik;
use App\Models\dataKader;
use Illuminate\Http\Request;

class DataSuplemen extends Controller
{
    public function index(){
        $fisiks = ModelsDataFisik::all();

        return view('fisik.index', compact('fisiks'));
    }

    public function create()
    {
        return view('suplement.create');
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
        $fisiks = ModelsDataFisik::find($id);
        $anaks = dataAnak::all();
        $kaders = dataKader::all();

        return view('fisik.edit', compact('fisiks', 'anaks', 'kaders'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'id_anak' => 'required|int',
            'id_kader' => 'required|int',
            'berat_badan' => 'required|numeric|between:0,99.99',
            'naik_turun_bb' => 'required|in:naik,turun',
            'tgl_pemeriksaan' => 'required|date',            
            'keterangan' => 'required|string|max:255',      
        ]);
        
        $data_fisik = ModelsDataFisik::find($id);
        $data_fisik->id_anak = $request->id_anak;
        $data_fisik->id_kader = $request->id_kader;
        $data_fisik->berat_badan = $request->berat_badan;
        $data_fisik->naik_turun_bb = $request->naik_turun_bb;
        $data_fisik->tgl_pemeriksaan = $request->tgl_pemeriksaan;
        $data_fisik->keterangan = $request->keterangan;
        $data_fisik->save();

        return redirect()->route('dataFisik')->with('toast_success' ,'Data berhasil diperbarui!');
        
    }

     public function delete($id)
    {
        $data_fisiks = ModelsDataFisik::find($id);
        $data_fisiks->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataFisik')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataFisik')->withSuccessMessage('Data berhasil dihapus!');
    }
}
