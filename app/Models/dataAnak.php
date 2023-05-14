<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAnak extends Model
{
    use HasFactory;

    protected $table='anaks';

    public function dataFisiks(){
        return $this->hasMany(dataFisik::class);
    }

    public function dataSuplements(){
        return $this->hasMany(dataSuplement::class);
    }

    public function dataWalis(){
        return $this->belongsTo(dataWali::class);
    }
}
