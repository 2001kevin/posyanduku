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
