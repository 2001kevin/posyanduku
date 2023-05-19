<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataSuplement extends Controller
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
