<?php

namespace App\Models;

use App\Models\dataWali;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dataAnak extends Model
{
    use HasFactory;
    use SoftDeletes;

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
