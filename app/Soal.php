<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    public function data_soal()
    {
        return $this->hasMany('App\DataSoal','id_soal','id');
    }
}
