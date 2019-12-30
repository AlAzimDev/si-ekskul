<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public function dataabsen()
    {
        return $this->hasMany('App\DataAbsen','id_absen','id');
    }
}
