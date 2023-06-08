<?php

namespace App\Http\Controllers;

use App\Models\dataAnak;
use App\Models\dataKader;
use App\Models\dataWali;
use App\Models\dataSuplement as ModelsDataSuplement;
use Illuminate\Http\Request;

class DataSuplement extends Controller
{
    public function index(){
        $suplements = ModelsDataSuplement::all();

        return view('suplement.index', compact('suplements'));
    }

    public function create()
    {
        $kaders = dataKader::all();
        $anaks = dataAnak::all();
        return view('suplement.create', compact('kaders', 'anaks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anak' => 'required',
            'id_kader' => 'required',
            'vitamin_a' => 'required',
            'makanan_tambahan' => 'required',
            'obat_cacing' => 'required',
            'bulan_suplement' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'keterangan' => 'required',
        ]);

        ModelsDataSuplement::create([
            'id_anak' => $request->id_anak,
            'id_kader' => $request->id_kader,
            'vitamin_a' => $request->vitamin_a,
            'makanan_tambahan' => $request->makanan_tambahan,
            'obat_cacing' => $request->obat_cacing,
            'bulan_suplement' => $request->bulan_suplement,
            'tgl_pemeriksaan' => $request->tanggal_pemeriksaan,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('dataSuplement');
    }

    public function detail()
    {
        return view('dashboard');
    }

    public function edit($id)
    {
        $suplements = ModelsDataSuplement::find($id);
        $anaks = dataAnak::all();
        $kaders = dataKader::where('status', 'aktif' )->get();

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
            'bulan_suplement' => 'required|in:februari,agustus',
            'tgl_pemeriksaan' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        $data_suplement = ModelsDataSuplement::find($id);
        $data_suplement->id_anak = $request->id_anak;
        $data_suplement->id_kader = $request->id_kader;
        $data_suplement->vitamin_a = $request->vitamin_a;
        $data_suplement->obat_cacing = $request->obat_cacing;
        $data_suplement->makanan_tambahan = $request->makanan_tambahan;
        $data_suplement->bulan_suplement = $request->bulan_suplement;
        $data_suplement->tgl_pemeriksaan = $request->tgl_pemeriksaan;
        $data_suplement->keterangan = $request->keterangan;
        $data_suplement->save();

        return redirect()->route('dataSuplement')->with('toast_success' ,'Data berhasil diperbarui!');

    }

     public function delete($id)
    {
        $data_anak = dataAnak::where('id_anak', $id);
        $data_anak->delete();

        $data_kader = dataKader::where('id_kader', $id);
        $data_kader->delete();

        $suplements = ModelsDataSuplement::find($id);
        $suplements->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataSuplement')->with('toast_success' ,'Data berhasil dihapus!');
        // return redirect()->route('dataSuplement')->withSuccessMessage('Data berhasil dihapus!');
    }
}
