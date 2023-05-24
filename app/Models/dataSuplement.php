<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dataSuplement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='data_suplements';
    protected $fillable= ['id_anak', 'id_kader', 'vitamin_a', 'obat_cacing', 'makanan_tambahan', 'bulan_suplemen', 'tgl_pemeriksaan', 'keterangan'];

    public function dataAnaks(){
        return $this->belongsTo(dataAnak::class, 'id_anak', 'id');
    }

    public function dataKaders(){
        return $this->belongsTo(dataKader::class, 'id_kader', 'id');
    }
}
