<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataSuplement extends Model
{
    use HasFactory;

    protected $table='data_suplemens';
    protected $fillable= ['id_anak', 'id_kader', 'vitamin_a', 'obat_cacing', 'makanan_tambahan', 'bulan_suplemen', 'tgl_pemeriksaan', 'keterangan'];

    public function dataAnaks(){
        return $this->belongsTo(dataAnak::class);
    }

    public function dataKaders(){
        return $this->belongsTo(dataKader::class);
    }
}
