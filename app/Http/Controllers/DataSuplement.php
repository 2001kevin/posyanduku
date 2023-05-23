<?php

namespace App\Http\Controllers;

use App\Models\dataAnak;
use App\Models\dataKader;
use App\Models\dataSuplement as ModelsDataSuplement;
use Illuminate\Http\Request;

class DataSuplement extends Controller
{
    public function index(){
        $suplements = ModelsDataSuplement::all();

        return view('suplement.index', compact('suplements'));
    }

    public function create(Type $var = null)
    {
        return view('dashboard');
    }

    public function store(Type $var = null)
    {
        # code...
    }

    public function detail(Type $var = null)
    {
        return view('dashboard');
    }

    public function edit($id)
    {
        $suplements = ModelsDataSuplement::find($id);
        $anaks = dataAnak::all();
        $kaders = dataKader::all();

        return view('suplement.edit', compact('suplements', 'anaks', 'kaders'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'id_anak' => 'required|int',
            'id_kader' => 'required|int',
            'vitamin_a' => 'required|in:sudah,belum',
            'obat_cacing' => 'required|in:sudah,belum',
            'makanan_tambahan' => 'required|in:sudah,belum',
            'bulan_suplemen' => 'required|in:februari,agustus',
            'tgl_pemeriksaan' => 'required|date',            
            'keterangan' => 'required|string|max:255',      
        ]);
        
        $data_suplement = ModelsDataSuplement::find($id);
        $data_suplement->id_anak = $request->id_anak;
        $data_suplement->id_kader = $request->id_kader;
        $data_suplement->vitamin_a = $request->vitamin_a;
        $data_suplement->obat_cacing = $request->obat_cacing;
        $data_suplement->makanan_tambahan = $request->makanan_tambahan;
        $data_suplement->bulan_suplemen = $request->bulan_suplemen;
        $data_suplement->tgl_pemeriksaan = $request->tgl_pemeriksaan;
        $data_suplement->keterangan = $request->keterangan;
        $data_suplement->save();

        return redirect()->route('dataSuplement')->with('toast_success' ,'Data berhasil diperbarui!');
        
    }

     public function delete($id)
    {
        $suplements = ModelsDataSuplement::find($id);
        $suplements->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataSuplement')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataSuplement')->withSuccessMessage('Data berhasil dihapus!');
    }
}
