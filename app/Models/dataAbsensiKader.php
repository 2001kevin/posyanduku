<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dataAbsensiKader extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'absensi_kaders';
    protected $guarded = ['id'];

    public function dataKaders()
    {
        return $this->belongsTo(dataKader::class, 'id_kader', 'id');
    }
}
