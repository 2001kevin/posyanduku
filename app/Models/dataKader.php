<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKader extends Model
{
    use HasFactory;

    protected $table='kaders';
    protected $fillable = ['nama_kader', 'jenis_kelamin', 'alamat', 'no_telp'];

    public function dataFisiks(){
        return $this->belongsTo(dataFisik::class, 'id', 'id_kader');
    }

    public function dataSuplements(){
        return $this->belongsTo(dataSuplement::class, 'id', 'id_kader');
    }
}
