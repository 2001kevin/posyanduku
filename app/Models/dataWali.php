<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataWali extends Model
{
    use HasFactory;

    protected $table='walis';
    protected $guarded=['id'];

    public function dataAnaks(){
        return $this->hasMany(dataAnak::class);
    }
}
