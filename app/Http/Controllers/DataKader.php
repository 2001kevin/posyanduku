<?php

namespace App\Http\Controllers;

use App\Models\dataFisik;
use App\Models\dataKader as ModelsDataKader;
use Illuminate\Http\Request;

class DataKader extends Controller
{
    public function index(){
        $kaders = ModelsDataKader::where('status', '!=', 'berhenti menjabat')->get();
        $kehadirans = dataFisik::all();
        
        return view('kader.index', compact('kaders', 'kehadirans'));
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
        $kaders = ModelsDataKader::find($id);

        return view('kader.edit', compact('kaders'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'nama_kader' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:13',            
            'status' => 'required|string|max:20',
        ]);
        
        $data_kader = ModelsDataKader::find($id);
        $data_kader->nama_kader = $request->nama_kader;
        $data_kader->jenis_kelamin = $request->jenis_kelamin;
        $data_kader->alamat = $request->alamat;
        $data_kader->no_telp = $request->no_telp;
        $data_kader->status = $request->status;
        $data_kader->save();

        return redirect()->route('dataKader')->with('toast_success' ,'Data berhasil diperbarui!');
        
    }

     public function delete($id)
    {
        $kaders = ModelsDataKader::find($id);
        $kaders->status = 'berhenti menjabat';
        $kaders->save();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataKader')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataKader')->withSuccessMessage('Data berhasil dihapus!');
    }
}
