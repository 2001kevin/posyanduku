<?php

namespace App\Http\Controllers;

use App\Models\dataFisik;
use App\Models\dataKader as ModelsDataKader;
use Illuminate\Http\Request;

class DataKader extends Controller
{
    public function index(){
        $kaders = ModelsDataKader::all();
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
