<?php

namespace App\Http\Controllers;


use App\Models\dataAnak;
use App\Models\dataSuplement;
use App\Models\dataWali;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnakController extends Controller
{
    public function index(){
        $anaks = dataAnak::all();
        $wali_deleted =  dataWali::withTrashed()->whereNotNull('deleted_at')->get();
        return view('anak.index', compact('anaks', 'wali_deleted'));
    }

    public function create()
    {

        $walis = dataWali::all();
        return view('anak.create', compact('walis'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'wali' => 'required',
            'umur' => 'required',
        ]);

        dataAnak::create([
            'id_wali' => $request->wali,
            'nama_anak' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
        ]);
        return redirect('dataAnak');
    }

    public function detail()
    {
        return view('dashboard');
    }

    public function edit($id)
    {
        $anaks = dataAnak::find($id);
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

        $data_anak = dataAnak::find($id);
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
        $anaks = dataAnak::find($id);
        $anaks->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataAnak')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataAnak')->withSuccessMessage('Data berhasil dihapus!');
    }

}
