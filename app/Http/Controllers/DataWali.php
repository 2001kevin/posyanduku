<?php

namespace App\Http\Controllers;

use App\Models\dataWali as ModelsDataWali;
use App\Models\dataAnak;
use App\Models\dataSuplement;
use App\Models\dataFisik;
use Illuminate\Http\Request;

class DataWali extends Controller
{
    public function index(){
        $walis = ModelsDataWali::all();

        return view('wali.index', compact('walis'));
    }

    public function create()
    {
        return view('wali.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'NoTelepon' => 'required',
        ]);

        ModelsDataWali::create([
            'nama_wali' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->NoTelepon,
        ]);
        return redirect('dataWali');
    }

    public function detail()
    {
        return view('dashboard');
    }

    public function edit($id)
    {
        $walis = ModelsDataWali::find($id);
        $dataAnaks = $walis->dataAnaks;
        // dd($dataAnaks);

        return view('wali.edit', compact('walis', 'dataAnaks'));
    }

    public function update(Request $request, $id)
    {   
        $update_wali = $request->validate([
            'nama_wali' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:13',            
        ]);
        
        $data_wali = ModelsDataWali::find($id);
        $data_wali->nama_wali = $request->nama_wali;
        $data_wali->alamat = $request->alamat;
        $data_wali->no_telp = $request->no_telp;
        $data_wali->save();

        return redirect()->route('dataWali')->with('toast_success' ,'Data berhasil diperbarui!');
        
    }

    public function delete($id)
    {
        $anak = dataAnak::where('id_wali', $id);

        foreach ($anak->get() as $item) {
            $data_supplement = dataSuplement::where('id_anak', $item->id);
            $data_supplement->delete();

            $data_fisik = dataFisik::where('id_anak', $item->id);
            $data_fisik->delete();
        }
        $anak->delete();
    
        $walis = ModelsDataWali::find($id);
        $walis->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataWali')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataWali')->withSuccessMessage('Data berhasil dihapus!');
    }

}
