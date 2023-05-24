<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dataFisik extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='data_fisiks';
    protected $fillable= ['id_anak', 'id_kader', 'berat_badan', 'naik_turun_bb', 'tgl_pemeriksaan', 'keterangan'];

    public function dataAnaks(){
        return $this->belongsTo(dataAnak::class, 'id_anak', 'id');
    }

    public function dataKaders(){
        return $this->belongsTo(dataKader::class, 'id_kader', 'id');
    }
}
