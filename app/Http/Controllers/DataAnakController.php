<?php

namespace App\Http\Controllers;

use App\Models\dataAnak as ModelsDataAnak;
use App\Models\dataSuplement;
use Illuminate\Http\Request;

class DataAnakController extends Controller
{
    public function index(){
        $anaks = ModelsDataAnak::all();

        // $cek_data_suplemen = dataSuplement::where('id_anak', 'id')->count();

        // $data_fisik =

        return view('anak.index', compact('anaks'));
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

    public function edit(Type $var = null)
    {
        return view('dashboard');
    }

    public function update(Type $var = null)
    {
        # code...
    }

    public function delete(Type $var = null)
    {
        # code...
    }
}
