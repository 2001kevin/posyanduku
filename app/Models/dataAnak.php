<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAnak extends Model
{
    use HasFactory;

    protected $table='anaks';
    protected $fillable = ['nama_anak', 'jenis_kelamin', 'umur', 'id_wali'];

    public function dataFisiks(){
        return $this->belongsTo(dataFisik::class, 'id', 'id_anak');
    }

    public function dataSuplements(){
        return $this->belongsTo(dataSuplement::class, 'id', 'id_anak');
    }

    public function dataWalis(){
        return $this->belongsTo(dataWali::class, 'id_wali', 'id');
    }
}
