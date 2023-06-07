<?php

namespace App\Http\Controllers;

use App\Models\dataKader;
use Illuminate\Http\Request;
use App\Models\dataAbsensiKader as ModelsDataAbsensiKader;
use Illuminate\Support\Facades\DB;

class DataAbsensiKader extends Controller
{
    public function index()
    {
        $bulan_absensi = DB::table('absensi_kaders')
            ->whereNull('deleted_at')
            ->orderBy('bulan_absensi', 'desc')
            ->distinct()
            ->pluck('bulan_absensi');
        // dd($bulan_absensi);

        $absensi_kaders = ModelsDataAbsensiKader::where('bulan_absensi', $bulan_absensi)->get();

        return view('absensi.index', compact('absensi_kaders', 'bulan_absensi'));
    }

    public function data_absensi($bulan_absensi)
    {
        $data_absensi = ModelsDataAbsensiKader::where('bulan_absensi', $bulan_absensi)
            ->with('dataKaders')
            ->get();
        // dd($variabel) -> ini gaboleh ya ges yak, nggak bisa dipake nge dd kalo ginian, 
        //                  ntar 505 soalnya return json nya nggak ke kirim
        return response()->json($data_absensi);
    }

    public function create()
    {
        $kaders = dataKader::where('status', '!=', 'berhenti menjabat')->get();

        return view('absensi.create', compact('kaders'));
    }

    public function store(Request $request)
    {
        $id_kader = $request->input('id_kader');
        $status = $request->input('status');
        $keterangan = $request->input('keterangan');
        // dd($id_kader, $status, $keterangan);

        foreach ($id_kader as $index => $id) {
            ModelsDataAbsensiKader::create([
                'id_kader' => $id,
                'status_hadir' => $status[$index],
                'bulan_absensi' => $request->bulan_absensi,
                'keterangan' => $keterangan[$index],
            ]);
        }

        return redirect()->route('dataAbsensiKader')->with('toast_success', 'Data berhasil disimpan!');
    }

    public function detail()
    {
        return view('dashboard');
    }

    public function edit($bulan_absensi)
    {
        $absensi_kaders = ModelsDataAbsensiKader::where('bulan_absensi', $bulan_absensi)->get();
        // dd($kaders);

        return view('absensi.edit', compact('absensi_kaders', 'bulan_absensi'));
    }

    public function update(Request $request, $bulan_absensi)
    {
        $id_kader = $request->input('id_kader');
        $status = $request->input('status');
        $keterangan = $request->input('keterangan');
        // dd($id_kader, $status, $keterangan);
        // dd($bulan_absensi);

        foreach ($id_kader as $index => $id) {
            // $coba = ModelsDataAbsensiKader::where('bulan_absensi', $bulan_absensi)->where('id', $id)->get();
            // dd($id, $bulan_absensi, $coba);

            ModelsDataAbsensiKader::where('bulan_absensi', $bulan_absensi)->where('id', $id)->update([
                'status_hadir' => $status[$index],
                'keterangan' => $keterangan[$index],
            ]);
        }

        return redirect()->route('dataAbsensiKader')->with('toast_success', 'Data berhasil diperbarui!');
    }

    public function delete($bulan_absensi)
    {
        // dd($bulan_absensi);
        $absensi_kaders = ModelsDataAbsensiKader::where('bulan_absensi', $bulan_absensi);
        $absensi_kaders->delete();

        // Alert::success('Delete!', "Data berhasil dihapus!");
        return redirect()->route('dataAbsensiKader')->with('toast_success', 'Data berhasil dihapus!');
        // return redirect()->route('dataAnak')->withSuccessMessage('Data berhasil dihapus!');
    }
}
