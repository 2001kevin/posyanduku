<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKader extends Model
{
    use HasFactory;

    protected $table='kaders';

    public function dataFisiks(){
        return $this->hasMany(dataFisik::class);
    }

    public function dataSuplements(){
        return $this->hasMany(dataSuplement::class);
    }
}
