<?php

namespace App\Http\Controllers;

use App\Models\dataAnak as ModelsDataAnak;
use Illuminate\Http\Request;

class DataAnakController extends Controller
{
    public function index(){
        $anaks = ModelsDataAnak::all();

        return view('anak.index');
    }

    public function create(){
        return view('anak.create');
    }
}
