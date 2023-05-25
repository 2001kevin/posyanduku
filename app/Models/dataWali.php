<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dataWali extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='walis';
    protected $guarded=['id'];

    public function dataAnaks(){
        return $this->hasMany(dataAnak::class, 'id_wali', 'id');
    }
}
