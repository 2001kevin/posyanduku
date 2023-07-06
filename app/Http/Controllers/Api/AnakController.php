<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\dataAnak;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    function index(Request $request)
    {
        if(!$request->nama_anak){
            return response()->json([
                'status' => 400,
                'message' => 'Nama anak tidak boleh kosong',
                'data' => null
            ]);
        }

        $anak = dataAnak::with('dataWalis')
            ->whereRaw("LOWER(nama_anak) = '" . $request->nama_anak . "'")
            ->first();
        if ($anak) {
            return response()->json([
                'status' => 200,
                'message' => 'Data anak berhasil diambil',
                'data' => $anak
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data anak tidak ditemukan',
                'data' => null
            ]);
        }
    }

    function dataFisik(Request $request)
    {
        if(!$request->nama_anak){
            return response()->json([
                'status' => 400,
                'message' => 'Nama anak tidak boleh kosong',
                'data' => null
            ]);
        }
        $anak = dataAnak::with(['dataFisiks' => function ($query){
            $query->limit(3);
            $query->orderBy('tgl_pemeriksaan', 'desc');
        }])
            ->whereRaw("LOWER(nama_anak) = '" . $request->nama_anak . "'")
            ->first();
        if ($anak) {
            return response()->json([
                'status' => 200,
                'message' => 'Data anak berhasil diambil',
                'data' => $anak
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data anak tidak ditemukan',
                'data' => null
            ]);
        }
    }

    function dataSuplemen(Request $request)
    {
        if(!$request->nama_anak){
            return response()->json([
                'status' => 400,
                'message' => 'Nama anak tidak boleh kosong',
                'data' => null
            ]);
        }
        $anak = dataAnak::with(['dataSuplements' => function ($query){
            $query->limit(3);
            $query->orderBy('tgl_pemeriksaan', 'desc');
        }])
            ->whereRaw("LOWER(nama_anak) = '" . $request->nama_anak . "'")
            ->first();
        if ($anak) {
            return response()->json([
                'status' => 200,
                'message' => 'Data anak berhasil diambil',
                'data' => $anak
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data anak tidak ditemukan',
                'data' => null
            ]);
        }
    }
}
