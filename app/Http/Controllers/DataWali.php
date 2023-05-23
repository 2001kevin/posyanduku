<?php

namespace App\Http\Controllers;

use App\Models\dataWali as ModelsDataWali;
use Illuminate\Http\Request;

class DataWali extends Controller
{
    public function index(){
        $walis = ModelsDataWali::all();

        return view('wali.index', compact('walis'));
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
        $walis = ModelsDataWali::find($id);

        return view('wali.edit', compact('walis'));
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
        $walis = ModelsDataWali::find($id);
        $walis->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataWali')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataWali')->withSuccessMessage('Data berhasil dihapus!');
    }

}
