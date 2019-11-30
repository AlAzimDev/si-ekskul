<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id_user');
    }
}
