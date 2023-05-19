<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataWali extends Model
{
    use HasFactory;

    protected $table='walis';
    protected $fillable = ['nama_wali', 'alamat', 'no_telp'];

    public function dataAnaks(){
        return $this->belongsTo(dataAnak::class, 'id', 'id_wali');
    }
}
