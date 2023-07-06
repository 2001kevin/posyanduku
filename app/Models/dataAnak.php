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
    protected $guarded=['id'];

    public function dataFisiks(){
        return $this->hasMany(dataFisik::class, 'id_anak', 'id');
    }

    public function dataSuplements(){
        return $this->hasMany(dataSuplement::class, 'id_anak', 'id');
    }

    public function dataWalis(){
        return $this->belongsTo(dataWali::class, 'id_wali', 'id');
    }
}
