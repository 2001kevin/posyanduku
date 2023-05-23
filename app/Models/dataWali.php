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
    protected $fillable = ['nama_wali', 'alamat', 'no_telp'];

    public function dataAnaks(){
        return $this->belongsTo(dataAnak::class, 'id', 'id_wali');
    }
}
