<?php

namespace App\Http\Controllers;


use App\Models\dataAnak as ModelsDataAnak;
use App\Models\dataSuplement;
use App\Models\dataWali;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnakController extends Controller
{
    public function index(){
        // $anaks = ModelsDataAnak::all();
        $wali_deleted =  dataWali::withTrashed()->whereNotNull('deleted_at')->get();
        $anaks = ModelsDataAnak::all();

        return view('anak.index', compact('anaks', 'wali_deleted'));
    }

    public function create(Type $var = null)
    {
        return view('anak.create');
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
        $anaks = ModelsDataAnak::find($id);
        $wali_deleted =  dataWali::withTrashed()->where('id', $anaks->id_wali)->first();
        // dd($wali_deleted);

        return view('anak.edit', compact('anaks', 'wali_deleted'));
    }

    public function update(Request $request, $id)
    {   
        $update_anak = $request->validate([
            'nama_anak' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'umur' => 'required|numeric|between:0,120',            
        ]);
        
        $data_anak = ModelsDataAnak::find($id);
        $data_anak->nama_anak = $request->nama_anak;
        $data_anak->jenis_kelamin = $request->jenis_kelamin;
        $data_anak->umur = $request->umur;
        $data_anak->save();

        // $anaks = ModelsDataAnak::all();

        // Alert::success('Update!', 'Data Berhasil diperbarui!');
        return redirect()->route('dataAnak')->with('toast_success' ,'Data berhasil diperbarui!');
        // return redirect('dataAnak');
        // return redirect()->back();
        // return view('anak.index', compact('anaks'));
    }

    public function delete($id)
    {
        $anaks = ModelsDataAnak::find($id);
        $anaks->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataAnak')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataAnak')->withSuccessMessage('Data berhasil dihapus!');
    }

}
